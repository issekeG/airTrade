<?php

namespace App\Controller;

use App\Entity\InternContact;
use App\Form\InternContactType;
use App\Repository\InternContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/intern/contact')]
final class InternContactController extends AbstractController
{
    #[Route(name: 'app_intern_contact_index', methods: ['GET'])]
    public function index(InternContactRepository $internContactRepository): Response
    {
        return $this->render('intern_contact/index.html.twig', [
            'intern_contacts' => $internContactRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_intern_contact_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $internContact = new InternContact();
        $form = $this->createForm(InternContactType::class, $internContact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($internContact);
            $entityManager->flush();

            return $this->redirectToRoute('app_intern_contact_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('intern_contact/new.html.twig', [
            'intern_contact' => $internContact,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_intern_contact_show', methods: ['GET'])]
    public function show(InternContact $internContact): Response
    {
        return $this->render('intern_contact/show.html.twig', [
            'intern_contact' => $internContact,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_intern_contact_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, InternContact $internContact, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(InternContactType::class, $internContact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_intern_contact_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('intern_contact/edit.html.twig', [
            'intern_contact' => $internContact,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_intern_contact_delete', methods: ['POST'])]
    public function delete(Request $request, InternContact $internContact, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$internContact->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($internContact);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_intern_contact_index', [], Response::HTTP_SEE_OTHER);
    }
}
