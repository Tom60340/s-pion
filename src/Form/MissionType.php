<?php

namespace App\Form;

use App\Entity\Mission;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MissionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, ["label" => "Titre de la mission"])
            ->add('description', TextareaType::class, ["label" => "Description de la mission"])
            ->add('codeName', TextType::class, ["label" => "Nom de code de la mission"])
            ->add('startDate', DateTimeType::class, ["label" => "Début de la mission"])
            ->add('endDate', DateTimeType::class, ["label" => "Fin de la mission"])
            ->add('agentList', TextType::class, ["label" => "Liste des agents"])
            ->add('stashList', TextType::class, ["label" => "Liste des planques"])
            ->add('contactList', TextType::class, ["label" => "Liste des contacts"])
            ->add('targetList', TextType::class, ["label" => "Liste des cibles"])
            ->add('speciality', TextType::class, ["label" => "Spécialité requise"])
            ->add('missionType', TextType::class, ["label" => "Type de la mission"])
            ->add('status', TextType::class, ["label" => "Statut de la mission"])
            ->add('country', TextType::class, ["label" => "Pays de la mission"])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Mission::class,
        ]);
    }
}