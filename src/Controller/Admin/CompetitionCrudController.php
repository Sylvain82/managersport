<?php

namespace App\Controller\Admin;

use App\Entity\Competition;
use Couchbase\BooleanFieldSearchQuery;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;



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
            TextField::new('lieu'),
            BooleanField::new('afficher'),
            AssociationField::new('equipe'),

        ];
    }

}
