<?php

namespace App\Controller\Admin;

use App\Entity\Film;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FilmCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Film::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [ IdField::new('id')->hideOnForm(),
            TextField::new('titre'),
            TextareaField::new('description'),
            TextField::new('image'),
            ChoiceField::new('accessibilite') ->setChoices([ 'Personne sourdes' => 'Personne sourdes',
                'Personnes Malvoyantes ou non voyantes' => 'Personnes Malvoyantes ou non voyantes',
                'Fauteuil roulant' => 'Fauteuil roulant',
                'Protese auditive' => 'Protese auditive',
                'Assistance médicale' =>  'Assistance médicale',
                'Muet' => 'Muet']) ->allowMultipleChoices(),
            DateTimeField::new('dateSortie'),
            TextField::new('realisateur'),
            AssociationField::new('cinemas')
        ];
    }

}
