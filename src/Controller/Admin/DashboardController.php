<?php

namespace App\Controller\Admin;

use App\Entity\Competition;
use App\Entity\Equipe;
use App\Entity\Finance;
use App\Entity\Media;
use App\Entity\Player;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Tableau de bord');
    }

    public function configureMenuItems(): iterable
    {

        yield MenuItem::linkToRoute('Retour site','fas fa-arrow-left', 'home');
        yield MenuItem::linkToCrud('User', 'fas fa-users', User::class);
        yield MenuItem::linkToCrud('Players', 'fas fa-running', Player::class);
        yield MenuItem::linkToCrud('Equipes', 'fas fa-user-friends', Equipe::class);
        yield MenuItem::linkToCrud('Compétitions', 'fas fa-trophy', Competition::class);
        yield MenuItem::linkToCrud('Médias', 'fas fa-image', Media::class);
        yield MenuItem::linkToCrud('Finance', 'fas fa-euro-sign', Finance::class);
    }
}
