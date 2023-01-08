<?php

namespace App\Controller\Admin;

use App\Entity\Typeof;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypeofCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Typeof::class;
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
