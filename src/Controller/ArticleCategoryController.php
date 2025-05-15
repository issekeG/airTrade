<?php

namespace App\Controller;

use App\Entity\ArticleCategory;
use App\Form\ArticleCategoryType;
use App\Repository\ArticleCategoryRepository;
use App\Service\PaginatorService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/article-category')]
final class ArticleCategoryController extends AbstractController
{
    #[Route(name: 'app_article_category_index', methods: ['GET'])]
    public function index(Request $request, ArticleCategoryRepository $articleCategoryRepository, PaginatorService $paginatorService): Response
    {
        $articleCategory = new ArticleCategory();
        $form = $this->createForm(ArticleCategoryType::class, $articleCategory);

        $editCategoryForm = $this->createForm(ArticleCategoryType::class, $articleCategory);
        $form->handleRequest($request);
        $editCategoryForm->handleRequest($request);

        $queryBuilder = $articleCategoryRepository->findAllCategory();
        $article_categories = $paginatorService->paginate($queryBuilder, $request,20);
        return $this->render('backend/admin/blog/blog-category-index.html.twig', [
            'article_categories' => $article_categories,
            'categoryForm'=>$form,
            'editCategoryForm'=>$editCategoryForm
        ]);
    }

    #[Route('/new', name: 'app_article_category_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $articleCategory = new ArticleCategory();
        $form = $this->createForm(ArticleCategoryType::class, $articleCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($articleCategory);
            $entityManager->flush();

            return $this->redirectToRoute('app_article_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('article_category/new.html.twig', [
            'article_category' => $articleCategory,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_article_category_show', methods: ['GET'])]
    public function show(ArticleCategory $articleCategory): Response
    {
        return $this->render('article_category/show.html.twig', [
            'article_category' => $articleCategory,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_article_category_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ArticleCategory $articleCategory, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ArticleCategoryType::class, $articleCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_article_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('article_category/edit.html.twig', [
            'article_category' => $articleCategory,
            'form' => $form,
        ]);
    }

    #[Route('delete/{id}', name: 'app_article_category_delete', methods: ['GET','POST'])]
    public function delete(Request $request, ArticleCategory $articleCategory, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($articleCategory);
        $entityManager->flush();

        return $this->redirectToRoute('app_article_category_index', [], Response::HTTP_SEE_OTHER);
    }
}
