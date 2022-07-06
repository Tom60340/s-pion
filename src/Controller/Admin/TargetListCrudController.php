<?php

namespace App\Controller\Admin;

use App\Entity\TargetList;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TargetListCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TargetList::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
