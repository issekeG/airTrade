<?php

namespace App\Controller;

use App\Constant\MaxSteps;
use App\Constant\MenuCategories;
use App\Dto\JetAircraftDto;
use App\Entity\Aircraft;
use App\Entity\AirCraftCategory;
use App\Entity\AircraftDocument;
use App\Entity\AirCraftImage;
use App\Entity\AircraftManufacturer;
use App\Entity\AircraftSpecs;
use App\Form\AircraftType;
use App\Form\ImageUploadType;
use App\Form\InternContactType;
use App\Form\JetAircraftFormType;
use App\Repository\AirCraftCategoryRepository;
use App\Repository\AircraftManufacturerRepository;
use App\Repository\AircraftRepository;
use App\Repository\AircraftSpecsRepository;
use App\Service\DtoService;
use App\Service\EmailService;
use App\Service\FormTypeService;
use App\Service\VideoTrimmer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/aircraft')]
final class AircraftController extends AbstractController
{

    public function __construct(
        private AirCraftCategoryRepository $airCraftCategoryRepository,
        private AirCraftRepository $airCraftRepository,
        private AircraftManufacturerRepository $aircraftManufacturerRepository,
        private EmailService $emailService
    ) {

        // Le constructeur est maintenant correctement initialisé avec les dépendances injectées
    }

    #[Route(name: 'app_aircraft_index', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $all_airCrafts = $this->airCraftRepository->findAll();
        $categories = $this->airCraftCategoryRepository->findAll();
        $manufacturers = $this->aircraftManufacturerRepository->findAll();

        $itemsFilters[] = "";
        return $this->render('annonces/list.html.twig', [
            'allAirCrafts'=>$all_airCrafts,
            'itemsFilters'=>$itemsFilters,
            'categories'=>$categories,
            'manufacturers'=>$manufacturers
        ]);

    }

    #[Route('/filter/listing',name: 'app_aircraft_filter', methods: ['GET'])]
    public function aircraftFilter(Request $request): Response{

        $categories = $this->airCraftCategoryRepository->findAll();
        $manufacturers = $this->aircraftManufacturerRepository->findAll();

        $filters = [
            'categories' => $request->query->get('aircraftCategories') ? explode(',', $request->query->get('aircraftCategories')) : [],
            'manufacturers' => $request->query->get('aircraftManufacturers') ? explode(',', $request->query->get('aircraftManufacturers')) : [],
            'min_year' => $request->query->get('aircraft_min_year'),
            'max_year' => $request->query->get('aircraft_max_year'),
            'min_price' => $request->query->get('aircraft_min_price'),
            'max_price' => $request->query->get('aircraft_max_price'),
            'min_hour' => $request->query->get('aircraft_min_hour'),
            'max_hour' => $request->query->get('aircraft_max_hour'),
            'min_seat' => $request->query->get('aircraft_min_seat'),
            'max_seat' => $request->query->get('aircraft_max_seat'),
            'min_date' => $request->query->get('aircraft_min_date'),
            'max_date' => $request->query->get('aircraft_max_date'),
            'status' => $request->query->all('aircraft_status') ?? [],
            'registration_number' => $request->query->get('aircraft_registration_number'),
        ];

        foreach ($filters as $key => $value) {
            if (empty($value) || $value === '') {
                unset($filters[$key]);
            }
        }

        $allAirCrafts = $this->airCraftRepository->findByFilters($filters);


        $itemsFilters[] = "";
        return $this->render('annonces/list.html.twig', [
            'allAirCrafts'=>$allAirCrafts,
            'itemsFilters'=>$itemsFilters,
            'categories'=>$categories,
            'manufacturers'=>$manufacturers
        ]);

    }




    #[Route('/listing/{categoryName}',name: 'app_aircraft_by_category', methods: ['GET'])]
    public function getAircraftByCategory(Request $request, string $categoryName, AircraftRepository $aircraftRepository ,AirCraftCategoryRepository $airCraftCategoryRepository):Response{
        $airCraftCategory = $airCraftCategoryRepository->findOneBy(['name'=>$categoryName]);
        $all_airCrafts = $aircraftRepository->findByCategory($airCraftCategory);
        $categories = $this->airCraftCategoryRepository->findAll();
        $manufacturers = $this->aircraftManufacturerRepository->findAll();

        return $this->render('annonces/list.html.twig', [
            'allAirCrafts'=>$all_airCrafts,
            'categories'=>$categories,
            'manufacturers'=>$manufacturers,
            'itemsFilters'=>[]
        ]);

    }


    #[Route('/new', name: 'app_aircraft_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SessionInterface $session, EntityManagerInterface $entityManager): Response
    {
        $aircraft = $session->get('aircraft', new Aircraft());

        $form = $this->createForm(AircraftType::class, $aircraft,
        [
            'csrf_token_id' => 'aircraft_new',
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $aircraftCategory = $form->get('category')->getData();
            $aircraftManufacturer = $form->get('aircraftManufacturer')->getData();
            $session->set('aircraftCategory', $aircraftCategory);
            $session->set('aircraftManufacturer', $aircraftManufacturer);
            $session->set('aircraft', $aircraft);

            return $this->redirectToRoute('aircraft_wizard_form', ['step'=>1], Response::HTTP_SEE_OTHER);
        }

        $session->remove('aircraft');
        $session->remove('aircraftCategory');
        $session->remove('aircraftManufacturer');
        $session->remove('form_data');

        return $this->render('aircraft/new.html.twig', [
            'aircraft' => $aircraft,
            'form' => $form,
            'categories'=>$this->airCraftCategoryRepository->findAll(),
            'manufacturers'=>$this->aircraftManufacturerRepository->findAll()
        ]);
    }

    #[Route('/{slug}/show', name: 'app_aircraft_show', methods: ['GET', 'POST'])]
    public function show(Request $request,VideoTrimmer $videoTrimmer,string $slug, AircraftSpecsRepository $aircraftSpecsRepository): Response
    {
        $aircraft = $this->airCraftRepository->findOneBy(['slug'=>$slug]);
        $user = $this->getUser();
        $defaultData = [
            'firstName' => $user?->getFirstName(),
            'email' => $user?->getEmail(),
            'phone' => $user?->getTelephone(),
            'aircraft'=>$aircraft
        ];


        // Tu crées le formulaire avec les données initiales
        $formContact = $this->createForm(InternContactType::class, $defaultData);

        $formContact->handleRequest($request);

        if ($formContact->isSubmitted() && $formContact->isValid()) {
            $data = $formContact->getData();

            $this->emailService->sendContactNotificationEmail(
                $data,
                $aircraft->getPublishedBy()->getEmail(), // Adresse destinataire
                $aircraft->getAircraftCategory()->getName().' '.$aircraft->getAircraftManufacturer()->getName()." ".$aircraft->getModel(), // Titre de l'avion
                'Vous avez reçu un nouveau message de contact'
            );

            // Tu peux les utiliser ou les sauvegarder où tu veux
        }

        $aircraftSpecs= $aircraft->getAircraftSpecs()[0]->getDataSpecs();
        return $this->render('annonces/detail.html.twig', [
            'aircraft' => $aircraft,
            'aircraftSpecs'=>$aircraftSpecs,
            'contactForm'=>$formContact
        ]);
    }

    #[Route('/{id}/edit', name: 'app_aircraft_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Aircraft $aircraft, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AircraftType::class, $aircraft);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_aircraft_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('aircraft/edit.html.twig', [
            'aircraft' => $aircraft,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'app_aircraft_delete', methods: ['POST'])]
    public function delete(Request $request, Aircraft $aircraft, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$aircraft->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($aircraft);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_aircraft_index', [], Response::HTTP_SEE_OTHER);
    }


    #[Route('/register/step={step}', name: 'aircraft_wizard_form', requirements: ['step' => '\d+'])]
    public function formWizard(int $step, MaxSteps $maxSteps, Request $request,VideoTrimmer $videoTrimmer ,SessionInterface $session, DtoService $dtoService, FormTypeService $formTypeService,AircraftManufacturerRepository $aircraftManufacturerRepository ,AirCraftCategoryRepository $airCraftCategoryRepository, EntityManagerInterface $em): Response
    {
        // Récupérer la catégorie d'avion de la session ou une valeur par défaut
        $aircraftCategory = $session->get('aircraftCategory', new AircraftCategory());
        // Obtenir le DTO en fonction de la catégorie d'avion

        $dto = $dtoService->getDtoByCategory($aircraftCategory->getName(), $session);

        // Résoudre le type de formulaire en fonction de la catégorie
        $formType = $formTypeService->resolveFormType($aircraftCategory->getName());

        $maxSteps = $maxSteps->getMaxSteps($aircraftCategory->getName());

        if($step === $maxSteps){
            $form = $this->createForm(ImageUploadType::class, new AircraftImage());

        }
        else{
            $form = $this->createForm($formType, $dto, ['step' => $step]);
        }

        $form->handleRequest($request);

        // Vérifier si le formulaire a été soumis et validé
        if ($form->isSubmitted() && $form->isValid()) {

            // Si l'étape n'est pas la dernière, on redirige vers l'étape suivante
            if ($step < $maxSteps) {
                $session->set('form_data', $dto);
                return $this->redirectToRoute('aircraft_wizard_form', ['step' => $step + 1]);
            }
            else{

                $aircraftSpecs = new AircraftSpecs();
                $aircraft = $session->get('aircraft');
                $aircraftCategorySession = $session->get('aircraftCategory');
                $aircraftManufacturerSession = $session->get('aircraftManufacturer');
                $aircraftCategory = $airCraftCategoryRepository->find($aircraftCategorySession->getId());
                $aircraftManufacturer = $aircraftManufacturerRepository->find($aircraftManufacturerSession->getId());

                $aircraftSpecs_data = (array)$session->get('form_data');

                $aircraftSpecs->setDataSpecs($aircraftSpecs_data);

                $aircraft->setPublishedBy($this->getUser());
                $aircraft->setAircraftCategory($aircraftCategory);
                $aircraft->setAircraftManufacturer($aircraftManufacturer);
                $aircraft->setIsPublished(true);

                $slug = $aircraft->generateSlug($aircraftCategory,$aircraftManufacturer);
                $aircraft->setSlug($slug);

                $imageFiles = $form->get('imageFile')->getData();
                $documentFiles = $form->get('documents')->getData();
                $videoFile = $form->get('videoFile')->getData();

                if ($videoFile instanceof File) {
                    $aircraft->setVideoFile($videoFile);
                }


                // Parcourir chaque fichier et créer une entité AircraftImage
                foreach ($imageFiles as $imageFile) {
                    $aircraftImage = new AircraftImage();
                    $aircraftImage->setImageFile($imageFile);
                    $aircraftImage->setAircraft($aircraft);
                    $em->persist($aircraftImage);
                }

                //parcourir chaque fichier et créer une entité docuement
                foreach ($documentFiles as $documentFile) {
                    $aircraftDocument = new AircraftDocument();
                    $aircraftDocument->setFileName($documentFile);
                    $aircraftDocument->setAircraft($aircraft);
                    $em->persist($aircraftDocument);
                }


                $em->persist($aircraft);
                $aircraftSpecs->setAircraft($aircraft);
                $em->persist($aircraftSpecs);
                $em->flush();
                $session->remove('aircraft');

                $em->persist($aircraft);



                // 1. Chemin du dossier vidéo
                $uploadsDir = $this->getParameter('kernel.project_dir') . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'video' . DIRECTORY_SEPARATOR . 'aircraft_video' . DIRECTORY_SEPARATOR;

                // 2. Nom du fichier vidéo (stocké par VichUploader)
                $videoName = $aircraft->getVideo(); // ex : "video.mp4"

                // 3. Chemins complets
                $videoPath = realpath($uploadsDir . $videoName); // 🔐 Assure un chemin absolu et correct
                $tempPath = $uploadsDir . 'trimmed_' . uniqid() . '.mp4';

                // 4. Vérification
                if (!$videoPath || !file_exists($videoPath)) {
                    throw new \Exception("Fichier vidéo introuvable : " . $uploadsDir . $videoName);
                }

                try {
                    $videoTrimmer->trimVideo($videoPath, $tempPath, 45);
                    @unlink($videoPath);
                    rename($tempPath, $videoPath);
                } catch (\Exception $e) {
                    $this->addFlash('error', 'Erreur lors de la coupe de la vidéo : ' . $e->getMessage());
                }
            }


        }

        // Rendu du formulaire avec les données et la progression de l'étape
        return $this->render('aircraft/form_wizard.html.twig', [
            'form' => $form->createView(),
            'step' => $step,
            'totalSteps' => $maxSteps,
            'categories'=>$this->airCraftCategoryRepository->findAll(),
            'manufacturers'=>$this->aircraftManufacturerRepository->findAll()
        ]);
    }
    #[Route('/register-success', name: 'aircraft_wizard_form_success')]
    public function aircraft_success():Response
    {
        return $this->render('patient/success.html.twig');
    }

}
