<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BlogController extends AbstractController
{
    #[Route('/blog-listing', name: 'app_blog_listing')]
    public function index(ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->findAll();
        return $this->render('blog/blog-index.html.twig', [
            'articles' => $articles,
        ]);
    }

    #[Route('/blog-article/{slug}/detail', name: 'app_blog_show')]
    public function articleDetail(string $slug, ArticleRepository $articleRepository): Response{
        $article = $articleRepository->findOneBy(['slug' => $slug]);
        return $this->render('blog/blog-details.html.twig', [
            'article' => $article,
            'related_articles'=>$articleRepository->findAll()
        ]);
    }
}
