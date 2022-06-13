<?php

namespace App\Controller\Regions;

use App\Entity\Offreslocations;
use App\Repository\OffreslocationsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/regions/centrevaldeloire")
 */
class CentrevaldeloireController extends AbstractController
{
    /**
     * @Route("/", name="app_regions_centrevaldeloire")
     */
    public function index(OffreslocationsRepository $repoLocations): Response
    {
        $region = 8;
        $offres = $repoLocations->findByRegion($region);
        return $this->render('regions/centrevaldeloire/index.html.twig', [
            'controller_name' => 'CentrevaldeloireController',
            'offreslocations' => $offres
        ]);
    }
    /**
     * @Route("/detail/{id}", name="app_centre-detail")
     */
    public function detail(?Offreslocations $offre): Response
    {
        if(!$offre){
            return $this->redirectToRoute("app_accueil");
        }
        return $this->render('regions/centrevaldeloire/details.html.twig', [
            'offre' => $offre
        ]);
    }
}
