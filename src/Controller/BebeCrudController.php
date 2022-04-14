<?php

namespace App\Controller;

use App\Entity\Bebe;
use App\Form\BebeType;
use App\Repository\BebeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/bebe/crud')]
class BebeCrudController extends AbstractController
{
    #[Route('/', name: 'app_bebe_crud_index', methods: ['GET'])]
    public function index(BebeRepository $bebeRepository): Response
    {
        return $this->render('bebe_crud/index.html.twig', [
            'bebes' => $bebeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_bebe_crud_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BebeRepository $bebeRepository): Response
    {
        $bebe = new Bebe();
        $form = $this->createForm(BebeType::class, $bebe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bebeRepository->add($bebe);
            return $this->redirectToRoute('app_bebe_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bebe_crud/new.html.twig', [
            'bebe' => $bebe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bebe_crud_show', methods: ['GET'])]
    public function show(Bebe $bebe): Response
    {
        return $this->render('bebe_crud/show.html.twig', [
            'bebe' => $bebe,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_bebe_crud_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Bebe $bebe, BebeRepository $bebeRepository): Response
    {
        $form = $this->createForm(BebeType::class, $bebe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bebeRepository->add($bebe);
            return $this->redirectToRoute('app_bebe_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bebe_crud/edit.html.twig', [
            'bebe' => $bebe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bebe_crud_delete', methods: ['POST'])]
    public function delete(Request $request, Bebe $bebe, BebeRepository $bebeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bebe->getId(), $request->request->get('_token'))) {
            $bebeRepository->remove($bebe);
        }

        return $this->redirectToRoute('app_bebe_crud_index', [], Response::HTTP_SEE_OTHER);
    }
}
