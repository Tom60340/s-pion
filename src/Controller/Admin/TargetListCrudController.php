<?php

namespace App\Controller\Admin;

use App\Entity\TargetList;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class TargetListCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TargetList::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('target', 'target_id'),
            AssociationField::new('mission', 'mission_id'),
        ];
    }

    public function persistEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof TargetList) return;
        parent::persistEntity($em, $entityInstance);
    }
        
}