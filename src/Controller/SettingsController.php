<?php

namespace App\Controller;

use App\Entity\Settings;
use App\Form\SettingsType;
use App\Repository\SettingsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[Route('/Date')]
class SettingsController extends AbstractController
{
    #[Route('/Paramètre/Admin', name: 'settings_index', methods: ['GET'])]
    public function index(SettingsRepository $settingsRepository): Response
    {
        return $this->render('settings/index.html.twig', [
            'settings' => $settingsRepository->findAll(),
        ]);
    }

    #[Route('/Creation', name: 'settings_new', methods: ['GET', 'POST'])]
         /**
     * Route('/Creation', name: 'settings_new', methods: ['GET', 'POST'])
     * @isGranted("ROLE_ADMIN")
     */
    public function new(Request $request): Response
    {
        $setting = new Settings();
        $form = $this->createForm(SettingsType::class, $setting);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($setting);
            $entityManager->flush();

            return $this->redirectToRoute('settings_index');
        }

        return $this->render('settings/new.html.twig', [
            'setting' => $setting,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'settings_show', methods: ['GET'])]
    public function show(Settings $setting): Response
    {
        return $this->render('settings/show.html.twig', [
            'setting' => $setting,
        ]);
    }

    #[Route('/{id}/Modification', name: 'settings_edit', methods: ['GET', 'POST'])]
         /**
     *Route('/{id}/Modification', name: 'settings_edit', methods: ['GET', 'POST'])
     * @isGranted("ROLE_USER")
     */
    public function edit(Request $request, Settings $setting): Response
    {
        $form = $this->createForm(SettingsType::class, $setting);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('settings_index');
        }

        return $this->render('settings/edit.html.twig', [
            'setting' => $setting,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'settings_delete', methods: ['POST'])]
         /**
     * Route('/{id}', name: 'settings_delete', methods: ['POST'])
     * @isGranted("ROLE_ADMIN")
     */
    public function delete(Request $request, Settings $setting): Response
    {
        if ($this->isCsrfTokenValid('delete'.$setting->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($setting);
            $entityManager->flush();
        }

        return $this->redirectToRoute('settings_index');
    }
}
