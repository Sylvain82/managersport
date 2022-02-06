<?php

namespace App\Controller;

use App\Entity\Finance;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FinanceController extends AbstractController
{
    #[Route('/finance', name: 'finance')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $this->entitymanager = $entityManager;

        $finances = $this->entitymanager->getRepository(Finance::class)->findAll();

        return $this->render('finance/index.html.twig', [
            'finances' => $finances,
        ]);
    }
}
