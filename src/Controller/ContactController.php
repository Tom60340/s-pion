<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class ContactController extends AbstractController
{
    #[Route('/contacts', name: 'create_contact')]
    public function contact(Request $request, ManagerRegistry $doctrine): Response
    {

        $contact = new Contact(); 
        $form = $this->createForm(ContactType::class, $contact);
        

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {            
            $contact = $form->getData();
            $em = $doctrine->getManager();
            $em->persist($contact);
            $em->flush();
            return $this->redirectToRoute('select_contact');
        }

        return $this->renderForm('admin/pages/contacts.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/select_contacts', name: 'select_contact')]
    public function select(ManagerRegistry $doctrine): Response
    {
        $repo = $doctrine->getRepository(Contact::class);
        $contacts = $repo->findAll();
    
        return $this->renderForm("admin/pages/contacts.html.twig", [
            "contacts" => $contacts,
        ]);
    }


    #[Route('/update_contact/{id}', name: 'update_contact')]
    public function update(Contact $contact, Request $request, ManagerRegistry $doctrine): Response
    {
    $form = $this->createForm(ContactType::class, $contact);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $doctrine->getManager()->flush();
        return $this->redirectToRoute("select_contact");
    }

    return $this->renderForm("admin/pages/contacts.html.twig", [
        "form" => $form,
        "contact" => $contact,
    ]);
    }

    #[Route('/delete_contact/{id}', name: 'delete_contact')]
    public function delete(Contact $contact, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $em->remove($contact);
        $em->flush();
        return $this->redirectToRoute("select_contact");
    }

}