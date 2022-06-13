<?php

namespace App\Controller\Regions;

use App\Entity\Offreslocations;
use App\Repository\OffreslocationsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/regions/reunion")
 */
class ReunionController extends AbstractController
{
    /**
     * @Route("/", name="app_regions_reunion")
     */
    public function index(OffreslocationsRepository $repoLocations): Response
    {
        $region = 5;
        $offres = $repoLocations->findByRegion($region);
        return $this->render('regions/reunion/index.html.twig', [
            'controller_name' => 'ReunionController',
            'offreslocations' => $offres
        ]);
    }
     /**
     * @Route("/detail/{id}", name="app_reunion-detail")
     */
    public function detail(?Offreslocations $offre): Response
    {
        if(!$offre){
            return $this->redirectToRoute("app_accueil");
        }
        return $this->render('regions/reunion/details.html.twig', [
            'offre' => $offre
        ]);
    }
}
