<?php

namespace App\Controller;

use App\Entity\Races;
use App\Form\RacesType;
use App\Repository\RacesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

#[Route('/races')]
class RacesController extends AbstractController
{
    #[Route('/', name: 'races_index', methods: ['GET'])]
    public function index(RacesRepository $racesRepository): Response
    {
        return $this->render('races/index.html.twig', [
            'race' => $racesRepository->findAll(),
        ]);
    }


    
    public function menuHeader(RacesRepository $racesRepository): Response
    {
        return $this->render('races/menuHeader.html.twig', [
            'races' => $racesRepository->findAll(),
        ]);

    }



    #[Route('/new', name: 'races_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $race = new Races();
        $form = $this->createForm(RacesType::class, $race);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $pictureRace= $form->get('pictureRace')->getData();

            if ($pictureRace) {
            $originalFilename = pathinfo($pictureRace->getClientOriginalName(),PATHINFO_FILENAME);
            
            $safeFilename = $slugger->slug($originalFilename);
            $newFilename = $safeFilename.'-'.uniqid().'.'.$pictureRace->guessExtension();
            
            try {
                $pictureRace->move(
                $this->getParameter('photos_directory'),
                $newFilename
                );
                } catch (FileException $e) {
            
                }
                $race->setPictureRace($newFilename);
            }

            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($race);
            $entityManager->flush();

            return $this->redirectToRoute('races_index');
        }

        return $this->render('races/new.html.twig', [
            'race' => $race,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'races_show', methods: ['GET'])]
    public function show(Races $race): Response
    {
        
        return $this->render('races/show.html.twig', [
            'race' => $race,
        ]);
    }

    #[Route('/{id}/edit', name: 'races_edit', methods: ['GET','POST'])]
    public function edit(Request $request, Races $race, SluggerInterface $slugger): Response
    {
      
        $form = $this->createForm(RacesType::class, $race);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            
            $pictureRace= $form->get('pictureRace')->getData();

            if ($pictureRace) {
            $originalFilename = pathinfo($pictureRace->getClientOriginalName(),PATHINFO_FILENAME);
            
            $safeFilename = $slugger->slug($originalFilename);
            $newFilename = $safeFilename.'-'.uniqid().'.'.$pictureRace->guessExtension();
            
            try {
                $pictureRace->move(
                $this->getParameter('photos_directory'),
                $newFilename
                );
                } catch (FileException $e) {
            
                }
                $race->setPictureRace($newFilename);
            }

            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($race);
            $entityManager->flush();


            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('races_index');
        }

        return $this->render('races/edit.html.twig', [
            'race' => $race,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'races_delete', methods: ['POST'])] 
    public function delete(Request $request, Races $race):Response
    {
        if ($this->isCsrfTokenValid('delete'.$race->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($race);
            $entityManager->flush();
        }

        return $this->redirectToRoute('races_index');
    }

}