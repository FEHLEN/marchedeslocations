<?php

namespace App\Controller\Regions;

use App\Entity\Offreslocations;
use App\Repository\OffreslocationsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/regions/auvergnerhonealpes")
 */
class AuvergnerhonealpesController extends AbstractController
{
    /**
     * @Route("/", name="app_regions_auvergnerhonealpes")
     */
    public function index(OffreslocationsRepository $repoLocations): Response
    {
        //Affiche toutes les offres de la région sélectionnée sur la carte interractive
        //fonction findByRegion dans le repository de Offrelocation requete sql
        $region = 16;
        $offres = $repoLocations->findByRegion($region);
        return $this->render('regions/auvergnerhonealpes/index.html.twig', [
            'controller_name' => 'AuvergnerhonealpesController',
            'offreslocations' => $offres
        ]);
    }
     /**
     * @Route("/detail/{id}", name="app_auvergne-detail")
     */
    public function detail(?Offreslocations $offre): Response
    {
        if(!$offre){
            return $this->redirectToRoute("app_accueil");
        }
        return $this->render('regions/auvergnerhonealpes/details.html.twig', [
            'offre' => $offre
        ]);
    }
}
