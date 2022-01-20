<?php

namespace App\Controller\Admin;

use App\Entity\Finance;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FinanceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Finance::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            DateTimeField::new('date')->setFormat('d-M-Y') ,
            TextField::new('nom'),
            ChoiceField::new('categorie')
                ->setChoices([
                    'Equipements' => 'Equipements',
                     'Sponsoring' => 'Sponsoring' ,
                     'Buvette' => 'Buvette',
                        'Compétitions' => 'Compétitions',
                        'Evenements(Loto, repas, sorties)' => 'Événements(Loto, repas, sorties)'
                        ]
                ),
            BooleanField::new('recette'),
            TextEditorField::new('justification'),
            MoneyField::new('montant')->setCurrency('EUR'),
            ImageField::new('facture')
                ->setBasePath('img/')
                ->setUploadDir('public/img/')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired('false'),

        ];
    }

}
