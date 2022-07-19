<?php

namespace App\Controller;

use App\Entity\Country;
use App\Form\CountryType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/admin')]
class CountryController extends AbstractController
{
    #[Route('/countries', name: 'create_country')]
    public function country(Request $request, ManagerRegistry $doctrine, ValidatorInterface $validator): Response
    {

        $country = new Country(); 
        $form = $this->createForm(CountryType::class, $country);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {            
            $country = $form->getData();
            $em = $doctrine->getManager();
            $em->persist($country);
            $em->flush();
            return $this->redirectToRoute('select_country');
        }

        $errors = $validator->validate($country);

        return $this->renderForm('admin/pages/countries.html.twig', [
            'form' => $form ,
            'errors' => $errors,
        ]);
    }



    #[Route('/select_countries', name: 'select_country')]
    public function select(ManagerRegistry $doctrine): Response
    {
        $repo = $doctrine->getRepository(Country::class);
        $countries = $repo->findAll();
    
        return $this->renderForm("admin/pages/countries.html.twig", [
            "countries" =>$countries
        ]);
    }


    #[Route('/update_country/{id}', name: 'update_country')]
    public function update(Country $country, Request $request, ManagerRegistry $doctrine, ValidatorInterface $validator): Response
    {
    $form = $this->createForm(CountryType::class, $country);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $doctrine->getManager()->flush();
        return $this->redirectToRoute("select_country");
    }

    $errors = $validator->validate($country);

    return $this->renderForm("admin/pages/countries.html.twig", [
        "form" =>$form,
        "country" => $country,
        'errors' => $errors ,
    ]);
    }

    #[Route('/delete_country/{id}', name: 'delete_country')]
    public function delete(Country $country, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $em->remove($country);
        $em->flush();
        return $this->redirectToRoute("select_country");
    }

}