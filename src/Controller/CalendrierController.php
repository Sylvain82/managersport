<?php

namespace App\Controller;

use App\Entity\Competition;
use App\Entity\Equipe;
use App\Entity\Player;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CalendrierController extends AbstractController
{
    #[Route('/calendrier', name: 'calendrier')]
    public function index(EntityManagerInterface $entityManager): Response
    {

        $this->entityManager = $entityManager;

        $calendrier = $this->entityManager->getRepository(Competition::class)->findAll();

        return $this->render('calendrier/index.html.twig', [
            'calendrier' => $calendrier,
        ]);

    }


        #[Route('/calendrier/{nom}', name: 'calequipe')]

    public function Show(EntityManagerInterface $entityManager , $nom): Response
    {


        $this->entityManager = $entityManager;

        $players = $this->entityManager->getRepository(Equipe::class)->findByNom($nom);
        $selection = $this->entityManager->getRepository(Player::class)->findByEquipe($players);

        if(!$selection) {
            return $this->redirectToRoute('equipe');
        }
        return $this->render('equipe/show.html.twig', [
            'selection' => $selection
        ]);
    }


}
