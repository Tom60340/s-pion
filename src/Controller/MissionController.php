<?php

namespace App\Controller;

use App\Entity\Agent;
use App\Entity\Mission;
use App\Entity\Target;
use App\Form\MissionType;
use App\Repository\AgentRepository;
use App\Repository\CountryRepository;
use App\Repository\TargetRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/admin')]
class MissionController extends AbstractController
{
    #[Route('/', name: 'app_admin')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repo = $doctrine->getRepository(Mission::class);
        $missions = $repo->findAll();
    
        return $this->renderForm("admin/pages/missions.html.twig", [
            "missions" =>$missions
        ]);
    }

    #[Route('/missions', name: 'create_mission')]
    public function mission(Request $request, ManagerRegistry $doctrine, ValidatorInterface $validator, AgentRepository $agentRepository, TargetRepository $targetRepository): Response
    {          
        $mission = new Mission(); 
    $form = $this->createForm(MissionType::class, ['agent' =>$agentRepository->find(1)]);            

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
        //     $mission = $form->getData();
        //     $em = $doctrine->getManager();
        //     $em->persist($mission);
        //     $em->flush();
        //     return $this->redirectToRoute('app_admin');
        }

        $errors = $validator->validate($mission);

        return $this->renderForm('admin/pages/missions.html.twig', [
            'form' => $form ,
            'errors' => $errors,
        ]);
    }
    
}