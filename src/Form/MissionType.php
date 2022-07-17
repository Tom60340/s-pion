<?php

namespace App\Form;

use App\Entity\Agent;
use App\Entity\Country;
use App\Entity\Mission;
use App\Entity\MissionType as EntityMissionType;
use App\Entity\Speciality;
use App\Entity\Status;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
            ->add('startDate', DateTimeType::class, [
                "label" => "Début de la mission",
                'years' => range(date('Y'), date('Y')+100),
                ])
            ->add('endDate', DateTimeType::class, [
                "label" => "Fin de la mission",
                'years' => range(date('Y'), date('Y')+100),
                ])
            ->add('agentList')
            // ->add('stash', TextType::class, ["label" => "Liste des planques"])
            // ->add('contact', TextType::class, ["label" => "Liste des contacts"])
            // ->add('target', TextType::class, ["label" => "Liste des cibles"])
            ->add('speciality', EntityType::class, [
                "label" => "Spécialité requise",
                'class' => Speciality::class,
                ])
            ->add('missionType',  EntityType::class, [
                "label" => "Type de la mission",
                'class' => EntityMissionType::class,
                ])
            ->add('status', EntityType::class, [
                "label" => "Statut de la mission",
                'class' => Status::class,
                ])
            ->add('country', EntityType::class, [
                'label' => 'Pays de la mission',
                'class' => Country::class,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Mission::class,
        ]);
    }
}