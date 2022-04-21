<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserProduitController extends AbstractController
{
    #[Route('/user/produit', name: 'app_user_produit')]
    public function index(): Response
    {
        return $this->render('user_produit/index.html.twig', [
            'controller_name' => 'UserProduitController',
        ]);
    }
}
