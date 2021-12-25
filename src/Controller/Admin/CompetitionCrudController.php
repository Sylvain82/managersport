<?php

namespace App\Controller\Admin;

use App\Entity\Competition;
use Couchbase\BooleanFieldSearchQuery;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Config\Definition\BooleanNode;
use Twig\Extensions\DateExtension;


class CompetitionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Competition::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new('type'),
            TextField::new('date'),
            TextField::new('lieu'),
            BooleanField::new('afficher'),
            AssociationField::new('equipe'),

        ];
    }

}
