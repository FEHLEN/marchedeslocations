<?php

namespace App\Controller\Regions;

use App\Entity\Offreslocations;
use App\Repository\OffreslocationsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/regions/bretagne")
 */
class BretagneController extends AbstractController
{
    /**
     * @Route("/", name="app_regions_bretagne")
     */
    public function index(OffreslocationsRepository $repoLocations): Response
    {
        $region = 14;
        $offres = $repoLocations->findByRegion($region);
        return $this->render('regions/bretagne/index.html.twig', [
            'controller_name' => 'BretagneController',
            'offreslocations' => $offres
        ]);
    }
    /**
     * @Route("/detail/{id}", name="app_bretagne-detail")
     */
    public function detail(?Offreslocations $offre): Response
    {
        if(!$offre){
            return $this->redirectToRoute("app_accueil");
        }
        return $this->render('regions/bretagne/details.html.twig', [
            'offre' => $offre
        ]);
    }
}
