<?php

namespace App\Controller;

use App\Entity\Competition;
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

        $calendrier  = $this->entityManager->getRepository(Competition::class)->findAll();

        return $this->render('calendrier/index.html.twig', [
            'calendrier' => $calendrier,
        ]);
    }
}
