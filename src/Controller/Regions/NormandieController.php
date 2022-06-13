<?php

namespace App\Controller\Regions;

use App\Entity\Offreslocations;
use App\Repository\OffreslocationsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/regions/normandie")
 */
class NormandieController extends AbstractController
{
    /**
     * @Route("/", name="app_regions_normandie")
     */
    public function index(OffreslocationsRepository $repoLocations): Response
    {
        $region = 10;
        $offres = $repoLocations->findByRegion($region);
        return $this->render('regions/normandie/index.html.twig', [
            'controller_name' => 'NormandieController',
            'offreslocations' => $offres
        ]);
    }
     /**
     * @Route("/detail/{id}", name="app_normandie-detail")
     */
    public function detail(?Offreslocations $offre): Response
    {
        if(!$offre){
            return $this->redirectToRoute("app_accueil");
        }
        return $this->render('regions/normandie/details.html.twig', [
            'offre' => $offre
        ]);
    }
}
