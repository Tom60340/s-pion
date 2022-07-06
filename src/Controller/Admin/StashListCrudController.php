<?php

namespace App\Controller\Admin;

use App\Entity\StashList;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class StashListCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return StashList::class;
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
