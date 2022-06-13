<?php

namespace App\Controller\Regions;

use App\Entity\Offreslocations;
use App\Repository\OffreslocationsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/regions/grandest")
 */
class GrandestController extends AbstractController
{
    /**
     * @Route("/", name="app_regions_grandest")
     */
    public function index(OffreslocationsRepository $repoLocations): Response
    {
        $region = 12;
        $offres = $repoLocations->findByRegion($region);
        return $this->render('regions/grandest/index.html.twig', [
            'controller_name' => 'GrandestController',
            'offreslocations' => $offres
        ]);
    }
    /**
     * @Route("/detail/{id}", name="app_grandest-detail")
     */
    public function detail(?Offreslocations $offre): Response
    {
        if(!$offre){
            return $this->redirectToRoute("app_accueil");
        }
        return $this->render('regions/grandest/details.html.twig', [
            'offre' => $offre
        ]);
    }
}
