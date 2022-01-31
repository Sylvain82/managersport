<?php

namespace App\Controller;

use App\Entity\Competition;
use App\Entity\Player;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class
PresenceController extends AbstractController
{

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    #[Route('/presence', name: 'presence')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $players = $this->entityManager->getRepository(Player::class)->findAll();

        $event =  $this->entityManager->getRepository(Competition::class)->findAll();


        return $this->render('presence/index.html.twig', [
            'event' => $event,
            'players' => $players
        ]);
    }
}
