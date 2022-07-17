<?php

namespace App\Form;

use App\Entity\Country;
use App\Entity\Stash;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StashType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code', IntegerType::class, ["label" => "Code d'entrée"])
            ->add('address', TextType::class, ["label" => "Adresse de la planque"])
            ->add('type', TextType::class, ["label" => "Type de planque"])
            ->add('country', EntityType::class, [
                "label" => "Pays de résidence",
                'class' => Country::class])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Stash::class,
        ]);
    }
}