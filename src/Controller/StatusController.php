<?php

namespace App\Controller;

use App\Entity\Status;
use App\Form\StatusType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class StatusController extends AbstractController
{
    #[Route('/status', name: 'create_status')]
    public function status(Request $request, ManagerRegistry $doctrine): Response
    {

        $status = new Status(); 
        $form = $this->createForm(StatusType::class, $status);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {            
            $status = $form->getData();
            $em = $doctrine->getManager();
            $em->persist($status);
            $em->flush();
            return $this->redirectToRoute('select_status');
        }

        return $this->renderForm('admin/pages/status.html.twig', [
            'form' => $form ,
        ]);
    }



    #[Route('/select_status', name: 'select_status')]
    public function select(ManagerRegistry $doctrine): Response
    {
        $repo = $doctrine->getRepository(Status::class);
        $status = $repo->findAll();
    
        return $this->renderForm("admin/pages/status.html.twig", [
            "status" =>$status
        ]);
    }


    #[Route('/update_status/{id}', name: 'update_status')]
    public function update(Status $status, Request $request, ManagerRegistry $doctrine): Response
    {
    $form = $this->createForm(StatusType::class, $status);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $doctrine->getManager()->flush();
        return $this->redirectToRoute("select_status");
    }

    return $this->renderForm("admin/pages/status.html.twig", [
        "form" =>$form,
        "status" => $status,
    ]);
    }

    #[Route('/delete_status/{id}', name: 'delete_status')]
    public function delete(Status $status, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $em->remove($status);
        $em->flush();
        return $this->redirectToRoute("select_status");
    }

}