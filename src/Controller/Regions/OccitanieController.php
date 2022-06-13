<?php

namespace App\Controller\Regions;

use App\Entity\Offreslocations;
use App\Repository\OffreslocationsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/regions/occitanie")
 */
class OccitanieController extends AbstractController
{
    /**
     * @Route("/", name="app_regions_occitanie")
     */
    public function index(OffreslocationsRepository $repoLocations): Response
    {
        $region = 15;
        $offres = $repoLocations->findByRegion($region);
        return $this->render('regions/occitanie/index.html.twig', [
            'controller_name' => 'OccitanieController',
            'offreslocations' => $offres
        ]);
    }
     /**
     * @Route("/detail/{id}", name="app_occitanie-detail")
     */
    public function detail(?Offreslocations $offre): Response
    {
        if(!$offre){
            return $this->redirectToRoute("app_accueil");
        }
        return $this->render('regions/occitanie/details.html.twig', [
            'offre' => $offre
        ]);
    }
}
