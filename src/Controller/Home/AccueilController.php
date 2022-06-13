<?php

namespace App\Controller\Home;

use App\Repository\OffreslocationsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="app_accueil")
     */
    public function index(OffreslocationsRepository $repoOffres): Response
    {
        $annonces = $repoOffres->findAll();
        $annoncesBest = $repoOffres->findByIsBest(1);

        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'annoncesBest' => $annoncesBest
        ]);
    }
}
