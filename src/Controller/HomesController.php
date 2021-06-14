<?php

namespace App\Controller;

use App\Repository\HomeRepository;
use App\Repository\PartnersRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\SettingsRepository;

class HomesController extends AbstractController
{
    #[Route('/', name: 'homes')]
    public function index(HomeRepository $homeRepository,PartnersRepository $partnersRepository,SettingsRepository $settingsRepository): Response
    {
        return $this->render('homes/index.html.twig', [
            'controller_name' => 'HomesController',
            'homes' => $homeRepository->findAll(),
            'partners' => $partnersRepository->findAll(),
            'settings' => $settingsRepository->findAll(),
        ]);
    }
}
