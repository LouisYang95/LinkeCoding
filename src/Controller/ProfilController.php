<?php

namespace App\Controller;


use App\Entity\Profil;
use App\Form\ProfilType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfilController extends AbstractController
{
    #[Route('/profile', name: 'profile')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $profils = $doctrine->getRepository(Profil::class)->findAll();

        return $this->render('profil/index.html.twig', [
            'profils' => $profils,
        ]);
    }

    #[Route('/profile/new', name: 'new_profil')]
    public function addProfil (Request $request, EntityManagerInterface $entityManager): Response
    {
        $profil = new Profil();

        $profilForm = $this->createForm(ProfilType::class, $profil);
        $profilForm->handleRequest($request);

        if ($profilForm->isSubmitted() && $profilForm->isValid()){
            $entityManager->persist($profil);
            $entityManager->flush();

            return $this->redirectToRoute('profile');
        }
    

        return $this->renderForm('profil/add.html.twig', [
            'profilForm' => $profilForm,
            "controller_name" => " Ajouter un nouveau profil",
        ]); 
    }
}
