<?php

namespace App\Controller;

use App\Entity\Player;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeamController extends AbstractController
{

    #[Route('/team', name: 'team')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $this->entityManager = $entityManager;
        $player  = $this->entityManager->getRepository(Player::class)->findAll();

        return $this->render('team/index.html.twig', [
            'player' => $player,

        ]);
    }

}
