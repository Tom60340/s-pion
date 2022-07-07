<?php

namespace App\Controller\Admin;

use App\Entity\MissionType;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MissionTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MissionType::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('type'),
        ];
    }
    

    public function persistEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof MissionType) return;
        parent::persistEntity($em, $entityInstance);
    }
    
}