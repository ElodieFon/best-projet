<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BlogRepository;
use Doctrine\Persistence\ManagerRegistry;

class UserBlogController extends AbstractController
{
    #[Route('/user_blog', name: 'app_user_blog')]
    public function index(BlogRepository $blogRepository, ManagerRegistry $doctrine): Response
    {

        $blogs = $blogRepository->getProductImg();
        return $this->render('user_blog/index.html.twig', [
            'blogs'=>$blogs
        ]);
    }

    public function blogProduct()
    {
        
    }
}
