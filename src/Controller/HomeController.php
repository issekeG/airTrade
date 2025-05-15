<?php

namespace App\Controller;

use App\Constant\MenuCategories;
use App\Entity\Aircraft;
use App\Form\MainSearchFormType;
use App\Repository\AircraftRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home', methods: ['GET','POST'])]
    public function index(Request $request, AircraftRepository $aircraftRepository): Response
    {

        $search_form = $this->createForm(MainSearchFormType::class);
        $search_form->handleRequest($request);
        $all_airCrafts = $aircraftRepository->findLast4Aircraft();

        $menusCategories = new MenuCategories();
        $all_categories = $menusCategories->getMenusCategories();

        return $this->render('home/index.html.twig', [
            'categories' => $all_categories,
            'allAirCrafts'=>$all_airCrafts,
            'search_form' => $search_form->createView(),
        ]);

    }


}
