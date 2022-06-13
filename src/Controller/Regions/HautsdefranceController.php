<?php

namespace App\Controller\Regions;

use App\Entity\Offreslocations;
use App\Repository\OffreslocationsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route ("/regions/hautsdefrance")
 */
class HautsdefranceController extends AbstractController
{
    /**
     * @Route("/", name="app_regions_hautsdefrance")
     */
    public function index(OffreslocationsRepository $repoLocations): Response
    {
        $region = 11;
        $offres = $repoLocations->findByRegion($region);
        return $this->render('regions/hautsdefrance/index.html.twig', [
            'controller_name' => 'HautsdefranceController',
            'offreslocations' => $offres
        ]);
    }
    /**
     * @Route("/detail/{id}", name="app_hautsdefranceDetail")
     */
    public function detail(?Offreslocations $offre): Response
    {
        if(!$offre){
            return $this->redirectToRoute("app_accueil");
        }
        return $this->render('regions/hautsdefrance/details.html.twig', [
            'offre' => $offre
        ]);
    }
}
