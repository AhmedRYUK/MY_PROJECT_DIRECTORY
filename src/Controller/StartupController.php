<?php

namespace App\Controller;

use App\Entity\Startup;
use App\Form\StartupType;
use App\Repository\StartupRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/startup')]
final class StartupController extends AbstractController
{
    #[Route(name: 'app_startup_index', methods: ['GET'])]
    public function index(StartupRepository $startupRepository): Response
    {
        return $this->render('startup/index.html.twig', [
            'startups' => $startupRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_startup_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $startup = new Startup();
        $form = $this->createForm(StartupType::class, $startup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($startup);
            $entityManager->flush();

            return $this->redirectToRoute('app_startup_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('startup/new.html.twig', [
            'startup' => $startup,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_startup_show', methods: ['GET'])]
    public function show(Startup $startup): Response
    {
        return $this->render('startup/show.html.twig', [
            'startup' => $startup,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_startup_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Startup $startup, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(StartupType::class, $startup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_startup_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('startup/edit.html.twig', [
            'startup' => $startup,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_startup_delete', methods: ['POST'])]
    public function delete(Request $request, Startup $startup, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$startup->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($startup);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_startup_index', [], Response::HTTP_SEE_OTHER);
    }
}
