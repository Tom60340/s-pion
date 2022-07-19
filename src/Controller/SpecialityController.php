<?php

namespace App\Controller;

use App\Entity\Speciality;
use App\Form\SpecialityType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;


#[Route('/admin')]
class SpecialityController extends AbstractController
{
    #[Route('/specialities', name: 'create_speciality')]
    public function speciality(Request $request, ManagerRegistry $doctrine,ValidatorInterface $validator): Response
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

        $errors = $validator->validate($speciality);

        return $this->renderForm('admin/pages/specialities.html.twig', [
            'form' => $form,
            'errors' => $errors,
        ]);
    }



    #[Route('/select_specialities', name: 'select_speciality')]
    public function select(ManagerRegistry $doctrine): Response
    {
        $repo = $doctrine->getRepository(Speciality::class);
        $specialities = $repo->findAll();
    
        return $this->renderForm("admin/pages/specialities.html.twig", [
            "specialities" =>$specialities
        ]);
    }


    #[Route('/update_speciality/{id}', name: 'update_speciality')]
    public function update(Speciality $speciality, Request $request, ManagerRegistry $doctrine,ValidatorInterface $validator): Response
    {
    $form = $this->createForm(SpecialityType::class, $speciality);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $doctrine->getManager()->flush();
        return $this->redirectToRoute("select_speciality");
    }

    $errors = $validator->validate($speciality);

    return $this->renderForm("admin/pages/specialities.html.twig", [
        "form" =>$form,
        "speciality" => $speciality,
        'errors' => $errors ,
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