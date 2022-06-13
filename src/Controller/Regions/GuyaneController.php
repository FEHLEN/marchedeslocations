<?php

namespace App\Controller\Regions;

use App\Entity\Offreslocations;
use App\Repository\OffreslocationsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/regions/guyane")
 */
class GuyaneController extends AbstractController
{
    /**
     * @Route("/", name="app_regions_guyane")
     */
    public function index(OffreslocationsRepository $repoLocations): Response
    {
        $region = 4;
        $offres = $repoLocations->findByRegion($region);
        return $this->render('regions/guyane/index.html.twig', [
            'controller_name' => 'GuyaneController',
            'offreslocations' => $offres
        ]);
    }
    /**
     * @Route("/detail/{id}", name="app_guyane-detail")
     */
    public function detail(?Offreslocations $offre): Response
    {
        if(!$offre){
            return $this->redirectToRoute("app_accueil");
        }
        return $this->render('regions/guyane/details.html.twig', [
            'offre' => $offre
        ]);
    }
}
