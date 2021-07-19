<?php

namespace App\Controller;

use App\Entity\Results;
use App\Form\ResultsType;
use App\Repository\ResultsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

#[Route('/results')]
class ResultsController extends AbstractController
{
    #[Route('/', name: 'results_index', methods: ['GET'])]
    public function index(ResultsRepository $resultsRepository): Response
    {
        return $this->render('results/index.html.twig', [
            'results' => $resultsRepository->findAll(),
        ]);
    }


    #[Route('/results_years', name: 'results_years', methods: ['GET'])]
    public function registerTrail(ResultsRepository $resultsRepository): Response
    {
        return $this->render('results/resultsYears.html.twig', [
            'results' => $resultsRepository->findAll(),
        ]);
        
    }


    #[Route('/new', name: 'results_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $result = new Results();
        $form = $this->createForm(ResultsType::class, $result);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $pictureResult = $form->get('pictureResult')->getData();

            if ($pictureResult) {
                $originalFilename = pathinfo($pictureResult->getClientOriginalName(), PATHINFO_FILENAME);

                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $pictureResult->guessExtension();

                try {
                    $pictureResult->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                }
                $result->setPictureResult($newFilename);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($result);
            $entityManager->flush();

            return $this->redirectToRoute('results_index');
        }

        return $this->render('results/new.html.twig', [
            'result' => $result,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'results_show', methods: ['GET'])]
    public function show(Results $result): Response
    {
        return $this->render('results/show.html.twig', [
            'result' => $result,
        ]);
    }

    #[Route('/{id}/edit', name: 'results_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Results $result, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(ResultsType::class, $result);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $pictureResult = $form->get('pictureResult')->getData();

            if ($pictureResult) {
                $originalFilename = pathinfo($pictureResult->getClientOriginalName(), PATHINFO_FILENAME);

                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $pictureResult->guessExtension();

                try {
                    $pictureResult->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                }
                $result->setPictureResult($newFilename);
            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('results_index');
        }

        return $this->render('results/edit.html.twig', [
            'result' => $result,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'results_delete', methods: ['POST'])]
    public function delete(Request $request, Results $result): Response
    {
        if ($this->isCsrfTokenValid('delete' . $result->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($result);
            $entityManager->flush();
        }

        return $this->redirectToRoute('results_index');
    }
}
