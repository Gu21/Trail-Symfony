<?php

namespace App\Controller;

use App\Entity\Pictures;
use App\Form\PicturesType;
use App\Repository\PicturesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[Route('trail-des-jambes-allaire/Photos')]
class PicturesController extends AbstractController
{
    #[Route('/Admin', name: 'pictures_index', methods: ['GET'])]
    public function index(PicturesRepository $picturesRepository): Response
    {
        return $this->render('pictures/index.html.twig', [
            'pictures' => $picturesRepository->findAll(),
            
        ]);
        
    }

    #[Route('/', name: 'pictures_2019', methods: ['GET'])]
    public function page1(PicturesRepository $picturesRepository): Response
    {
        return $this->render('pictures/pictures2019.html.twig', [
            'pictures' => $picturesRepository->findAllYears(),
            
        ]);

    }
  
    //  #[Route('/pictures_2017', name: 'pictures_2017', methods: ['GET'])]
    //  public function page(PicturesRepository $picturesRepository): Response
    //  {
    //     return $this->render('pictures/pictures2017.html.twig', [
    //             'pictures' => $picturesRepository->findAll(),
                
    //     ]);
    
    //     }

    //     #[Route('/pictures_2016', name: 'pictures_2016', methods: ['GET'])]
    //     public function page2(PicturesRepository $picturesRepository): Response
    //     {
    //         return $this->render('pictures/pictures2016.html.twig', [
    //             'pictures' => $picturesRepository->findAll(),
                
    //         ]);
    
    //     }

    

    #[Route('/Creation', name: 'pictures_new', methods: ['GET', 'POST'])]
        /**
     * Route('/Creation', name: 'pictures_new', methods: ['GET', 'POST'])
     * @isGranted("ROLE_ADMIN")
     */
    public function new(Request $request): Response
    {
        $picture = new Pictures();
        $form = $this->createForm(PicturesType::class, $picture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($picture);
            $entityManager->flush();

            return $this->redirectToRoute('pictures_index');
        }

        return $this->render('pictures/new.html.twig', [
            'pictures' => $picture,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'pictures_show', methods: ['GET'])]
    public function show(Pictures $picture): Response
    {
        return $this->render('pictures/show.html.twig', [
            'picture' => $picture,
        ]);
    }

    #[Route('/{id}/Modification', name: 'pictures_edit', methods: ['GET', 'POST'])]
        /**
     * Route('/{id}/Modification', name: 'pictures_edit', methods: ['GET', 'POST'])
     * @isGranted("ROLE_USER")
     */
    public function edit(Request $request, Pictures $picture): Response
    {
        $form = $this->createForm(PicturesType::class, $picture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pictures_index');
        }

        return $this->render('pictures/edit.html.twig', [
            'picture' => $picture,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'pictures_delete', methods: ['POST'])]
        /**
     * Route('/{id}', name: 'pictures_delete', methods: ['POST'])
     * @isGranted("ROLE_ADMIN")
     */
    public function delete(Request $request, Pictures $picture): Response
    {
        if ($this->isCsrfTokenValid('delete'.$picture->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($picture);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pictures_index');
    }
}
