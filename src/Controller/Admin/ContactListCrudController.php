<?php

namespace App\Controller\Admin;

use App\Entity\ContactList;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ContactListCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ContactList::class;
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
