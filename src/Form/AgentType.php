<?php

namespace App\Form;

use App\Entity\Agent;
use App\Entity\Country;
use App\Entity\Speciality;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AgentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, ["label" => "Prénom"])
            ->add('lastname', TextType::class, ["label" => "Nom"])
            ->add('birthDate', DateType::class, ["label" => "Date de naissance"])
            ->add('code', IntegerType::class, ["label" => "Code d'identification"])
            ->add('country', EntityType::class, [
                "label" => "Pays de résidence",
                'class' => Country::class,])
            ->add('speciality', EntityType::class, [
                'label' => "Spécialité",
                'class' => Speciality::class,]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Agent::class,
        ]);
    }
}