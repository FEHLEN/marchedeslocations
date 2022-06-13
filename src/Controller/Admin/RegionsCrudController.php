<?php

namespace App\Controller\Admin;

use App\Entity\Regions;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RegionsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Regions::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
        ];
    }
    
}
