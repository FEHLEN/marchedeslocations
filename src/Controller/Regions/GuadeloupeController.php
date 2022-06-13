<?php

namespace App\Controller\Regions;

use App\Entity\Offreslocations;
use App\Repository\OffreslocationsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/regions/guadeloupe")
 */
class GuadeloupeController extends AbstractController
{
    /**
     * @Route("/", name="app_regions_guadeloupe")
     */
    public function index(OffreslocationsRepository $repoLocations): Response
    {
        $region = 2;
        $offres = $repoLocations->findByRegion($region);
        
        return $this->render('regions/guadeloupe/index.html.twig', [
            'controller_name' => 'GuadeloupeController',
            'offreslocations' => $offres,
        ]);
    }
    /**
     * @Route("/detail/{id}", name="app_guadeloupe-detail")
     */
    public function detail(?Offreslocations $offre): Response
    {
        if(!$offre){
            return $this->redirectToRoute("app_accueil");
        }
        return $this->render('regions/guadeloupe/details.html.twig', [
            'offre' => $offre
        ]);
    }
}
