<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LegalNoticeController extends AbstractController
{
    #[Route('/trail-des-jambes-allaire/Mentions/legales', name: 'legalNotice')]
    public function index(): Response
    {
        return $this->render('legalNotice/index.html.twig', [
            'controller_name' => 'LegalNoticeController',
        ]);
    }
}
