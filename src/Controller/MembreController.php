<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MembreController extends AbstractController
{
    #[Route('/membre', name: 'app_membre')]
    public function index(): Response
    {

    $etudiants = [
            ['prenom' => 'Hayate', 'nom' => 'El Garri'],
            ['prenom' => 'Romain', 'nom' => 'Giaretti'],
            ['prenom' => 'Charlie', 'nom' => 'Dubois '],
        ];



        return $this->render('membre/index.html.twig', [
            'controller_name' => 'MembreController',
            'prenom2' => 'Moussa',  // Ajout d'une variable supplémentaire
             'etudiants' => $etudiants,
        ]);
    }
}
