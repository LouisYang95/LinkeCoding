<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Form\OffreType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OffreController extends AbstractController
{
    #[Route('/offre', name: 'app_offre')]
    public function index(): Response
    {
        return $this->render('offre/index.html.twig', [
            'controller_name' => 'OffreController',
        ]);
    }

    #[Route('/offre/new', name: 'new_offre')]
    public function addOffre (Request $request, EntityManagerInterface $entityManager): Response
    {
        $offre = new Offre();

        $offreForm = $this->createForm(OffreType::class, $offre);
        $offreForm->handleRequest($request);

        if ($offreForm->isSubmitted() && $offreForm->isValid()){
            $entityManager->persist($offre);
            $entityManager->flush();
            return new Response ('offre crée');
        }
    

        return $this->renderForm('profil/addOffre.html.twig', [
            'offreForm' => $offreForm,
            "controller_name" => " Ajouter un nouvelle offre",
        ]); 
    }






}
