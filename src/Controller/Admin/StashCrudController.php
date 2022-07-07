<?php

namespace App\Controller\Admin;

use App\Entity\Stash;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class StashCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Stash::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            IntegerField::new('code'),
            TextField::new('address'),
            TextField::new('type'),
            AssociationField::new('country'),
        ];
    }

    public function persistEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof Stash) return;
        parent::persistEntity($em, $entityInstance);
    }
    
    
}