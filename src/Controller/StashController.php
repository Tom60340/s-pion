<?php

namespace App\Controller;

use App\Entity\Stash;
use App\Form\StashType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class StashController extends AbstractController
{
    #[Route('/stashs', name: 'create_stash')]
    public function stash(Request $request, ManagerRegistry $doctrine): Response
    {

        $stash = new Stash(); 
        $form = $this->createForm(StashType::class, $stash);
        

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {            
            $stash = $form->getData();
            $em = $doctrine->getManager();
            $em->persist($stash);
            $em->flush();
            return $this->redirectToRoute('select_stash');
        }

        return $this->renderForm('admin/pages/stashes.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/select_stashes', name: 'select_stash')]
    public function select(ManagerRegistry $doctrine): Response
    {
        $repo = $doctrine->getRepository(Stash::class);
        $stashs = $repo->findAll();
    
        return $this->renderForm("admin/pages/stashes.html.twig", [
            "stashs" => $stashs,
        ]);
    }


    #[Route('/update_stash/{id}', name: 'update_stash')]
    public function update(Stash $stash, Request $request, ManagerRegistry $doctrine): Response
    {
    $form = $this->createForm(StashType::class, $stash);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $doctrine->getManager()->flush();
        return $this->redirectToRoute("select_stash");
    }

    return $this->renderForm("admin/pages/stashes.html.twig", [
        "form" => $form,
        "stash" => $stash,
    ]);
    }

    #[Route('/delete_stash/{id}', name: 'delete_stash')]
    public function delete(Stash $stash, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $em->remove($stash);
        $em->flush();
        return $this->redirectToRoute("select_stash");
    }

}