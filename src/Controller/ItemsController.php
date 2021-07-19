<?php

namespace App\Controller;

use App\Entity\Items;
use App\Form\ItemsType;
use App\Entity\Comments;
use App\Repository\ItemsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/items')]
class ItemsController extends AbstractController
{
    #[Route('/', name: 'items_index', methods: ['GET','POST'])]
    public function index(ItemsRepository $itemsRepository): Response
    {


        return $this->render('items/index.html.twig', [
            'items' => $itemsRepository->findAll(),
        ]);
    }

    //route pour la relation entre item et le comment (Livre d'or)
    #[Route('/comments/{id}/items', name: 'addItem', methods: ['GET','POST'])]
    public function addItem(Request $request, $id)
    {

        $comment = $this->getDoctrine()->getRepository(Comments::class)->find($id);
		$item = new Items();
		$item-> setComment($comment);
        //date auto du jour
		$item-> setDateItem(new \DateTime());

		$form = $this->createForm(ItemsType::class, $item);

		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$item = $form->getData();

			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->persist($item);
			$entityManager->flush();

			return $this->redirectToRoute('comments_index', ["id"=> $item]);
		}
		return $this->render('items/new.html.twig', ["form"=>$form->createView(),]);
    }



    #[Route('/new', name: 'items_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $item = new Items();
        $form = $this->createForm(ItemsType::class, $item);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($item);
            $entityManager->flush();

            return $this->redirectToRoute('items_index');
        }

        return $this->render('items/new.html.twig', [
            'item' => $item,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'items_show', methods: ['GET'])]
    public function show(Items $item): Response
    {
        return $this->render('items/show.html.twig', [
            'item' => $item,
        ]);
    }

    #[Route('/{id}/edit', name: 'items_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Items $item): Response
    {
        $form = $this->createForm(ItemsType::class, $item);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('items_index');
        }

        return $this->render('items/edit.html.twig', [
            'item' => $item,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'items_delete', methods: ['POST'])]
    public function delete(Request $request, Items $item): Response
    {
        if ($this->isCsrfTokenValid('delete'.$item->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($item);
            $entityManager->flush();
        }

        return $this->redirectToRoute('items_index');
    }
}
