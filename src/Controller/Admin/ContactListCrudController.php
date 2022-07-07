<?php

namespace App\Controller\Admin;

use App\Entity\ContactList;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class ContactListCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ContactList::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('contact'),
            AssociationField::new('mission'),
        ];
    }
    
    public function persistEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof ContactList) return;
        parent::persistEntity($em, $entityInstance);
    }
    

}