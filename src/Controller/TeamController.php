<?php

namespace App\Controller;

use App\Entity\Equipe;
use App\Entity\Player;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeamController extends AbstractController
{

    #[Route('/team', name: 'team')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $this->entityManager = $entityManager;

        $players  = $this->entityManager->getRepository(Player::class)->findAll();

        $equipes = $this->entityManager->getRepository(Equipe::class)->findAll();

        return $this->render('team/index.html.twig', [
            'players' => $players,
            'equipes' => $equipes

        ]);
    }


    #[Route('/detail/{slug}', name: 'detail')]
    public function show($slug): Response
    {


        $detail = $this->entityManager->getRepository(Player::class)->findOneBySlug($slug);

        if(!$detail) {
            return $this->redirectToRoute('team');
        }
        return $this->render('team/show.html.twig',[
            'detail' => $detail,
        ]);
    }

}
