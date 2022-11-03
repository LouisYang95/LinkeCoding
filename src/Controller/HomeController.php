<?php

namespace App\Controller;

use App\Entity\Profil;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class ProfilController
 * @package Home\Controller
 * @Route("/homepage", name="homepage_"),
 */
class HomeController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $profils = $doctrine->getRepository(Profil::class)->findAll();

        return $this->render('/profil/homepage.html.twig',[
            'profils' => $profils,

        ]);
    }
}