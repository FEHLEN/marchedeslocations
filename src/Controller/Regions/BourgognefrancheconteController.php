<?php

namespace App\Controller\Regions;

use App\Entity\Offreslocations;
use App\Repository\OffreslocationsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("regions/bourgognefrancheconte")
 */
class BourgognefrancheconteController extends AbstractController
{
    /**
     * @Route("/", name="app_regions_bourgognefrancheconte")
     */
    public function index(OffreslocationsRepository $repoLocations): Response
    {
        //Affiche toutes les offres de la région sélectionnée sur la carte interractive
        //fonction findByRegion dans le repository de Offrelocation requete sql
        $region = 9;
        $offres = $repoLocations->findByRegion($region);
        return $this->render('regions/bourgognefrancheconte/index.html.twig', [
            'controller_name' => 'BourgognefrancheconteController',
            'offreslocations' => $offres
        ]);
    }
    /**
     * @Route("/detail/{id}", name="app_bourgogne-detail")
     */
    public function detail(?Offreslocations $offre): Response
    {
        if(!$offre){
            return $this->redirectToRoute("app_accueil");
        }
        return $this->render('regions/bourgognefrancheconte/details.html.twig', [
            'offre' => $offre
        ]);
    }
}
