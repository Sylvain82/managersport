<?php

namespace App\Controller;

use App\Entity\Finance;
use App\Form\FinanceType;
use App\Repository\FinanceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/finance')]
class FinanceController extends AbstractController
{
    #[Route('/', name: 'finance_index', methods: ['GET'])]
    public function index(FinanceRepository $financeRepository): Response
    {
        return $this->render('finance/index.html.twig', [
            'finances' => $financeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'finance_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $finance = new Finance();
        $form = $this->createForm(FinanceType::class, $finance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($finance);
            $entityManager->flush();

            return $this->redirectToRoute('finance_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('finance/new.html.twig', [
            'finance' => $finance,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'finance_show', methods: ['GET'])]
    public function show(Finance $finance): Response
    {
        return $this->render('finance/show.html.twig', [
            'finance' => $finance,
        ]);
    }

    #[Route('/{id}/edit', name: 'finance_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Finance $finance, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FinanceType::class, $finance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('finance_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('finance/edit.html.twig', [
            'finance' => $finance,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'finance_delete', methods: ['POST'])]
    public function delete(Request $request, Finance $finance, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$finance->getId(), $request->request->get('_token'))) {
            $entityManager->remove($finance);
            $entityManager->flush();
        }

        return $this->redirectToRoute('finance_index', [], Response::HTTP_SEE_OTHER);
    }
}
