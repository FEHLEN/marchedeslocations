<?php

namespace App\Controller\Regions;

use App\Entity\Offreslocations;
use App\Repository\OffreslocationsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @route("/regions/corse")
 */
class CorseController extends AbstractController
{
    /**
     * @Route("/", name="app_regions_corse")
     */
    public function index(OffreslocationsRepository $repoLocations): Response
    {
        $region = 18;
        $offres = $repoLocations->findByRegion($region);

        return $this->render('regions/corse/index.html.twig', [
            'controller_name' => 'CorseController',
            'offreslocations' => $offres,
        ]);
    }
    /**
     * @Route("/detail/{id}", name="app_corse-detail")
     */
    public function detail(?Offreslocations $offre): Response
    {
        if(!$offre){
            return $this->redirectToRoute("app_accueil");
        }
        return $this->render('regions/corse/details.html.twig', [
            'offre' => $offre
        ]);
    }
}
