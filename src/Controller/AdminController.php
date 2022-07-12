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

    #[Route('/agents', name: 'app_admin_agents')]
    public function agents(): Response
    {
        return $this->render('admin/pages/agents.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[Route('/contacts', name: 'app_admin_contacts')]
    public function contacts(): Response
    {
        return $this->render('admin/pages/contacts.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[Route('/targets', name: 'app_admin_targets')]
    public function targets(): Response
    {
        return $this->render('admin/pages/targets.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[Route('/stashes', name: 'app_admin_stashes')]
    public function stashes(): Response
    {
        return $this->render('admin/pages/stashes.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[Route('/typesStatusSpe', name: 'app_admin_typesStatusSpe')]
    public function typesStatusSpe(): Response
    {
        return $this->render('admin/pages/typesStatusSpe.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

}