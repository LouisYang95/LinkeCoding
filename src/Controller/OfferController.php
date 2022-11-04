<?php

namespace App\Controller;

use App\Entity\JobOffer;
use App\Entity\Company;
use App\Form\OffreType;

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
        $companies = $doctrine->getRepository(Company::class)->findAll();
        foreach($companies as $company){
                // dd($company->getId());
                if($company->getId()){
                    $companyName = $company->setCompanyName($company->getCompanyName());
                }

        }
        return $this->render('offer/index.html.twig', [
            'offers' => $offers,
            'company' => $companyName
        ]);


    }

    #[Route('/offer/new', name: 'new_offer')]
    public function addOffre(Request $request, EntityManagerInterface $entityManager): Response
    {
        $companies = $entityManager->getRepository(Company::class)->findAll();
        $companiesName=[];
        foreach($companies as $company){
            $companiesName[$company->getCompanyName()] = $company->getId();
        }
        $offer = new JobOffer();
        $offerForm = $this->createForm(OffreType::class, $offer,[
            'empty_data'=> $companiesName
        ]);
        $offerForm->handleRequest($request);


        if ($offerForm->isSubmitted() && $offerForm->isValid()) {
            $entityManager->persist($offer);
            $entityManager->flush();
            return $this->redirectToRoute('app_offer');
        }


        return $this->renderForm('offer/addOffre.html.twig', [
            'offreForm' => $offerForm,
            "controller_name" => " Ajouter un nouvelle offre",
        ]);
    }
}
