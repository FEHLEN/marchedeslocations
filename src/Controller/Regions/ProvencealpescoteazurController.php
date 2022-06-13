<?php

namespace App\Controller\Regions;

use App\Entity\Offreslocations;
use App\Repository\OffreslocationsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/regions/provencealpescoteazur")
 */
class ProvencealpescoteazurController extends AbstractController
{
    /**
     * @Route("/", name="app_regions_provencealpescoteazur")
     */
    public function index(OffreslocationsRepository $repoLocations): Response
    {
        $region = 17;
        $offres = $repoLocations->findByRegion($region);
        return $this->render('regions/provencealpescoteazur/index.html.twig', [
            'controller_name' => 'ProvencealpescoteazurController',
            'offreslocations' => $offres
        ]);
    }
     /**
     * @Route("/detail/{id}", name="app_provencealpescoteazur-detail")
     */
    public function detail(?Offreslocations $offre): Response
    {
        if(!$offre){
            return $this->redirectToRoute("app_accueil");
        }
        return $this->render('regions/provencealpescoteazur/details.html.twig', [
            'offre' => $offre
        ]);
    }
}
