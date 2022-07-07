<?php

namespace App\Controller\Admin;

use App\Entity\AgentList;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class AgentListCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AgentList::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('agent'),
            AssociationField::new('mission'),
        ];
    }

    public function persistEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof AgentList) return;
        parent::persistEntity($em, $entityInstance);
    }
    
    
}