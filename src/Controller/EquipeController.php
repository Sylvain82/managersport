<?php

namespace App\Controller;

use App\Entity\Competition;
use App\Entity\Equipe;
use App\Entity\Player;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EquipeController extends AbstractController
{
    #[Route('/equipe', name: 'equipe')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $this->entityManager = $entityManager;

        $joueur  = $this->entityManager->getRepository(Player::class)->findAll();
        $equipe = $this->entityManager->getRepository(Equipe::class)->findAll();


        return $this->render('equipe/index.html.twig',  [
            'joueur' => $joueur,
            'equipe' => $equipe,
        ]);
    }

    #[Route('/equip/{id}', name: 'equip')]
    public function show(EntityManagerInterface $entityManager, $id): Response
    {
        $this->entityManager = $entityManager;

        $selection = $this->entityManager->getRepository(Player::class)->findByEquipe($id);


        if(!$selection) {
            return $this->redirectToRoute('equipe');
        }

        return $this->render('equipe/show.html.twig',[
            'selection' => $selection

        ]);
    }



}
