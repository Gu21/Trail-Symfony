<?php

namespace App\Controller;

use App\Entity\RegisterTrail;
use App\Form\RegisterTrailType;
use App\Repository\RegisterTrailRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


#[Route('trail-des-jambes-allaire/Inscription')]
class RegisterTrailController extends AbstractController
{
    #[Route('/Admin', name: 'register_trail_index', methods: ['GET'])]
    public function index(RegisterTrailRepository $registerTrailRepository): Response
    {
        return $this->render('register_trail/index.html.twig', [
            'register_trail' => $registerTrailRepository->findAll(),
        ]);
    }

    #[Route('', name: 'trail_2021', methods: ['GET'])]
    public function registerTrail(RegisterTrailRepository $registerTrailRepository): Response
    {
        return $this->render('/register_trail/Reg2021.html.twig', [
            'register_trail' => $registerTrailRepository->findAll(),
        ]);

        

        
    }


    

    #[Route('/Creation', name: 'register_trail_new', methods: ['GET', 'POST'])]
         /**
     * Route('/Creation', name: 'register_trail_new', methods: ['GET', 'POST'])
     * @isGranted("ROLE_ADMIN")
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $registerTrail = new RegisterTrail();
        $form = $this->createForm(RegisterTrailType::class, $registerTrail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //------------------ Upload fichier PDF---------------------------


            //------------------ Upload fichier $newletterRegisterTrail  PDF---------------------------

            $newletterRegisterTrail = $form->get('newletterRegisterTrail')->getData();

            if ($newletterRegisterTrail) {
                $originalFilename = pathinfo($newletterRegisterTrail->getClientOriginalName(), PATHINFO_FILENAME);

                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $newletterRegisterTrail->guessExtension();

                try {
                    $newletterRegisterTrail->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                }
                $registerTrail->setNewletterRegisterTrail($newFilename);
            }
            //-------------END----- Upload fichier $newletterRegisterTrail  PDF---------------------------


            //------------------ Upload fichier newletterPartnerRegisterTrail  PDF---------------------------

            $newletterPartnerRegisterTrail = $form->get('newletterPartnerRegisterTrail')->getData();

            if ($newletterPartnerRegisterTrail) {
                $originalFilename = pathinfo($newletterPartnerRegisterTrail->getClientOriginalName(), PATHINFO_FILENAME);

                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $newletterPartnerRegisterTrail->guessExtension();

                try {
                    $newletterPartnerRegisterTrail->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                }
                $registerTrail->setNewletterPartnerRegisterTrail($newFilename);
            }
            //-------------END----- Upload fichier newletterPartnerRegisterTrail  PDF---------------------------


            //------------------ Upload fichier internalRulesRegisterTrail  PDF---------------------------

            $internalRulesRegisterTrail = $form->get('internalRulesRegisterTrail')->getData();

            if ($internalRulesRegisterTrail) {
                $originalFilename = pathinfo($internalRulesRegisterTrail->getClientOriginalName(), PATHINFO_FILENAME);

                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $internalRulesRegisterTrail->guessExtension();

                try {
                    $internalRulesRegisterTrail->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                }
                $registerTrail->setInternalRulesRegisterTrail($newFilename);
            }


            //-------------END----- Upload fichier internalRulesRegisterTrail  PDF---------------------------

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($registerTrail);
            $entityManager->flush();

            return $this->redirectToRoute('register_trail_index');
        }

        return $this->render('register_trail/new.html.twig', [
            'register_trail' => $registerTrail,
            'form' => $form->createView(),
        ]);

        
    }

    #[Route('/{id}', name: 'register_trail_show', methods: ['GET'])]
    public function show(RegisterTrail $registerTrail): Response
    {
        return $this->render('register_trail/show.html.twig', [
            'register_trail' => $registerTrail,
        ]);
    }

    //------------------ Upload fichier $newletterRegisterTrail  PDF---------------------------

    #[Route('/{id}/Modification', name: 'register_trail_edit', methods: ['GET', 'POST'])]
         /**
     * Route('/{id}/Modification', name: 'register_trail_edit', methods: ['GET', 'POST'])
     * @isGranted("ROLE_USER")
     */
    public function edit(Request $request, RegisterTrail $registerTrail, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(RegisterTrailType::class, $registerTrail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $newletterRegisterTrail = $form->get('newletterRegisterTrail')->getData();

            if ($newletterRegisterTrail) {
                $originalFilename = pathinfo($newletterRegisterTrail->getClientOriginalName(), PATHINFO_FILENAME);

                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $newletterRegisterTrail->guessExtension();

                try {
                    $newletterRegisterTrail->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                }
                $registerTrail->setNewletterRegisterTrail($newFilename);
            }

            //----------END-------- Upload fichier $newletterRegisterTrail  PDF---------------------------

            //------------------ Upload fichier newletterPartnerRegisterTrail  PDF---------------------------

            $newletterPartnerRegisterTrail = $form->get('newletterPartnerRegisterTrail')->getData();

            if ($newletterPartnerRegisterTrail) {
                $originalFilename = pathinfo($newletterPartnerRegisterTrail->getClientOriginalName(), PATHINFO_FILENAME);

                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $newletterPartnerRegisterTrail->guessExtension();

                try {
                    $newletterPartnerRegisterTrail->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                }
                $registerTrail->setnewletterPartnerRegisterTrail($newFilename);
            }

            //-------------END----- Upload fichier newletterPartnerRegisterTrail  PDF---------------------------

            //------------------ Upload fichier internalRulesRegisterTrail  PDF---------------------------

            $internalRulesRegisterTrail = $form->get('internalRulesRegisterTrail')->getData();

            if ($internalRulesRegisterTrail) {
                $originalFilename = pathinfo($internalRulesRegisterTrail->getClientOriginalName(), PATHINFO_FILENAME);

                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $internalRulesRegisterTrail->guessExtension();

                try {
                    $internalRulesRegisterTrail->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                }
                $registerTrail->setInternalRulesRegisterTrail($newFilename);
            }


            //-------------END----- Upload fichier internalRulesRegisterTrail  PDF---------------------------



            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('register_trail_index');
        }

        return $this->render('register_trail/edit.html.twig', [
            'register_trail' => $registerTrail,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'register_trail_delete', methods: ['POST'])]
         /**
     * Route('/{id}', name: 'register_trail_delete', methods: ['POST'])
     * @isGranted("ROLE_ADMIN")
     */
    public function delete(Request $request, RegisterTrail $registerTrail): Response
    {
        if ($this->isCsrfTokenValid('delete' . $registerTrail->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($registerTrail);
            $entityManager->flush();
        }

        return $this->redirectToRoute('register_trail_index');
    }
}
