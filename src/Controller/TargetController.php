<?php

namespace App\Controller;

use App\Entity\Target;
use App\Form\TargetType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/admin')]
class TargetController extends AbstractController
{
    #[Route('/targets', name: 'create_target')]
    public function target(Request $request, ManagerRegistry $doctrine, ValidatorInterface $validator): Response
    {

        $target = new Target(); 
        $form = $this->createForm(TargetType::class, $target);
        

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {            
            $target = $form->getData();
            $em = $doctrine->getManager();
            $em->persist($target);
            $em->flush();
            return $this->redirectToRoute('select_target');
        }

        $errors = $validator->validate($target);

        return $this->renderForm('admin/pages/targets.html.twig', [
            'form' => $form,
            'errors' => $errors,
        ]);
    }

    #[Route('/select_targets', name: 'select_target')]
    public function select(ManagerRegistry $doctrine): Response
    {
        $repo = $doctrine->getRepository(Target::class);
        $targets = $repo->findAll();
    
        return $this->renderForm("admin/pages/targets.html.twig", [
            "targets" => $targets,
        ]);
    }


    #[Route('/update_target/{id}', name: 'update_target')]
    public function update(Target $target, Request $request, ManagerRegistry $doctrine, ValidatorInterface $validator): Response
    {
    $form = $this->createForm(TargetType::class, $target);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $doctrine->getManager()->flush();
        return $this->redirectToRoute("select_target");
    }

    $errors = $validator->validate($target);

    return $this->renderForm("admin/pages/targets.html.twig", [
        "form" => $form,
        "target" => $target,
        'errors' => $errors ,
    ]);
    }

    #[Route('/delete_target/{id}', name: 'delete_target')]
    public function delete(Target $target, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $em->remove($target);
        $em->flush();
        return $this->redirectToRoute("select_target");
    }

}