<?php

namespace App\Controller;

use App\Constant\MenuCategories;
use App\Entity\Aircraft;
use App\Form\MainSearchFormType;
use App\Repository\AircraftRepository;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home', methods: ['GET','POST'])]
    public function index(Request $request, ArticleRepository $articleRepository, AircraftRepository $aircraftRepository): Response
    {

        $search_form = $this->createForm(MainSearchFormType::class);
        $search_form->handleRequest($request);
        $all_airCrafts = $aircraftRepository->findLast4Aircraft();

        $articleLang = $request->getLocale();
        $blog_articles = $articleRepository->findLastArticle($articleLang);

        $menusCategories = new MenuCategories();
        $all_categories = $menusCategories->getMenusCategories();

        return $this->render('home/index.html.twig', [
            'categories' => $all_categories,
            'allAirCrafts'=>$all_airCrafts,
            'search_form' => $search_form->createView(),
            'blog_articles'=>$blog_articles
        ]);

    }

    #[Route('/about-us', name: 'app_about_us', methods: ['GET','POST'])]
    public function aboutAs(Request $request):Response{
        return $this->render('us/about.html.twig', []);
    }

    #[Route('/general-conditions', name: 'general_conditions', methods: ['GET','POST'])]
    public function conditions(Request $request):Response{
        return $this->render('us/conditions.html.twig', []);
    }

    #[Route('/contact-as', name: 'app_contact_us', methods: ['GET','POST'])]
    public function contactUs(Request $request):Response
    {
        return $this->render('us/contact.html.twig', []);
    }

}
