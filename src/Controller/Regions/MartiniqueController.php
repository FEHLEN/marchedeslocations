<?php

namespace App\Controller\Regions;

use App\Entity\Offreslocations;
use App\Repository\OffreslocationsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/regions/martinique")
 */
class MartiniqueController extends AbstractController
{
    /**
     * @Route("/", name="app_regions_martinique")
     */
    public function index(OffreslocationsRepository $repoLocations): Response
    {
        $region = 3;
        $offres = $repoLocations->findByRegion($region);
        return $this->render('regions/martinique/index.html.twig', [
            'controller_name' => 'MartiniqueController',
            'offreslocations'=> $offres,
        ]);
    }
     /**
     * @Route("/detail/{id}", name="app_martinique-detail")
     */
    public function detail(?Offreslocations $offre): Response
    {
        if(!$offre){
            return $this->redirectToRoute("app_accueil");
        }
        return $this->render('regions/martinique/details.html.twig', [
            'offre' => $offre
        ]);
    }
}
