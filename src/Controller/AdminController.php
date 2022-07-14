<?php

namespace App\Controller;

use App\Entity\Mission;
use App\Form\MissionType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class AdminController extends AbstractController
{
    #[Route('/', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/pages/homeAdmin.html.twig', [
        ]);
    }

    #[Route('/missions', name: 'create_mission')]
    public function mission(Request $request, ManagerRegistry $doctrine): Response
    {          
        $mission = new Mission(); 
        $form = $this->createForm(MissionType::class, $mission);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {            
            $mission = $form->getData();
            $em = $doctrine->getManager();
            $em->persist($mission);
            $em->flush();
            return $this->redirectToRoute('app_admin');
        }

        return $this->renderForm('admin/pages/missions.html.twig', [
            'form' => $form ,
        ]);
    }   

}