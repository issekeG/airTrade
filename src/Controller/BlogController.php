<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\ArticleCategory;
use App\Entity\NewLetter;
use App\Form\NewLetterType;
use App\Repository\ArticleCategoryRepository;
use App\Repository\ArticleRepository;
use App\Service\PaginatorService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BlogController extends AbstractController
{
    #[Route('/blog-listing', name: 'app_blog_listing')]
    public function index(Request $request, ArticleCategoryRepository $articleCategoryRepository , ArticleRepository $articleRepository, PaginatorService $paginatorService, EntityManagerInterface $entityManager): Response
    {
        $newLetter = new NewLetter();
        $articleLang = $request->query->get('articleLang');

        if($articleLang != null){
            $queryBuilder = $articleRepository->findByLanguage(['language' => $articleLang]);
        }else{
            $articleLang = $request->getLocale();
            $queryBuilder = $articleRepository->findByLanguage(['language' => $articleLang]);

        }

        $form = $this->createForm(NewLetterType::class, $newLetter);
        $form->handleRequest($request);



        $categories = $articleCategoryRepository->findAll();
        $articles = $paginatorService->paginate($queryBuilder,$request,20);
        return $this->render('blog/blog-index.html.twig', [
            'articles' => $articles,
            'categories' => $categories,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/blog-about', name: 'app_blog_about')]
    public function blogAbout(Request $request): Response
    {
        return $this->render('blog/blog-about.html.twig', [

        ]);
    }

    #[Route('/blog-listing/{id}', name: 'app_blog_category_listing')]
    public function articleCategory(Request $request, ArticleCategory $articleCategory,  ArticleRepository $articleRepository,ArticleCategoryRepository $articleCategoryRepository, PaginatorService $paginatorService): Response{
        $queryBuilder = $articleRepository->findByCategory($articleCategory->getId());
        $articles = $paginatorService->paginate($queryBuilder,$request,20);
        $categories = $articleCategoryRepository->findAll();
        $newLetter = new NewLetter();
        $form = $this->createForm(NewLetterType::class, $newLetter);
        $form->handleRequest($request);

        return $this->render('blog/blog-index.html.twig', [
            'articles' => $articles,
            'categories' => $categories,
            'form' => $form->createView()
        ]);
    }



    #[Route('/blog-article/{slug}/detail', name: 'app_blog_show')]
    public function articleDetail(Request $request, string $slug, ArticleRepository $articleRepository, ArticleCategoryRepository $articleCategoryRepository): Response{
        $article = $articleRepository->findOneBy(['slug' => $slug]);
        $categories = $articleCategoryRepository->findAll();

        $newLetter = new NewLetter();
        $form = $this->createForm(NewLetterType::class, $newLetter);
        $form->handleRequest($request);

        return $this->render('blog/blog-details.html.twig', [
            'article' => $article,
            'related_articles'=>$articleRepository->findAll(),
            'form' => $form->createView(),
            'categories' => $categories
        ]);
    }
}
