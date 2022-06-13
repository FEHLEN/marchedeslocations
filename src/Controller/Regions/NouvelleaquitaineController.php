<?php

namespace App\Controller\Regions;

use App\Entity\Offreslocations;
use App\Repository\OffreslocationsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/regions/nouvelleaquitaine")
 */
class NouvelleaquitaineController extends AbstractController
{
    /**
     * @Route("/", name="app_regions_nouvelleaquitaine")
     */
    public function index(OffreslocationsRepository $repoLocations): Response
    {
   
        $region = 1;
        $offres = $repoLocations->findByRegion($region);
        return $this->render('regions/nouvelleaquitaine/index.html.twig', [
            'offresAquitaine' => $offres,
            
        ]);
    }
    /**
     * @Route("/detail/{id}", name="app_nouvelleaquitaine-detail")
     */
    public function detail(?Offreslocations $offre): Response
    {
        if(!$offre){
            return $this->redirectToRoute("app_accueil");
        }
        return $this->render('regions/nouvelleaquitaine/details.html.twig', [
            'offre' => $offre
        ]);
    }
}
