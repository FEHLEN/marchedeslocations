<?php

namespace App\Controller;

use App\Entity\SearchCuriosites;
use App\Form\SearchCuriositesType;
use App\Repository\CuriositesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CuriositesController extends AbstractController
{
    /**
     * @Route("/curiosites", name="app_curiosites")
     */
    public function index(CuriositesRepository $repoCuriosites, Request $request): Response
    {
        $curiosites = $repoCuriosites->findAll();
        $data = null;
        //$search = new SearchCuriosites(); //Une entitée créée pour sécurisé les entrées utilisateur, non enregistrés sur la BD
        $form = $this->createForm(SearchCuriositesType::class, null);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();
            //dd($data);
           $curiosites = $repoCuriosites->findBySearch($data);

        }
        return $this->render('curiosites/index.html.twig', [
            'controller_name' => 'CuriositesController',
            'curiosites' => $curiosites,
            'search' => $form->createview()
        ]);
    }
}
