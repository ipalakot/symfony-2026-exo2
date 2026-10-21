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

    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    public function apropos(): Response
    {
        return $this->render('home/apropos.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }



   // La route login pour l'accueil est dans Routes.yaml
    public function login(): JsonResponse
    {
        return $this->json([
            'message' => 'La Page de connexion',
        ]);
    }

    // La route Connexion est dans Routes.yaml
    public function connexion(): JsonResponse
    {
        return $this->json([
            'message' => 'Page de connexion!',
            
        ]);
    }
    
    // La route logout est dans Routes.yaml
    public function logout(): Response
    {
        return $this->redirectToRoute('default', [], Response::HTTP_SEE_OTHER); // Redirection vers la route "app_logout";
        }

    // La route Enregistrement est dans Routes.yaml
    public function enregistrement(): JsonResponse
    {
        return $this->json([
            'message' => 'la page d\'enregistrement',
            
        ]);
    }

    // La route Users est dans Routes.yaml
    public function users(): JsonResponse
    {
        return $this->json([
            'message' => 'la liste des utilisateurs',
            
        ]);
    }

    // La route UsersId est dans Routes.yaml
    public function usersId(): JsonResponse
    {
        return $this->json([
            'message' => 'un utilisateur avec son id',
            
        ]);
    }

    // La route Member est dans Routes.yaml
    public function membre(): JsonResponse
    {
        return $this->json([
            'message' => 'la liste des membres',
            
        ]);
    }

    // La route MembreId est dans Routes.yaml
    public function membreId(): JsonResponse
    {
        return $this->json([
            'Membre N°: ',
            
        ]);
    }
        


}