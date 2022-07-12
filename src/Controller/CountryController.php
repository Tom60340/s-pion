<?php

namespace App\Controller;

use App\Entity\Country;
use App\Form\CountryType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class CountryController extends AbstractController
{
    #[Route('/countries', name: 'create_country')]
    public function country(Request $request, ManagerRegistry $doctrine): Response
    {

        $country = new Country(); 
        $form = $this->createForm(CountryType::class, $country);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {            
            $country = $form->getData();
            $em = $doctrine->getManager();
            $em->persist($country);
            $em->flush();
            return $this->redirectToRoute('app_admin');
        }

        return $this->renderForm('admin/pages/countries.html.twig', [
            'form' => $form ,
        ]);
    }

    #[Route('/update_countries/{id}', name: 'update_country')]
    public function update(Country $country, Request $request, ManagerRegistry $doctrine): Response
    {
    $form = $this->createForm(CountryType::class, $country);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $doctrine->getManager()->flush();
        return $this->redirectToRoute("app_admin");
    }

    return $this->renderForm("admin/pages/countries.html.twig", [
        "form" =>$form,
        "country" => $country,
    ]);
    }

}