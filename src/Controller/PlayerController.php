<?php

namespace App\Controller;

use App\Entity\Player;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlayerController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }

    #[Route('/joueurs', name: 'players')]
    public function index(): Response
    {
        $players = $this->entityManager->getRepository(Player::class)->findAll();

        return $this->render('players/index.html.twig',[
            'players' => $players
        ]);
    }


    #[Route('/joueur/{slug}', name: 'player')]
    public function show($slug): Response
    {
        $player = $this->entityManager->getRepository(Player::class)->findOneBySlug($slug);

        $dateNaissance = $player->getDateNaissance($player)->Format("y-m-d");
        $aujourdhui = date("Y-m-d");
        $diff = date_diff(date_create($dateNaissance), date_create($aujourdhui));
        $age = $diff->format('%y');


        if(!$player) {
            return $this->redirectToRoute('players');
        }


        return $this->render('players/show.html.twig',[
            'player' => $player,
            'age' => $age

        ]);
    }


}

