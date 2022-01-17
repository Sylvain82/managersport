<?php

namespace App\Controller\Admin;

use App\Entity\Finance;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Validator\Constraints\Date;

class FinanceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Finance::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            DateField::new('date'),
            TextField::new('nom'),
            ChoiceField::new('categorie')
                ->setChoices([
                    'equipement' => 'equipements',
                     'sponsor' => 'sponsor' ,
                     'buvette' => 'buvette',
                      'inscription' => 'inscription compétition'
                        ]
                ),
            BooleanField::new('type'),
            TextField::new('justification'),
            MoneyField::new('montant')->setCurrency('EUR'),
        ];
    }

}
