<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/admin')]
class AdminController extends AbstractController
{
    #[Route('/', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/pages/homeAdmin.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[Route('/missions', name: 'app_admin_missions')]
    public function missions(): Response
    {
        return $this->render('admin/pages/missions.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[Route('/countries', name: 'app_admin_country')]
    public function countries(): Response
    {
        return $this->render('admin/pages/countries.html.twig', [
            'controller_name' => 'AdminController',
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