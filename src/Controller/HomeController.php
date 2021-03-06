<?php

namespace App\Controller;

use App\Entity\Home;
use App\Form\HomeType;
use App\Repository\HomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


#[Route('/Accueil')]
class HomeController extends AbstractController
{
    #[Route('/admin', name: 'home_index', methods: ['GET'])]
    public function index(HomeRepository $homeRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'homes' => $homeRepository->findAll(),
        ]);
    }

    #[Route('/Creation', name: 'home_new', methods: ['GET', 'POST'])]
       /**
     * Route('/Creation', name: 'home_new', methods: ['GET', 'POST'])
     * @isGranted("ROLE_ADMIN")
     */
    public function new(Request $request): Response
    {
        $home = new Home();
        $form = $this->createForm(HomeType::class, $home);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($home);
            $entityManager->flush();

            return $this->redirectToRoute('home_index');
        }

        return $this->render('home/new.html.twig', [
            'home' => $home,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'home_show', methods: ['GET'])]
    public function show(Home $home): Response
    {
        return $this->render('home/show.html.twig', [
            'home' => $home,
        ]);
    }

    #[Route('/{id}/Modification', name: 'home_edit', methods: ['GET', 'POST'])]
       /**
     * Route('/{id}/Modification', name: 'home_edit', methods: ['GET', 'POST'])
     * @isGranted("ROLE_USER")
     */
    public function edit(Request $request, Home $home): Response
    {
        $form = $this->createForm(HomeType::class, $home);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('home_index');
        }

        return $this->render('home/edit.html.twig', [
            'home' => $home,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'home_delete', methods: ['POST'])]
       /**
     * Route('/{id}', name: 'home_delete', methods: ['POST'])
     * @isGranted("ROLE_ADMIN")
     */
    public function delete(Request $request, Home $home): Response
    {
        if ($this->isCsrfTokenValid('delete'.$home->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($home);
            $entityManager->flush();
        }

        return $this->redirectToRoute('home_index');
    }
}
