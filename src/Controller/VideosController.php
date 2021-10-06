<?php

namespace App\Controller;

use App\Entity\Videos;
use App\Form\VideosType;
use App\Repository\VideosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;






#[Route('trail-des-jambes-allaire/Videos')]
class VideosController extends AbstractController
{
    #[Route('/Admin', name: 'videos_index', methods: ['GET'])]
    public function index(VideosRepository $videosRepository): Response
    {
        return $this->render('videos/index.html.twig', [
            'videos' => $videosRepository->findAll(),
        ]);
    }


    
        #[Route('/', name: 'videos_Teaser', methods: ['GET'])]
        public function video1(VideosRepository $videosRepository): Response
        {
            return $this->render('videos/Teaser.html.twig', [
                'videos' => $videosRepository->findAll(),
            ]);
        }

    #[Route('/Creation', name: 'videos_new', methods: ['GET', 'POST'])]
         /**
     * Route('/Creation', name: 'videos_new', methods: ['GET', 'POST'])
     * @isGranted("ROLE_ADMIN")
     */
    public function new(Request $request, SluggerInterface $slugger): Response

    {

        $video = new Videos();
        $form = $this->createForm(VideosType::class, $video);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $pictureVideo = $form->get('pictureVideo')->getData();

            if ($pictureVideo) {
                $originalFilename = pathinfo($pictureVideo->getClientOriginalName(), PATHINFO_FILENAME);

                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $pictureVideo->guessExtension();

                try {
                    $pictureVideo->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                }
                $video->setPictureVideo($newFilename);
            }


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($video);
            $entityManager->flush();

            return $this->redirectToRoute('videos_index');
        }

        return $this->render('videos/new.html.twig', [
            'video' => $video,
            'form' => $form->createView(),

        ]);
    }

    #[Route('/{id}', name: 'videos_show', methods: ['GET'])]
    public function show(Videos $video): Response
    {
        return $this->render('videos/show.html.twig', [
            'video' => $video,
        ]);
    }

    #[Route('/{id}/Modification', name: 'videos_edit', methods: ['GET', 'POST'])]
         /**
     * Route('/{id}/Modification', name: 'videos_edit', methods: ['GET', 'POST'])
     * @isGranted("ROLE_USER")
     */
    public function edit(Request $request, Videos $video, SluggerInterface $slugger): Response
    {


        $form = $this->createForm(VideosType::class, $video);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $pictureVideo = $form->get('pictureVideo')->getData();

            if ($pictureVideo) {
                $originalFilename = pathinfo($pictureVideo->getClientOriginalName(), PATHINFO_FILENAME);

                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $pictureVideo->guessExtension();

                try {
                    $pictureVideo->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                }
                $video->setPictureVideo($newFilename);
            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('videos_index');
        }

        return $this->render('videos/edit.html.twig', [
            'video' => $video,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'videos_delete', methods: ['POST'])]
         /**
     * Route('/{id}', name: 'videos_delete', methods: ['POST'])
     * @isGranted("ROLE_ADMIN")
     */
    public function delete(Request $request, Videos $video): Response
    {
        if ($this->isCsrfTokenValid('delete' . $video->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($video);
            $entityManager->flush();
        }

        return $this->redirectToRoute('videos_index');
    }
}
