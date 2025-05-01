<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ChangePasswordFormType;
use App\Form\RegistrationFormType;
use App\Form\UserAdminRegistrationFormType;
use App\Form\UserType;
use App\Repository\AirCraftCategoryRepository;
use App\Repository\AircraftManufacturerRepository;
use App\Repository\AircraftRepository;
use App\Repository\UserRepository;
use App\Service\PaginatorService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

#[Route('/users')]
final class UserController extends AbstractController
{
    public function __construct(
        private AirCraftCategoryRepository $airCraftCategoryRepository,
        private AirCraftRepository $airCraftRepository,
        private AircraftManufacturerRepository $aircraftManufacturerRepository
    )
    {

    }
    #[Route('/verify-list',name: 'app_user_index_verify', methods: ['GET', 'POST'])]
    public function user_verify_index(Request $request, PaginatorService $paginatorService, UserRepository $userRepository): Response
    {
        $queryBuilder = $userRepository->findVerifyUsers();

        if ($request->isMethod('POST')) {
            $searchTerm = $request->request->get('search');
            if($searchTerm) {
                $queryBuilder = $userRepository->searchUserVerifyUsersByPseudoOrMail($searchTerm);
            }
        }
        $users = $paginatorService->paginate($queryBuilder, $request,20);

        return $this->render('backend/admin/user-index.html.twig', [
            'users' => $users,
            'categories'=>$this->airCraftCategoryRepository->findAll(),
            'manufacturers'=>$this->aircraftManufacturerRepository->findAll()

        ]);
    }
    #[Route('/non/verify-list',name: 'app_user_index_non_verify', methods: ['GET', 'POST'])]
    public function user_non_verify_index(Request $request, PaginatorService $paginatorService, UserRepository $userRepository): Response
    {
        $queryBuilder = $userRepository->findNonVerifyUsers();

        if ($request->isMethod('POST')) {
            $searchTerm = $request->request->get('search');
            if($searchTerm){
                $queryBuilder = $userRepository->searchUserNonVerifyUsersByPseudoOrMail($searchTerm);
            }

        }
        $users = $paginatorService->paginate($queryBuilder, $request,20);

        return $this->render('backend/admin/non-verify-user-index.html.twig', [
            'users' => $users,
            'categories'=>$this->airCraftCategoryRepository->findAll(),
            'manufacturers'=>$this->aircraftManufacturerRepository->findAll()

        ]);
    }
    #[Route('/users-admins',  name: 'app_user_admin_index', methods: ['GET'])]
    public function user_admin_index(UserRepository $userRepository): Response
    {
        return $this->render('backend/admin/admin-index.html.twig', [
            'admin_users' => $userRepository->findAdmin(),
            'categories'=>$this->airCraftCategoryRepository->findAll(),
            'manufacturers'=>$this->aircraftManufacturerRepository->findAll()

        ]);
    }

    #[Route('/{id}', name: 'app_user_show', methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
            'categories'=>$this->airCraftCategoryRepository->findAll(),
            'manufacturers'=>$this->aircraftManufacturerRepository->findAll()
        ]);
    }

    #[Route('/{id}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_user_index_verify', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
            'categories'=>$this->airCraftCategoryRepository->findAll(),
            'manufacturers'=>$this->aircraftManufacturerRepository->findAll()
        ]);
    }

    #[Route('/{id}', name: 'app_user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_user_index_verify', [], Response::HTTP_SEE_OTHER);
    }


    #[Route('/profile/{id}/{page}', name: 'user_profile', methods: ['GET','POST'])]
    public function userProfile(Request $request, string $page, AircraftRepository $aircraftRepository, UserPasswordHasherInterface $passwordHasher, Security $security, TranslatorInterface $translator,EntityManagerInterface $entityManager):Response{


        $user = $security->getUser();

        if($page === "ads"){
            $annonces = $aircraftRepository->findBy(['publishedBy' => $user]);
            return $this->render('user/profile/my-ads.html.twig',
                [
                    'user' => $user,
                    'annonces' => $annonces,
                    'categories'=>$this->airCraftCategoryRepository->findAll(),
                    'manufacturers'=>$this->aircraftManufacturerRepository->findAll()
                ]
            );
        }

        if($page === "details"){
            return $this->render('user/profile/account-details.html.twig',[ 'user' => $user]);
        }
        if($page === "infos"){
            $message = "";
            $form = $this->createForm(UserType::class, $user);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager->flush();

                $message = "Modification effectué avec succès";
            }

            return $this->render('user/profile/edit-infos.html.twig',
                [   'user' => $user,
                    'form' => $form->createView(),
                    'message' => $message,
                    'categories'=>$this->airCraftCategoryRepository->findAll(),
                    'manufacturers'=>$this->aircraftManufacturerRepository->findAll()
                ]);
        }
        if($page === "password"){
            /** @var User $user */
            $user = $this->getUser();
            $message = "";

            $form = $this->createForm(ChangePasswordFormType::class);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                /** @var string $plainPassword */
                $plainPassword = $form->get('plainPassword')->getData();

                // Encode(hash) the plain password, and set it.
                $user->setPassword($passwordHasher->hashPassword($user, $plainPassword));
                $entityManager->flush();
                $message = "Your password has been changed";
            }

            return $this->render('user/profile/edit-password.html.twig',
                [
                'user' => $user,
                'resetForm' => $form->createView(),
                    'categories'=>$this->airCraftCategoryRepository->findAll(),
                    'manufacturers'=>$this->aircraftManufacturerRepository->findAll(),

                'message' => $message]
            );
        }

        return $this->render('user/profile/users-profile.html.twig',
        [
            'user' => $user,
            'categories'=>$this->airCraftCategoryRepository->findAll(),
            'manufacturers'=>$this->aircraftManufacturerRepository->findAll()
        ]
        );
    }

    #[Route('/admin-profile/{id}/{page}', name: 'admin_view_user_profile', methods: ['GET','POST'])]
    public function adminViewUserProfile(Request $request, UserRepository $userRepository, int $id, string $page, AircraftRepository $aircraftRepository, UserPasswordHasherInterface $passwordHasher, Security $security, TranslatorInterface $translator,EntityManagerInterface $entityManager):Response{


        $user = $userRepository->find($id);

        if($page === "ads"){
            $annonces = $aircraftRepository->findBy(['publishedBy' => $user]);
            return $this->render('backend/admin/user_profile/user-ads.html.twig',
                [
                    'user' => $user,
                    'annonces' => $annonces,
                    'categories'=>$this->airCraftCategoryRepository->findAll(),
                    'manufacturers'=>$this->aircraftManufacturerRepository->findAll()
                ]
            );
        }

        if($page === "details"){
            return $this->render('backend/admin/user_profile/account-details.html.twig',[ 'user' => $user]);
        }
        if($page === "infos"){
            $message = "";
            $form = $this->createForm(UserType::class, $user);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager->flush();

                $message = "Modification effectué avec succès";
            }

            return $this->render('backend/admin/user_profile/edit-infos.html.twig',
                [   'user' => $user,
                    'form' => $form->createView(),
                    'message' => $message,
                    'categories'=>$this->airCraftCategoryRepository->findAll(),
                    'manufacturers'=>$this->aircraftManufacturerRepository->findAll()
                ]);
        }

        return $this->render('backend/admin/user_profile/users-profile.html.twig',
            [
                'user' => $user,
                'categories'=>$this->airCraftCategoryRepository->findAll(),
                'manufacturers'=>$this->aircraftManufacturerRepository->findAll()
            ]
        );
    }

    #[Route('/luck/{id}/', name: 'user_profile_luck', methods: ['GET','POST'])]
    public function luck_user(Request $request, int $id, UserRepository $userRepository, EntityManagerInterface $entityManager):Response{
        $user = $userRepository->find($id);
        if($user){
            if($user->isVerified()){
                $user->setIsVerified(false);
            }else{
                $user->setIsVerified(true);
            }
            $entityManager->flush();
        }
        return $this->redirectToRoute('app_user_admin_index', [], Response::HTTP_SEE_OTHER);

    }

    #[Route('/{pseudo}/listing/', name: 'user_public_profile', methods: ['GET','POST'])]
    public function userPublicProfile(Request $request, string $pseudo, UserRepository $userRepository, AircraftRepository $aircraftRepository): Response
    {
        $user = $userRepository->findOneBy(['pseudo' => $pseudo]);
        $allAirCrafts = $aircraftRepository->findBy(['publishedBy' => $user]);

        return $this->render('user/profile/users-public-profile.html.twig',
            [
                'user' => $user,
                'allAirCrafts' => $allAirCrafts,
                'categories'=>$this->airCraftCategoryRepository->findAll(),
                'manufacturers'=>$this->aircraftManufacturerRepository->findAll()
            ]
        );

    }



    #[Route('/add/admin-user', name: 'app_add_user_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(UserAdminRegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var string $plainPassword */
            $plainPassword = $form->get('plainPassword')->getData();

            // encode the plain password
            $user->setPassword($userPasswordHasher->hashPassword($user, $plainPassword));
            $user->setRoles(['ROLE_ADMIN']);
            $user->setIsVerified(true);
            $user->setAcceptBrokerageContact(true);
            $user->setAcceptTerms(true);
            $user->setAcceptNewsletter(true);
            $user->setCreateAt(new \DateTimeImmutable());

            $entityManager->persist($user);
            $entityManager->flush();


            return $this->redirectToRoute('app_login');
        }

        return $this->render('backend/admin/add-user-admin.html.twig', [
            'registrationForm' => $form,
        ]);
    }


}
