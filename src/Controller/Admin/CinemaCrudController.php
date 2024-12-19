<?php

namespace App\Controller\Admin;

use App\Entity\Cinema;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class CinemaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cinema::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('nom'),
            TextField::new('portable'),
            TextField::new('email'),
            TextField::new('adresse'),
            TextField::new('seance'),
            TextField::new('accessibilite'),
            ImageField::new('image')
                ->setUploadDir('public/uploads/cinemas')
                ->setBasePath('/uploads/cinemas')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(true),
        ];

    }

}
