<?php

namespace App\Controller\Admin;

use App\Entity\Competition;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;


class CompetitionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Competition::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [

            DateTimeField::new('heureBis'),
            TextField::new('type'),
            TextField::new('stade'),
            UrlField::new('lieu'),
            TextField::new('carte'),
            BooleanField::new('afficher'),
            TextField::new('adversaire'),
            TextField::new('score'),
            AssociationField::new('equipe'),

        ];
    }

}
