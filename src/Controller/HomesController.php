<?php

namespace App\Controller;

use App\Repository\HomeRepository;
use App\Repository\RacesRepository;
use App\Repository\PartnersRepository;
use App\Repository\SettingsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomesController extends AbstractController
{
    #[Route('/', name: 'homes')]
    public function index(HomeRepository $homeRepository,PartnersRepository $partnersRepository,SettingsRepository $settingsRepository, RacesRepository $racesRepository): Response
    {
        return $this->render('homes/index.html.twig', [
            'controller_name' => 'HomesController',
            'homes' => $homeRepository->findAll(),
            'partners' => $partnersRepository->findAll(),
            'settings' => $settingsRepository->findAll(),
            'races' => $racesRepository->findAll(),
        ]);
    }
}
