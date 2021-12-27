<?php

namespace App\Controller;

use App\Entity\Competition;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResultatController extends AbstractController
{
    #[Route('/resultat', name: 'resultat')]
    public function index(EntityManagerInterface $entityManager): Response
    {

        $this->entityManager = $entityManager;
        $resultat = $this->entityManager->getRepository(Competition::class)->findAll();


        return $this->render('resultat/index.html.twig',
            [
            'resultat' => $resultat,

        ]);
    }
}
