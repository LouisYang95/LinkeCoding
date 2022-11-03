<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Company;
use App\Form\CreateCompanyType;

class CompanyController extends AbstractController
{
    #[Route('/company', name: 'app_company')]
    public function new(): Response
    {
        $company = new Company();

        $form = $this->createForm(CreateCompanyType::class, $company);
        
        return $this->renderForm('company/home.html.twig', [
            'form' => $form,
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
