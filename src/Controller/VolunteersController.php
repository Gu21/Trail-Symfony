<?php

namespace App\Controller;

use App\Entity\Volunteers;
use App\Form\VolunteersType;
use App\Repository\VolunteersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/volunteers')]
class VolunteersController extends AbstractController
{
    #[Route('/', name: 'volunteers_index', methods: ['GET'])]
    public function index(VolunteersRepository $volunteersRepository): Response
    {
        return $this->render('volunteers/index.html.twig', [
            'volunteers' => $volunteersRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'volunteers_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $volunteer = new Volunteers();
        $form = $this->createForm(VolunteersType::class, $volunteer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($volunteer);
            $entityManager->flush();

            return $this->redirectToRoute('volunteers_index');
        }

        return $this->render('volunteers/new.html.twig', [
            'volunteer' => $volunteer,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'volunteers_show', methods: ['GET'])]
    public function show(Volunteers $volunteer): Response
    {
        return $this->render('volunteers/show.html.twig', [
            'volunteer' => $volunteer,
        ]);
    }

    #[Route('/{id}/edit', name: 'volunteers_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Volunteers $volunteer): Response
    {
        $form = $this->createForm(VolunteersType::class, $volunteer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('volunteers_index');
        }

        return $this->render('volunteers/edit.html.twig', [
            'volunteer' => $volunteer,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'volunteers_delete', methods: ['POST'])]
    public function delete(Request $request, Volunteers $volunteer): Response
    {
        if ($this->isCsrfTokenValid('delete'.$volunteer->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($volunteer);
            $entityManager->flush();
        }

        return $this->redirectToRoute('volunteers_index');
    }
}
