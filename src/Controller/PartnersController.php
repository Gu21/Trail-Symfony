<?php

namespace App\Controller;

use App\Entity\Partners;
use App\Form\PartnersType;
use App\Repository\PartnersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[Route('/Partenaires')]
class PartnersController extends AbstractController
{
    #[Route('/Admin', name: 'partners_index', methods: ['GET'])]
    public function index(PartnersRepository $partnersRepository): Response
    {
        return $this->render('partners/index.html.twig', [
            'partners' => $partnersRepository->findAll(),
        ]);
    }

    #[Route('/Creation', name: 'partners_new', methods: ['GET', 'POST'])]
    /**
     * Route('/Creation', name: 'partners_new', methods: ['GET', 'POST'])
     * @isGranted("ROLE_ADMIN")
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $partner = new Partners();
        $form = $this->createForm(PartnersType::class, $partner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $picturePartner = $form->get('picturePartner')->getData();

            if ($picturePartner) {
                $originalFilename = pathinfo($picturePartner->getClientOriginalName(), PATHINFO_FILENAME);

                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $picturePartner->guessExtension();

                try {
                    $picturePartner->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                }
                $partner->setPicturePartner($newFilename);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($partner);
            $entityManager->flush();

            return $this->redirectToRoute('partners_index');
        }

        return $this->render('partners/new.html.twig', [
            'partner' => $partner,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'partners_show', methods: ['GET'])]
    public function show(Partners $partner): Response
    {
        return $this->render('partners/show.html.twig', [
            'partner' => $partner,
        ]);
    }

    #[Route('/{id}/Modification', name: 'partners_edit', methods: ['GET', 'POST'])]
    /**
     * Route('/{id}/Modification', name: 'partners_edit', methods: ['GET', 'POST'])
     * @isGranted("ROLE_USER")
     */
    public function edit(Request $request, Partners $partner, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(PartnersType::class, $partner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
/** Début du code à ajouter **/
            $picturePartner = $form->get('picturePartner')->getData();

            if ($picturePartner) {
                $originalFilename = pathinfo($picturePartner->getClientOriginalName(), PATHINFO_FILENAME);
// ceci est nécessaire pour inclure en toute sécurité le nom de fichier dans l'URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $picturePartner->guessExtension();
// Déplacez le fichier dans le répertoire où les brochures sont stockées
                try {
                    $picturePartner->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... gérer l'exception si quelque chose se produit pendant le téléchargement du fichier
                    // met à jour la propriété 'photoEleve' pour stocker le nom du fichier PDF
                }
                // au lieu de son contenu
                $partner->setPicturePartner($newFilename);
            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('partners_index');
        }

        return $this->render('partners/edit.html.twig', [
            'partner' => $partner,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'partners_delete', methods: ['POST'])]
    /**
     * Route('/{id}', name: 'partners_delete', methods: ['POST'])
     * @isGranted("ROLE_ADMIN")
     */
    public function delete(Request $request, Partners $partner): Response
    {
        if ($this->isCsrfTokenValid('delete' . $partner->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($partner);
            $entityManager->flush();
        }

        return $this->redirectToRoute('partners_index');
    }
}
