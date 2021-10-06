<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrivacyPolicyController extends AbstractController
{
    #[Route('/trail-des-jambes-allaire/Politique/Confidentialite', name: 'privacyPolicy')]
    public function index(): Response
    {
        return $this->render('privacypolicy/index.html.twig', [
            'controller_name' => 'PrivacyPolicyController',
        ]);
    }
}
