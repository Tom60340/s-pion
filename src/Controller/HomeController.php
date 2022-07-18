<?php

namespace App\Controller;

use App\Entity\Mission;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ManagerRegistry $doctrine): Response
    {

        $repo = $doctrine->getRepository(Mission::class);
        $missions = $repo->findAll();

        return $this->render('main/index.html.twig', [
            'missions' => $missions,
        ]);
    }
}