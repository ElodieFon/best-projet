<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserProduitController extends AbstractController
{
    #[Route('/user_produit', name: 'app_user_produit')]
    public function index(ProduitRepository $produitRepository): Response
    {
        return $this->render('user_produit/index.html.twig', [
            'produits' => $produitRepository->findAll(),
        ]);
    }
}
