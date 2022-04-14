<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Bebe;
use App\Repository\BebeRepository;

class BebeController extends AbstractController
{
    #[Route('/bebe', name: 'app_bebe')]

    public function createBebe(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $bebe = new Bebe();
        $bebe->setNom('Gustave');
        $bebe->setAge(3);
        $bebe->setTaille(38);

        // tell Doctrine you want to (eventually) save the bebe (no queries yet)
        $entityManager->persist($bebe);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Le bebe '.$bebe->getId().' a bien ete ajoute');
    }

    #[Route('/bebe/{id}', name: 'bebe_show')]
    public function show(BebeRepository $bebeRepository, int $id): Response
    {
        $bebe = $bebeRepository
        ->find($id);

        if (!$bebe) {
            throw $this->createNotFoundException(
                'Aucun bebe trouver avec cette id '.$id
            );
        }
        return $this->render('bebe/show.html.twig', ['bebe' => $bebe]);
    } 
}
