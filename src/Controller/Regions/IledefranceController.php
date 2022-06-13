<?php

namespace App\Controller\Regions;

use App\Entity\Offreslocations;
use App\Repository\OffreslocationsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
/**
 * @Route("/regions/iledefrance")
 */
class IledefranceController extends AbstractController
{
    /**
     * @Route("/", name="app_regions_iledefrance")
     */
    public function index(OffreslocationsRepository $repoLocations): Response
    {
        $region = 7;
        $offres = $repoLocations->findByRegion($region);
        return $this->render('regions/iledefrance/index.html.twig', [
            'controller_name' => 'IledefranceController',
            'offreslocations' => $offres
        ]);
    }
    /**
     * @Route("/detail/{id}", name="app_iledefrance-detail")
     */
    public function detail(?Offreslocations $offre): Response
    {
        if(!$offre){
            return $this->redirectToRoute("app_accueil");
        }
        return $this->render('regions/iledefrance/details.html.twig', [
            'offre' => $offre
        ]);
    }
}
