<?php

namespace App\Controller\Home;

use App\Entity\Offreslocations;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DetailsOffresController extends AbstractController
{
    /**
     * @Route("/details/accueil/{id}", name="app_details_accueil")
     */
    public function detailsAccueil(?Offreslocations $offre): Response
    {
        if(!$offre){
            return $this->redirectToRoute("app_accueil");
        }
        return $this->render('details_offres/index.html.twig', [
            'controller_name' => 'DetailsOffresController',
            'offre' => $offre
        ]);
    }
   

}
