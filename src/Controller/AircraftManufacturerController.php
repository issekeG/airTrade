<?php

namespace App\Controller;

use App\Entity\AircraftManufacturer;
use App\Form\AircraftManufacturerType;
use App\Repository\AircraftManufacturerRepository;
use App\Service\PaginatorService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/aircraft-manufacturer')]
#[IsGranted("ROLE_ADMIN")]
final class AircraftManufacturerController extends AbstractController
{
    #[Route(name: 'app_aircraft_manufacturer_index', methods: ['GET', 'POST'])]
    public function index(Request $request,PaginatorService $paginatorService,  AircraftManufacturerRepository $aircraftManufacturerRepository): Response
    {
        $aircraftManufacturer = new AircraftManufacturer();
        $form = $this->createForm(AircraftManufacturerType::class, $aircraftManufacturer);
        $editCategoryForm = $this->createForm(AircraftManufacturerType::class, $aircraftManufacturer);
        $form->handleRequest($request);

        $queryBuilder = $aircraftManufacturerRepository->findAllQueryBuilder();

        $editCategoryForm->handleRequest($request);
        if ($request->isMethod('POST')) {
            $searchTerm = $request->request->get('search');
            $queryBuilder = $aircraftManufacturerRepository->findOneByName($searchTerm);
        }
        $pagination = $paginatorService->paginate($queryBuilder, $request,10);
        return $this->render('backend/admin/aircraft-manufacturer-index.html.twig', [
            'aircraftManufacturers' => $pagination,
            'aircraftManufacturerForm'=>$form,
            'editAircraftManufacturerForm'=>$editCategoryForm
        ]);
    }

    #[Route('/new', name: 'app_aircraft_manufacturer_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $aircraftManufacturer = new AircraftManufacturer();
        $form = $this->createForm(AircraftManufacturerType::class, $aircraftManufacturer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($aircraftManufacturer);
            $entityManager->flush();

            return $this->redirectToRoute('app_aircraft_manufacturer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('aircraft_manufacturer/new.html.twig', [
            'aircraft_manufacturer' => $aircraftManufacturer,
            'form' => $form,
        ]);
    }


    #[Route('/{id}', name: 'app_aircraft_manufacturer_show', methods: ['GET'])]
    public function show(AircraftManufacturer $aircraftManufacturer): Response
    {
        return $this->render('aircraft_manufacturer/show.html.twig', [
            'aircraft_manufacturer' => $aircraftManufacturer,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_aircraft_manufacturer_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AircraftManufacturer $aircraftManufacturer, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AircraftManufacturerType::class, $aircraftManufacturer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_aircraft_manufacturer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('aircraft_manufacturer/edit.html.twig', [
            'aircraft_manufacturer' => $aircraftManufacturer,
            'form' => $form,
        ]);
    }

    #[Route('/delete/{id}', name: 'app_aircraft_manufacturer_delete', methods: ['GET','POST'])]
    public function delete(Request $request, AircraftManufacturer $aircraftManufacturer, EntityManagerInterface $entityManager): Response
    {
            $entityManager->remove($aircraftManufacturer);
            $entityManager->flush();

        return $this->redirectToRoute('app_aircraft_manufacturer_index', [], Response::HTTP_SEE_OTHER);
    }
}
