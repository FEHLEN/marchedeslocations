<?php

namespace App\Controller;


use App\Entity\Offreslocations;
use App\Form\OffreslocationsType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\OffreslocationsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/offreslocations")
 */
class OffreslocationsController extends AbstractController
{
    /**
     * @Route("/", name="app_offreslocations_index", methods={"GET"})
     */
    public function index(OffreslocationsRepository $offreslocationsRepository): Response
    {
        return $this->render('offreslocations/index.html.twig', [
            'offreslocations' => $offreslocationsRepository->findAll(),
        ]);
    }

    
    /**
     * @Route("/new", name="app_offreslocations_new", methods={"GET", "POST"})
     */
    public function new(Request $request, OffreslocationsRepository $offreslocationsRepository, EntityManagerInterface $entityManager): Response
    {
        $offreslocation = new Offreslocations();
        $form = $this->createForm(OffreslocationsType::class, $offreslocation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            //on récupère les images transmises
            $offreslocation->setUser($user);
            $uploadImage = $form->get('image1')->getData();
            $uploadImage2 = $form->get('image2')->getData();
            if ($uploadImage) {
                $fichier = md5(uniqid()) .'.'. $uploadImage->guessExtension();
            $uploadImage->move(
                $this->getParameter('images_directory'), $fichier
             );
            $offreslocation->setOneImage($fichier);
            }
            if ($uploadImage2) {
                $fichier2 = md5(uniqid()) .'.'. $uploadImage2->guessExtension();
            $uploadImage2->move(
                $this->getParameter('images_directory'), $fichier2
             );
            $offreslocation->setTwoImage($fichier2);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($offreslocation);
            $entityManager->flush();
            //$offreslocationsRepository->add($offreslocation, true);

            return $this->redirectToRoute('app_compte', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('offreslocations/new.html.twig', [
            'offreslocation' => $offreslocation,
            'form' => $form,
        ]);
    }
      
    /**
     * @Route("/{id}/edit", name="app_offreslocations_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Offreslocations $offreslocation, OffreslocationsRepository $offreslocationsRepository): Response
    {
        $form = $this->createForm(OffreslocationsType::class, $offreslocation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $uploadImage = $form->get('image1')->getData();
           
            if ($uploadImage) {
                $fichier = md5(uniqid()) .'.'. $uploadImage->guessExtension();
            $uploadImage->move(
                $this->getParameter('images_directory'), $fichier
             );
            $offreslocation->setOneImage($fichier);
            }
            $uploadImage2 = $form->get('image2')->getData();
            if ($uploadImage2) {
                $fichier2 = md5(uniqid()) .'.'. $uploadImage2->guessExtension();
            $uploadImage2->move(
                $this->getParameter('images_directory'), $fichier2
             );
            $offreslocation->setTwoImage($fichier2);
            }
           
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($offreslocation);
            $entityManager->flush();
            //$offreslocationsRepository->add($offreslocation, true);
            
           
            return $this->redirectToRoute('app_compte', [], Response::HTTP_SEE_OTHER);
        }
      
        return $this->renderForm('offreslocations/edit.html.twig', [
            'offreslocation' => $offreslocation,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/delete/{id}", name="app_offreslocations_delete", methods={"POST"})
     */
    public function delete(Request $request, Offreslocations $offreslocation, OffreslocationsRepository $offreslocationsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$offreslocation->getId(), $request->request->get('_token'))) {
            $offreslocationsRepository->remove($offreslocation, true);
        }

        return $this->redirectToRoute('app_compte');
    }

    /**
     * @Route("/supprime/image/{id}", name="app_delete_image", methods={"DELETE"})
     */
    public function deleteImage(Images $image, Request $request){
        $data = json_decode($request->getContent(), true);
        //on vérifie si le token est valide
        if($this->isCsrfTockenValid('delete'.$image->getId(), $data['_token'])){
            //on récupère le nom de l'image
            $nomImage = $image->getName();
            //on supprime le fichier dans le uploads
            unlink($this->getParameter('image_directory').'/'.$nomImage);
            //on supprime de la base de données
            $em = $this->getDoctrine()->getManager;
            $em->remove($image);
            $em->flush();
            //on répond en json
            return new JsonResponse(['success' => 1]);

        } else{
            return new JsonResponse(['error' => 'Token Invalide'], 400);
        }
    }
}
