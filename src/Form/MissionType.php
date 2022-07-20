<?php

namespace App\Form;

use App\Entity\Agent;
use App\Entity\Country;
use App\Entity\Mission;
use App\Entity\MissionType as EntityMissionType;
use App\Entity\Speciality;
use App\Entity\Status;
use App\Entity\Target;
use App\Repository\TargetRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MissionType extends AbstractType
{
    public function __construct(private TargetRepository $targetRepository){}

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event){
            $agent = $event->getData()['agent'] ?? null;

        $targets = $agent === null ? [] : $this->targetRepository->findByCountryDiffOfAgent($agent);

        $event->getForm()->add('targetList',EntityType::class, [
            'class' => Target::class,
            'choice_label' => 'firstname',
            'choices' => $targets,
            'multiple' => true,
        ]);
        })
        ->add('agentList',EntityType::class, [
            'class' => Agent::class,
            'choice_label' => 'firstname',
            'multiple' => true,              
        ])
            // ->add('title', TextType::class, ["label" => "Titre de la mission"])
            // ->add('description', TextareaType::class, ["label" => "Description de la mission"])
            // ->add('codeName', TextType::class, ["label" => "Nom de code de la mission"])
            // ->add('startDate', DateTimeType::class, [
            //     "label" => "Début de la mission",
            //     'years' => range(date('Y'), date('Y')+100),
            //     ])
            // ->add('endDate', DateTimeType::class, [
            //     "label" => "Fin de la mission",
            //     'years' => range(date('Y'), date('Y')+100),
            // ])        
            // ->add('country', EntityType::class, [
            //     'label' => 'Pays de la mission',
            //     'class' => Country::class, 
            // ])
            // ->add('agentList')
            // ->add('stashList')
            // ->add('contactList')
            // ->add('targetList')
            // ->add('speciality', EntityType::class, [
            //     "label" => "Spécialité requise",
            //     'class' => Speciality::class,
            //     ])
            // ->add('missionType',  EntityType::class, [
            //     "label" => "Type de la mission",
            //     'class' => EntityMissionType::class,
            //     ])
            // ->add('status', EntityType::class, [
            //     "label" => "Statut de la mission",
            //     'class' => Status::class,
            //     ])            
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => null,
        ]);
    }
}