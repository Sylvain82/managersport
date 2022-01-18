<?php

namespace App\Controller;

use App\Entity\Finance;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ComptabiliteController extends AbstractController
{
    #[Route('/comptabilite', name: 'comptabilite')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $this->entityManager = $entityManager;

        $finance = $this->entityManager->getRepository(Finance::class)->findAll();

        return $this->render('comptabilite/index.html.twig', [
            'finance' => $finance
        ]);
    }

}
