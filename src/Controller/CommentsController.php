<?php

namespace App\Controller;

use App\Entity\Comments;
use App\Entity\Items;
use App\Form\CommentsType;
use App\Repository\ItemsRepository;
use App\Repository\CommentsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;







#[Route('/trail-des-jambes-allaire/Commentaires')]
class CommentsController extends AbstractController
{
    #[Route('', name: 'comments_index', methods: ['GET', 'POST'])]
    public function index(CommentsRepository $commentsRepository, ItemsRepository $itemsRepository, SluggerInterface $slugger, Request $request): Response
    {

        $comment = new Comments();
        $form = $this->createForm(CommentsType::class, $comment);
        (['attr' => ['id' => 'formForm']]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {



            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comment);
            $entityManager->flush();
        }




        return $this->render('comments/index.html.twig', [
            'comments' => $commentsRepository->findAll(),
            'items' => $itemsRepository->findAll(),
            'form' => $form->createView(),
        ]);
    }



    #[Route('/Creation', name: 'comments_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $comment = new Comments();
        $form = $this->createForm(CommentsType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comment);
            $entityManager->flush();

            return $this->redirectToRoute('comments_index');
        }

        return $this->render('comments/new.html.twig', [
            'comment' => $comment,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'comments_show', methods: ['GET'])]
    public function show(Comments $comment): Response
    {
        return $this->render('comments/show.html.twig', [
            'comment' => $comment,
        ]);
    }

    #[Route('/{id}/Modifier', name: 'comments_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Comments $comment): Response
    {
        $form = $this->createForm(CommentsType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('comments_index');
        }

        return $this->render('comments/edit.html.twig', [
            'comment' => $comment,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'comments_delete', methods: ['POST'])]
    public function delete(Request $request, Comments $comment): Response
    {
        if ($this->isCsrfTokenValid('delete' . $comment->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($comment);
            $entityManager->flush();
        }

        return $this->redirectToRoute('comments_index');
    }
}
