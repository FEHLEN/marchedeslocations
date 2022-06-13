<?php

namespace App\Controller\Admin;

use App\Entity\Offreslocations;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OffreslocationsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Offreslocations::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('titre'),
            TextareaField::new('description'),
            IntegerField::new('codePostal'),
            TextField::new('ville'),
            BooleanField::new('isBest', 'Le meilleur'),
            AssociationField::new('regions'),
           
        ];
    }
    
}
