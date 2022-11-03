<?php

namespace App\Controller;


use App\Entity\Profil;
use App\Form\ProfilType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'profil')]
    public function index(): Response
    {
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
        ]);
    }

    #[Route('/profil/new', name: 'new_profil')]
    public function addProfil (Request $request, EntityManagerInterface $entityManager): Response
    {
        $profil = new Profil();

        $profilForm = $this->createForm(ProfilType::class, $profil);
        $profilForm->handleRequest($request);

        if ($profilForm->isSubmitted() && $profilForm->isValid()){
            $entityManager->persist($profil);
            $entityManager->flush();
            return new Response ('profil crée');
        }
    

        return $this->renderForm('profil/add.html.twig', [
            'profilForm' => $profilForm,
            "controller_name" => " Ajouter un nouveau profil",
        ]); 
    }
}
