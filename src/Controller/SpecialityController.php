<?php

namespace App\Controller;

use App\Entity\Speciality;
use App\Form\SpecialityType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/admin')]
class SpecialityController extends AbstractController
{
    #[Route('/typesStatusSpe', name: 'create_speciality')]
    public function speciality(Request $request, ManagerRegistry $doctrine): Response
    {

        $speciality = new Speciality(); 
        $form = $this->createForm(SpecialityType::class, $speciality);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {            
            $speciality = $form->getData();
            $em = $doctrine->getManager();
            $em->persist($speciality);
            $em->flush();
            return $this->redirectToRoute('select_speciality');
        }

        return $this->renderForm('admin/pages/typesStatusSpe.html.twig', [
            'form' => $form
        ]);
    }



    #[Route('/select_specialities', name: 'select_speciality')]
    public function select(ManagerRegistry $doctrine): Response
    {
        $repo = $doctrine->getRepository(Speciality::class);
        $specialities = $repo->findAll();
    
        return $this->renderForm("admin/pages/typesStatusSpe.html.twig", [
            "specialities" =>$specialities
        ]);
    }


    #[Route('/update_speciality/{id}', name: 'update_speciality')]
    public function update(Speciality $speciality, Request $request, ManagerRegistry $doctrine): Response
    {
    $form = $this->createForm(SpecialityType::class, $speciality);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $doctrine->getManager()->flush();
        return $this->redirectToRoute("select_speciality");
    }

    return $this->renderForm("admin/pages/typesStatusSpe.html.twig", [
        "form" =>$form,
        "speciality" => $speciality,
    ]);
    }

    #[Route('/delete_speciality/{id}', name: 'delete_speciality')]
    public function delete(Speciality $speciality, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $em->remove($speciality);
        $em->flush();
        return $this->redirectToRoute("select_speciality");
    }
}