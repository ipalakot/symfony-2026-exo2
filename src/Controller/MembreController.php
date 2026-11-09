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


    public function moyenne(): Response
    {

        $etudiants = [
            ['prenom' => 'Pierre', 'analyse' => 10, 'algorithme' => 8, 'programmation' => 10, 'recherche' => 10],
            ['prenom' => 'Paul', 'analyse' => 11, 'algorithme' => 10, 'programmation' => 11, 'recherche' => '11'],
            ['prenom' => 'Jacques', 'analyse' => 9, 'algorithme' => 15, 'programmation' => 14, 'recherche' => 9],
            ['prenom' => 'Delphine', 'analyse' => 15, 'algorithme' => 8, 'programmation' => 17, 'recherche' => 4]
        ];


        return $this->render('Membre/membreMoyenne.html.twig',
        ['etudiants' => $etudiants]
        );

    
    }

    public function membreId(): Response
    {
        return $this->redirectToRoute('app_membre');
    }
}
