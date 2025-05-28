<?php

namespace App\Controller;

use App\Entity\NewLetter;
use App\Form\NewLetterType;
use App\Repository\NewLetterRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/new-letter')]
final class NewLetterController extends AbstractController
{
    #[Route(name: 'app_new_letter_index', methods: ['GET'])]
    public function index(NewLetterRepository $newLetterRepository): Response
    {
        return $this->render('new_letter/index.html.twig', [
            'new_letters' => $newLetterRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_new_letter_new', methods: ['POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $newLetter = new NewLetter();
        $form = $this->createForm(NewLetterType::class, $newLetter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($newLetter);
            $entityManager->flush();


        }
        return $this->redirectToRoute('app_new_letter_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{id}', name: 'app_new_letter_show', methods: ['GET'])]
    public function show(NewLetter $newLetter): Response
    {
        return $this->render('new_letter/show.html.twig', [
            'new_letter' => $newLetter,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_new_letter_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, NewLetter $newLetter, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(NewLetterType::class, $newLetter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_new_letter_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('new_letter/edit.html.twig', [
            'new_letter' => $newLetter,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_new_letter_delete', methods: ['POST'])]
    public function delete(Request $request, NewLetter $newLetter, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$newLetter->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($newLetter);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_new_letter_index', [], Response::HTTP_SEE_OTHER);
    }
}
