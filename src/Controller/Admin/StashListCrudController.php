<?php

namespace App\Controller\Admin;

use App\Entity\StashList;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class StashListCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return StashList::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('stash'),
            AssociationField::new('mission'),
        ];
    }
    
    public function persistEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof StashList) return;
        parent::persistEntity($em, $entityInstance);
    }
    
}