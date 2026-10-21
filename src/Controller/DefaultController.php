<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Routing\Annotation\Route;

final class DefaultController extends AbstractController
{
    // La route de la page d'accueil
    /**
     * @Route("/", name="accueil")
     */
    public function accueil(): JsonResponse
    {
        return $this->json([
            'message' => 'Bienvenue sur la page d\'accueil !',
            'path' => 'src/Controller/DefaultController.php',
        ]);
    }

    // La route /marseille/{id}
    //#[Route(path: '/marseille/{id}', name: 'app_marseille')]
    public function marseille(int $id): JsonResponse
    {
        return $this->json([
            'message' => 'Bienvenue dans la ville marseillaise / Arrondissement!',
            'id' => $id,
            'path' => 'src/Controller/DefaultController.php',
        ]);
    }

    // La route à propos
    //#[Route(path: '/a-propos', name: 'app_a_propos')]
    public function aPropos(): JsonResponse
    {
        return $this->json([
            'message' => 'À propos de cette application!',
            'path' => 'src/Controller/DefaultController.php',
        ]);
    }

    // Nous contacter
    //#[Route(path: '/nous-contacter', name: 'app_nous_contacter')]
    public function nousContacter(): JsonResponse
    {
        return $this->json([
            'message' => 'Page Nous Contacter',
            'path' => 'src/Controller/DefaultController.php',
        ]);
    }

    //
}
