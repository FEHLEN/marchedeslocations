<?php

namespace App\Controller\Regions;

use App\Entity\Offreslocations;
use App\Repository\OffreslocationsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/regions/mayotte")
 */
class MayotteController extends AbstractController
{
    /**
     * @Route("/", name="app_regions_mayotte")
     */
    public function index(OffreslocationsRepository $repoLocations): Response
    {
        $region = 6;
        $offres = $repoLocations->findByRegion($region);
        return $this->render('regions/mayotte/index.html.twig', [
            'controller_name' => 'MayotteController',
            'offreslocations' => $offres
        ]);
    }
     /**
     * @Route("/detail/{id}", name="app_mayotte-detail")
     */
    public function detail(?Offreslocations $offre): Response
    {
        if(!$offre){
            return $this->redirectToRoute("app_accueil");
        }
        return $this->render('regions/mayotte/details.html.twig', [
            'offre' => $offre
        ]);
    }
}
