<?php

namespace App\Controller;

use App\Entity\Mixeur;
use App\Form\MixeurType;
use App\Repository\MixeurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/mixeur')]
class MixeurController extends AbstractController
{
    #[Route('/', name: 'app_mixeur_index', methods: ['GET'])]
    public function index(MixeurRepository $mixeurRepository): Response
    {
        return $this->render('mixeur/index.html.twig', [
            'mixeurs' => $mixeurRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_mixeur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MixeurRepository $mixeurRepository): Response
    {
        $mixeur = new Mixeur();
        $form = $this->createForm(MixeurType::class, $mixeur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $mixeurRepository->add($mixeur);
            return $this->redirectToRoute('app_mixeur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('mixeur/new.html.twig', [
            'mixeur' => $mixeur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_mixeur_show', methods: ['GET'])]
    public function show(Mixeur $mixeur): Response
    {
        return $this->render('mixeur/show.html.twig', [
            'mixeur' => $mixeur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_mixeur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Mixeur $mixeur, MixeurRepository $mixeurRepository): Response
    {
        $form = $this->createForm(MixeurType::class, $mixeur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $mixeurRepository->add($mixeur);
            return $this->redirectToRoute('app_mixeur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('mixeur/edit.html.twig', [
            'mixeur' => $mixeur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_mixeur_delete', methods: ['POST'])]
    public function delete(Request $request, Mixeur $mixeur, MixeurRepository $mixeurRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mixeur->getId(), $request->request->get('_token'))) {
            $mixeurRepository->remove($mixeur);
        }

        return $this->redirectToRoute('app_mixeur_index', [], Response::HTTP_SEE_OTHER);
    }
}
