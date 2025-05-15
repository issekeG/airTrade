<?php

namespace App\Controller;

use App\Repository\AircraftRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

final class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    #[IsGranted("ROLE_ADMIN")]
    public function index(
        Request $request,
        AircraftRepository $aircraftRepository,
        UserRepository $userRepository,
    ): Response
    {
        $totalAnnonce = $aircraftRepository->count([]);
        $totalActiveAnnonce = $aircraftRepository->count(['isPublished' => true]);
        $totalBlockedAnnonce = $aircraftRepository->count(['isPublished' => false]);
        $totalReportedAnnonce = $aircraftRepository->count(['isReported' => true]);
        $totalUser = $userRepository->count();
        $totalActiveUser = $userRepository->nbrFindVerifyUsers();
        $totalNonActiveUser = $userRepository->nbrFindNonVerifyUsers();
        $totalAdmin = $userRepository->nbrAdmin();
        $averageAnnonceByCategory = $aircraftRepository->moyenneAnnoncesPerCategory();
        $aircraftPerCategory = $aircraftRepository->countAircraftPerCategory();

        return $this->render('backend/admin/index.html.twig', [
            'nbTotalAnnonce' => $totalAnnonce,
            'nbTotalActiveAnnonce' => $totalActiveAnnonce,
            'nbTotalBlockedAnnonce' => $totalBlockedAnnonce,
            'nbTotalReportedAnnonce' => $totalReportedAnnonce,
            'nbTotalUser' => $totalUser,
            'nbTotalActiveUser' => $totalActiveUser,
            'nbTotalNonActiveUser' => $totalNonActiveUser,
            'averageAnnonceByCategory'=>$averageAnnonceByCategory,
            'aircraftPerCategory'=>$aircraftPerCategory,
            'totalAdmin'=>$totalAdmin
        ]);
    }
}
