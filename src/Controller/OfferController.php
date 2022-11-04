<?php

namespace App\Controller;

use App\Entity\JobOffer;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OfferController extends AbstractController
{
    #[Route('/offers', name: 'app_offer')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $offers = $doctrine->getRepository(JobOffer::class)->findAll();
        return $this->render('offer/index.html.twig', [
            'offers' => $offers,
        ]);
    }

    #[Route('/offer/new', name: 'new_offer')]
    public function addOffre(Request $request, EntityManagerInterface $entityManager): Response
    {
        $offer = new JobOffer();

        $offerForm = $this->createForm(OffreType::class, $offer);
        $offerForm->handleRequest($request);

        if ($offerForm->isSubmitted() && $offerForm->isValid()) {
            $entityManager->persist($offer);
            $entityManager->flush();

            return $this->redirectToRoute('app_offer');
        }


        return $this->renderForm('profil/addOffre.html.twig', [
            'offreForm' => $offerForm,
            "controller_name" => " Ajouter un nouvelle offre",
        ]);
    }
}
