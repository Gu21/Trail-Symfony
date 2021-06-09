<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomesController extends AbstractController
{
    #[Route('/', name: 'homes')]
    public function index(): Response
    {
        return $this->render('homes/index.html.twig', [
            'controller_name' => 'HomesController',
        ]);
    }
}
