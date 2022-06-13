<?php

namespace App\Controller\User;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CompteController extends AbstractController
{
    /**
     * @Route("/compte", name="app_compte")
     */
    public function index(): Response
    {
        return $this->render('compte/index.html.twig', [
            'controller_name' => 'CompteController',
        ]);
    }
    /**
     * @Route("/details/{id}", name="app_details_show", methods={"GET"})
     */
    public function show(Offreslocations $offreslocation): Response
    {
        return $this->render('compte/details.html.twig', [
            'offreslocation' => $offreslocation
        ]);
    }
}
