<?php

namespace App\Controller;

use App\Entity\MissionType;
use App\Form\MissionTypeType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class MissionTypeController extends AbstractController
{
    #[Route('/missionType', name: 'create_missionType')]
    public function missionType(Request $request, ManagerRegistry $doctrine): Response
    {

        $missionType = new MissionType(); 
        $form = $this->createForm(MissionTypeType::class, $missionType);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {            
            $missionType = $form->getData();
            $em = $doctrine->getManager();
            $em->persist($missionType);
            $em->flush();
            return $this->redirectToRoute('select_missionTypes');
        }

        return $this->renderForm('admin/pages/missionType.html.twig', [
            'form' => $form ,
        ]);
    }



    #[Route('/select_missionTypes', name: 'select_missionTypes')]
    public function select(ManagerRegistry $doctrine): Response
    {
        $repo = $doctrine->getRepository(MissionType::class);
        $missionType = $repo->findAll();
    
        return $this->renderForm("admin/pages/missionType.html.twig", [
            "missionType" =>$missionType
        ]);
    }


    #[Route('/update_missionType/{id}', name: 'update_missionType')]
    public function update(MissionType $missionType, Request $request, ManagerRegistry $doctrine): Response
    {
    $form = $this->createForm(MissionTypeType::class, $missionType);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $doctrine->getManager()->flush();
        return $this->redirectToRoute("select_missionTypes");
    }

    return $this->renderForm("admin/pages/missionType.html.twig", [
        "form" =>$form,
        "missionType" => $missionType,
    ]);
    }

    #[Route('/delete_missionType/{id}', name: 'delete_missionType')]
    public function delete(MissionType $missionType, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $em->remove($missionType);
        $em->flush();
        return $this->redirectToRoute("select_missionTypes");
    }

}