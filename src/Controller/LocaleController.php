<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LocaleController extends AbstractController
{
    #[Route('/change-locale', name: 'change-locale')]
    public function changeLocale(Request $request): Response
    {
        $locale = $request->get('_locale');
        // Stocke la nouvelle locale en session
        $request->getSession()->set('_locale', $locale);
        // Redirection par défaut vers la page d'accueil dans la nouvelle langue
        return $this->redirect($request->headers->get('referer'));
    }


}