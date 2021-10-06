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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[Route('trail-des-jambes-allaire/Course')]
class RacesController extends AbstractController
{
    #[Route('/', name: 'races_index', methods: ['GET'])]
    public function index(RacesRepository $racesRepository): Response
    {
        return $this->render('races/index.html.twig', [
            'races' => $racesRepository->findAll(),
        ]);
    }


    
    public function menuHeader(RacesRepository $racesRepository): Response
    {
        return $this->render('races/menuHeader.html.twig', [
            'race' => $racesRepository->findAll(),
        ]);

    }



    #[Route('/Creation', name: 'races_new', methods: ['GET', 'POST'])]
          /**
     * Route('/Creation', name: 'races_new', methods: ['GET', 'POST'])
     * @isGranted("ROLE_ADMIN")
     */
    
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

    #[Route('/{id}/Modification', name: 'races_edit', methods: ['GET','POST'])]
          /**
     * Route('/{id}/Modification', name: 'races_edit', methods: ['GET','POST'])
     * @isGranted("ROLE_USER")
     */
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
          /**
     * Route('/{id}', name: 'races_delete', methods: ['POST'])
     * @isGranted("ROLE_ADMIN")
     */
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