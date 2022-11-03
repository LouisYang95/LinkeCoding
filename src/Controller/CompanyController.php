<?php

namespace App\Controller;

use App\Entity\Company;
use App\Form\CreateCompanyType;
use Doctrine\ORM\EntityManagerInterface;

use Doctrine\Persistence\ManagerRegistry;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CompanyController extends AbstractController
{
    #[Route('/company', name: 'company')]
    public function show(ManagerRegistry $doctrine): Response
    {
        $company = $doctrine->getRepository(Company::class)->findAll();
        // dd($company);
        return $this->renderForm('company/home.html.twig', [
            'companies' => $company,
        ]);
    }
    
    #[Route('/company/new', name:'create_company')]
    public function addCompany(Request $request, EntityManagerInterface $entityManager): Response
    {
        $company = new Company();

        $form = $this->createForm(CreateCompanyType::class, $company);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($company);
            $entityManager->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->renderForm('company/new.html.twig', [
            'form' => $form,
        ]);
    }
}
