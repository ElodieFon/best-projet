<?php

namespace App\Controller;

use App\Entity\CommentaireProduit;
use App\Form\CommentaireProduitType;
use App\Repository\CommentaireProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/commentaire/produit')]
class CommentaireProduitController extends AbstractController
{
    #[Route('/', name: 'app_commentaire_produit_index', methods: ['GET'])]
    public function index(CommentaireProduitRepository $commentaireProduitRepository): Response
    {
        return $this->render('commentaire_produit/index.html.twig', [
            'commentaire_produits' => $commentaireProduitRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_commentaire_produit_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CommentaireProduitRepository $commentaireProduitRepository): Response
    {
        $commentaireProduit = new CommentaireProduit();
        $form = $this->createForm(CommentaireProduitType::class, $commentaireProduit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commentaireProduitRepository->add($commentaireProduit);
            return $this->redirectToRoute('app_commentaire_produit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('commentaire_produit/new.html.twig', [
            'commentaire_produit' => $commentaireProduit,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_commentaire_produit_show', methods: ['GET'])]
    public function show(CommentaireProduit $commentaireProduit): Response
    {
        return $this->render('commentaire_produit/show.html.twig', [
            'commentaire_produit' => $commentaireProduit,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_commentaire_produit_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CommentaireProduit $commentaireProduit, CommentaireProduitRepository $commentaireProduitRepository): Response
    {
        $form = $this->createForm(CommentaireProduitType::class, $commentaireProduit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commentaireProduitRepository->add($commentaireProduit);
            return $this->redirectToRoute('app_commentaire_produit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('commentaire_produit/edit.html.twig', [
            'commentaire_produit' => $commentaireProduit,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_commentaire_produit_delete', methods: ['POST'])]
    public function delete(Request $request, CommentaireProduit $commentaireProduit, CommentaireProduitRepository $commentaireProduitRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commentaireProduit->getId(), $request->request->get('_token'))) {
            $commentaireProduitRepository->remove($commentaireProduit);
        }

        return $this->redirectToRoute('app_commentaire_produit_index', [], Response::HTTP_SEE_OTHER);
    }
}
