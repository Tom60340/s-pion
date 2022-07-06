<?php

namespace App\Controller\Admin;

use App\Entity\Stash;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class StashCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Stash::class;
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
