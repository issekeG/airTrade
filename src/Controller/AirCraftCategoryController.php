<?php

namespace App\Controller;

use App\Entity\AirCraftCategory;
use App\Form\AirCraftCategoryType;
use App\Repository\AirCraftCategoryRepository;
use App\Service\PaginatorService;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/air-craft-category')]
final class AirCraftCategoryController extends AbstractController
{
    #[Route(name: 'app_air_craft_category_index', methods: ['GET'])]
    public function index(Request $request,PaginatorService $paginatorService, AirCraftCategoryRepository $airCraftCategoryRepository): Response
    {
        $airCraftCategory = new AirCraftCategory();
        $form = $this->createForm(AirCraftCategoryType::class, $airCraftCategory);
        $editCategoryForm = $this->createForm(AirCraftCategoryType::class, $airCraftCategory);
        $form->handleRequest($request);
        $editCategoryForm->handleRequest($request);
        $queryBuilder = $airCraftCategoryRepository->findAllQueryBuilder();
        $pagination = $paginatorService->paginate($queryBuilder, $request, 8);

        return $this->render('backend/admin/aircraft-category-index.html.twig', [
            'air_craft_categories' => $pagination,
            'categoryForm'=>$form,
            'editCategoryForm'=>$editCategoryForm,
        ]);
    }

    #[Route('/new', name: 'app_air_craft_category_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $airCraftCategory = new AirCraftCategory();
        $form = $this->createForm(AirCraftCategoryType::class, $airCraftCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($airCraftCategory);
            $entityManager->flush();

            return $this->redirectToRoute('app_air_craft_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('air_craft_category/new.html.twig', [
            'air_craft_category' => $airCraftCategory,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_air_craft_category_show', methods: ['GET'])]
    public function show(AirCraftCategory $airCraftCategory): Response
    {
        return $this->render('air_craft_category/show.html.twig', [
            'air_craft_category' => $airCraftCategory,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_air_craft_category_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AirCraftCategory $airCraftCategory, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AirCraftCategoryType::class, $airCraftCategory);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_air_craft_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('backend/admin/aircraft-category-index.html.twig', [
            'air_craft_category' => $airCraftCategory,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_air_craft_category_delete', methods: ['POST'])]
    public function delete(Request $request, AirCraftCategory $airCraftCategory, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$airCraftCategory->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($airCraftCategory);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_air_craft_category_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('delete/{id}', name: 'aircraft_category_delete', methods: ['GET'])]
    public function aircraftCategoryDelete(Request $request, AirCraftCategory $airCraftCategory, EntityManagerInterface $entityManager): Response
    {
            $entityManager->remove($airCraftCategory);
            $entityManager->flush();

        return $this->redirectToRoute('app_air_craft_category_index', [], Response::HTTP_SEE_OTHER);
    }
}
