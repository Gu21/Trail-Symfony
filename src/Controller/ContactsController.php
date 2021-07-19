<?php

namespace App\Controller;

use App\Entity\Contacts;
use App\Form\ContactsType;
use App\Repository\ContactsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\String\Slugger\SluggerInterface;


#[Route('/contacts')]
class ContactsController extends AbstractController
{
    #[Route('/', name: 'contacts_index', methods: ['GET','POST'])]
    public function index(Request $request, ContactsRepository $contactsRepository, SluggerInterface $slugger): Response
    {
       
            $contact = new Contacts();
            $form = $this->createForm(ContactsType::class, $contact);
            $form->handleRequest($request);
    
            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($contact);
                $entityManager->flush();
    
                return $this->redirectToRoute('contacts_index');
            }
            return $this->render('contacts/index.html.twig', [
                'contacts' => $contactsRepository->findAll(),
                'form' => $form->createView(),
            ]);
    }


    #[Route('/form_Contact', name: 'form_Contact', methods: ['GET','POST'])]
    public function form(Request $request, ContactsRepository $contactsRepository, SluggerInterface $slugger): Response
    {
       
            $contact = new Contacts();
            $form = $this->createForm(ContactsType::class, $contact);
            $form->handleRequest($request);
    
            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($contact);
                $entityManager->flush();
    
                // return $this->redirectToRoute('contacts_index');
            }
            return $this->render('contacts/formContact.html.twig', [
                'contacts' => $contactsRepository->findAll(),
                'form' => $form->createView(),
            ]);
    }

  

    #[Route('/new', name: 'contacts_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
       
     
        $contact = new Contacts();
        $form = $this->createForm(ContactsType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();

            return $this->redirectToRoute('contacts_index');
        }

        return $this->render('contacts/new.html.twig', [
            'contact' => $contact,
            'form' => $form->createView(),
        ]);
    }
  

    #[Route('/{id}', name: 'contacts_show', methods: ['GET'])]
    public function show(Contacts $contact): Response
    {
        return $this->render('contacts/show.html.twig', [
            'contact' => $contact,
        ]);
    }

    #[Route('/{id}/edit', name: 'contacts_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Contacts $contact): Response
    {
        $form = $this->createForm(ContactsType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contacts_index');
        }

        return $this->render('contacts/edit.html.twig', [
            'contact' => $contact,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'contacts_delete', methods: ['POST'])]
    public function delete(Request $request, Contacts $contact): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contact->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contact);
            $entityManager->flush();
        }

        return $this->redirectToRoute('contacts_index');
    }
}
