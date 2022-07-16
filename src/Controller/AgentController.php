<?php

namespace App\Controller;

use App\Entity\Agent;
use App\Form\AgentType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class AgentController extends AbstractController
{
    #[Route('/agents', name: 'create_agent')]
    public function agent(Request $request, ManagerRegistry $doctrine): Response
    {

        $agent = new Agent(); 
        $form = $this->createForm(AgentType::class, $agent);
        

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {            
            $agent = $form->getData();
            $em = $doctrine->getManager();
            $em->persist($agent);
            $em->flush();
            return $this->redirectToRoute('select_agent');
        }

        return $this->renderForm('admin/pages/agents.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/select_agents', name: 'select_agent')]
    public function select(ManagerRegistry $doctrine): Response
    {
        $repo = $doctrine->getRepository(Agent::class);
        $agents = $repo->findAll();
    
        return $this->renderForm("admin/pages/agents.html.twig", [
            "agents" => $agents,
        ]);
    }


    #[Route('/update_agent/{id}', name: 'update_agent')]
    public function update(Agent $agent, Request $request, ManagerRegistry $doctrine): Response
    {
    $form = $this->createForm(AgentType::class, $agent);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $doctrine->getManager()->flush();
        return $this->redirectToRoute("select_agent");
    }

    return $this->renderForm("admin/pages/agents.html.twig", [
        "form" => $form,
        "agent" => $agent,
    ]);
    }

    #[Route('/delete_agent/{id}', name: 'delete_agent')]
    public function delete(Agent $agent, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $em->remove($agent);
        $em->flush();
        return $this->redirectToRoute("select_agent");
    }

}