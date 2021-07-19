<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PracticalInfoController extends AbstractController
{
    #[Route('/practical/info', name: 'practical_info')]
    public function index(): Response
    {
        return $this->render('practical_info/index.html.twig', [
            'controller_name' => 'PracticalInfoController',
        ]);
    }
}
