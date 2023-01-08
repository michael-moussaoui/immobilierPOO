<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;


class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }


    public function configureFields(string $pageName): iterable
    {

        yield TextField::new('name');
        yield SlugField::new('slug')->setTargetFieldName('name');
        yield TextareaField::new('description');
        yield AssociationField::new('typeof');
        // yield TextField::new('type'),
        yield MoneyField::new('price')->setCurrency('EUR');
        yield ImageField::new('picture')
            ->setFormTypeOptions([
                'mapped' => false,
                'required' => false
            ])
            ->setBasePath('uploads/')
            ->setUploadDir('public/uploads/')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false);
        yield AssociationField::new('announcement');
        yield IntegerField::new('aera');
        yield IntegerField::new('room');
    }
}
