<?php

namespace App\Controller\Admin;

use App\Entity\Curiosites;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CuriositesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Curiosites::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('titre'),
            TextareaField::new('description'),
            TextField::new('ville'),
            IntegerField::new('codePostal'),
            TextField::new('adresseHttp'),
            DateTimeField::new('createdAt'),
            AssociationField::new('region'),
            ImageField::new('image')->setBasePath('assets/uploads/curiosites/')
            ->setUploadDir('public/assets/uploads/curiosites/')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false),

        ];
    }
    
}
