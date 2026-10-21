<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;


  class HomeController extends AbstractController
{
    #[Route('/index', name: 'home_index')]
    #[Route('/default', name: 'default')]

    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Bienvenue sur la page d\'accueil !',
        ]);
    }
  
    
    // La route login pour l'accueil
    #[Route('/login2', name: 'home_login')]
    public function login2(): Response
    {
        return $this->redirectToRoute('app_login')  ;
        }





    // La route /faq
    #[Route (path: '/faq', name: 'app_faq')]

    // la methode faq() qui rend la vue FAQ de l'application
    public function faq(): Response
    {
        return $this->render('home/index.html.twig', [ // Rendu de la vue FAQ de l'application
            'controller_name' => 'HomeController',
        ]);
    }

    //catalogue
    #[Route(path: '/catalogue', name: 'app_catalogue')]


    // la methode catalogue() qui rend la vue catalogue de l'application
    public function catalogue(): Response
    {
        return $this->redirectToRoute('app_nous_contacter', [], Response::HTTP_SEE_OTHER); // Redirection vers la route "app_nous_contacter"
    }


}