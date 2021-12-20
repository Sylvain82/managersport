<?php

namespace App\Controller\Admin;

use App\Entity\Player;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PlayerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Player::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextField::new('firstname'),
            AssociationField::new('team'),
            TelephoneField::new('phone'),
            TextField::new('licence'),
            EmailField::new('email'),
            TextField::new('position'),
            ImageField::new('photo')->setBasePath('img/')
                ->setUploadDir('public/img/')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired('false'),
            TextField::new('adressePostale'),
        ];
    }

}
