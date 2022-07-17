<?php

namespace App\Form;

use App\Entity\Contact;
use App\Entity\Country;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, ["label" => "Prénom"])
            ->add('lastname', TextType::class, ["label" => "Nom"])
            ->add('birthDate', DateType::class, [
                "label" => "Date de naissance",
                'widget' => 'choice',
                'years' => range(date('Y'), date('Y')-1000),
                ])
            ->add('codeName', TextType::class, ["label" => "Nom de code"])
            ->add('country', EntityType::class, [
                "label" => "Pays de résidence",
                'class' => Country::class])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}