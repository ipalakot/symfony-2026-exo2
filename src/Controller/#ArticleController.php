<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Categorie;
use App\Entity\Clients;
use App\Entity\Employe;
use App\Entity\Agence;

use App\Form\Article1Type;
use App\Form\ArticleType;
use App\Form\AgenceType;

use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/article', name: 'article_')]
final class ArticleController extends AbstractController
{
    #[Route(name: 'index', methods: ['GET'])]
    public function index(ArticleRepository $articleRepository): Response
    {
        return $this->render('article/index.html.twig', [
            'articles' => $articleRepository->findAll(),
            'controller_name' => 'FrontController',
        ]);
    }



    /********************************************** 
     * CREATION - EDITION DES ARTICLES
     * **********************************************/
    // Création d'un nouvel article
    #[Route('/nouveau', name: 'nouveau', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $article = new Article();
        $form = $this->createForm(Article1Type::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($article);
            $entityManager->flush();

            return $this->redirectToRoute('index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('article/nouveau.html.twig', [
            'article' => $article,
            'form' => $form,
        ]);
    }
    
   // Affichage d'un article
    #[Route("/id/{id}", name: 'article_affichage', methods: ['GET'])]
    public function affichage(Article $article): Response
    {
        return $this->render('article/affichage.html.twig', [
            'article' => $article,
        ]);
    } 

    //Edition un Article    
    /*#[Route('/{id}/edition', name: 'article_edition', methods: ['GET', 'POST'])]
    public function edition(Request $request, Article $article, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(Article1Type::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('article/edition.html.twig', [
            'article' => $article,
            'form' => $form,

        ]);
    }*/

    /********************************************************************* 
     * TRI DES ARTICLES
     *********************************************************************/
    // Trouver des articles avec finOneBy$Valeur()        
    #[Route('/liste5', name: 'liste', methods: ['GET'])]
    public function findOneByTitre(ArticleRepository $articleRepository)
    {
        $article = $articleRepository->findOneByTitre(

            [
                'titre' => 'maison standard à vendre',

            ]
        );
        // Envoie vers la vue du tablea des articles à utiliser
        return $this->render('article/affichage.html.twig', [
            'article' => $article,
        ]);
    }

    // Trouver des articles avec depuis le()        
    #[Route('/tri-titre', name: 'tri.titre', methods: ['GET'])]
    public function findByTitle(ArticleRepository $articleRepository, Request $request)
    {
        $articles = $articleRepository->findByTitle();
        // Appel de la page pour affichage
        return $this->render(
            'article/index.html.twig',
            [
                // passage du contenu de $location
                'articles' => $articles,
            ]
        );
    }

    // Tri ds articles par nom de categorie par ordre alphabétique
    #[Route('/tri-categorie-asc', name: 'tri_categorie-asc', methods: ['GET'])]
    public function indexArticletriecategorie(ArticleRepository $articleRepository, Request $request)
    {
        $articlesT = $articleRepository->findTriecategorie_ASC();
        // Appel de la page pour affichage
        return $this->render(
            'article/index.html.twig',
            [
                // passage du contenu de $location
                'articlesT' => $articlesT,
            ]
        );
    }

    // Tri ds articles par nom de categorie par ordre alphabétique
    #[Route('/tri-categorie-maison-loc', name: 'tri_categorie-maison-locasc', methods: ['GET'])]
    public function triCategoriemaisonLoccategorieMais(ArticleRepository $articleRepository, Request $request)
    {
        $articles = $articleRepository->findCategorieLocMaison();
        // Appel de la page pour affichage
        return $this->render(
            'article/index.html.twig',
            [
                // passage du contenu de $location
                'articles' => $articles,
            ]
        );
    }
    // Tri ds articles par nom de categorie par ordre alphabétique
    #[Route('/tri-categorie-maison-achat', name: 'tri_categorie-maison-achatasc', methods: ['GET'])]
    public function triCategoriemaisonAchatcategorieMais(ArticleRepository $articleRepository, Request $request)
    {
        $articles = $articleRepository->findCategorieAchatMaison();
        // Appel de la page pour affichage
        return $this->render(
            'article/index.html.twig',
            [
                // passage du contenu de $location
                'articles' => $articles,
            ]
        );
    }

    // Tri ds articles par nom de categorie par ordre alphabétique
    #[Route('/tri-categorie-appart-loc', name: 'tri_categorie-appart-locasc', methods: ['GET'])]
    public function triCategoriemaisonLoccategorieAppt(ArticleRepository $articleRepository, Request $request)
    {
        $articles = $articleRepository->findCategorieLocAppart();
        // Appel de la page pour affichage
        return $this->render(
            'article/index.html.twig',
            [
                // passage du contenu de $location
                'articles' => $articles,
            ]
        );
    }

    // Tri des articles par nom de categorie par achat appartement
    #[Route('/tri-categorie-appart-achat', name: 'tri_categorie-appart-achatasc', methods: ['GET'])]
    public function triCategorieAppartAchat(ArticleRepository $articleRepository, Request $request)
    {
        $articles = $articleRepository->findCategorieAchatAppart();
        // Appel de la page pour affichage
        return $this->render(
            'article/index.html.twig',
            [
                // passage du contenu de $location
                'articles' => $articles,
            ]
        );
    }

    // Trier les articles par Type de A à Z  
    #[Route('/tri-type', name: 'tri.type', methods: ['GET'])]
    public function indexArticletrieType(ArticleRepository $articleRepository, Request $request)
    {
        $articles = $articleRepository->findTrietype_AZ();
        // Appel de la page pour affichage
        return $this->render(
            'article/index.html.twig',
            [
                // passage du contenu de $location
                'articles' => $articles,
            ]
        );
    }

    // Trier les articles par Surface de A à Z  
    #[Route('/tri-surface', name: 'tri.surface', methods: ['GET'])]
    public function indexArticletrieSurface(ArticleRepository $articleRepository, Request $request)
    {
        $articles = $articleRepository->findTriesurface_AZ();
        // Appel de la page pour affichage
        return $this->render(
            'article/index.html.twig',
            [
                // passage du contenu de $location
                'articles' => $articles,
            ]
        );
    }

    // Trier les articles par Prix de A à Z  
    #[Route('/tri-prix', name: 'tri.prix', methods: ['GET'])]
    public function indexArticletriePrix(ArticleRepository $articleRepository, Request $request)
    {
        $articles = $articleRepository->findTrieprix_AZ();
        // Appel de la page pour affichage
        return $this->render(
            'article/index.html.twig',
            [
                // passage du contenu de $location
                'articles' => $articles,
            ]
        );
    }

    // Trier les articles par agences par ordre alphabétique
    #[Route('/tri-agence', name: 'tri.agence', methods: ['GET'])]
    public function indexArticletrieagencee(ArticleRepository $articleRepository, Request $request)
    {
        $articles = $articleRepository->findTrieagence_ASC();
        // Appel de la page pour affichage
        return $this->render(
            'article/index.html.twig',
            [
                // passage du contenu de $location
                'articles' => $articles,
            ]
        );
    }



    /**************************************************
     * AFFICHAGE DES ARTICLES
     * 
     **************************************************/

    // Affichage  d'un artilce par son ID  
    
    #[Route("/id/{id}", name: 'article_affichage_par_id', methods: ['GET'])]
    public function affichege_liste1($id, Articlerepository $articleRepository): Response
    {   
        // Appel à Doctrine pour prendre le Gestionnaire des entités
        // Appel au repository pour trouver l'article par son id
        // Recuperer l'artcle de l'ID
        $article = $articleRepository->find($id);

        // Envoie vers la vue du tablea des articles à utiliser
        return $this->render('article/affichage.html.twig', [
            'articles' => $article,
        ]);
    }
    

    // Trouver des articles avec FINDBY()
    /*
     #[Route("/liste2", name: 'article_affichage_liste_2', methods: ['GET'])]
        public function affichege_liste2(Articlerepository $articleRepository): Response
        {   
            // Appel à Doctrine pour prendre le Gestionnaire des entités
            // Appel au repository pour trouver l'article par son id
            // Recuperer l'artcle de l'ID
            $articles = $articleRepository->findBy(
                [
                    'titre' => 'maison standard à vendre',
                    'prix'=> 200000,
                
                ]);
            // Envoie vers la vue du tablea des articles à utiliser
            return $this->render('article/index.html.twig', [
                'articles' => $articles,
            ]);
        } */

    // Trouver un article avec FINDONEBY()/*
    /*
    #[Route("/liste3", name: 'article_affichage_liste_3', methods: ['GET'])]
    public function affichege_liste3(Articlerepository $articleRepository): Response
    {   
        // Appel à Doctrine pour prendre le Gestionnaire des entités
        // Appel au repository pour trouver l'article par son id
        // Recuperer l'artcle de l'ID
        $article = $articleRepository->findOneBy(
            [
                'titre' => 'maison standard à vendre',
                
            ]);
        // Envoie vers la vue du tablea des articles à utiliser
        return $this->render('article/index2.html.twig', [
            'article' => $article,
        ]);

    }
    */

    // Trouver des articles avec findBy$Valeur()
    /*
     #[Route("/liste4", name: 'article_affichage_liste_4', methods: ['GET'])]
        public function affichege_liste_bytitle(Articlerepository $articleRepository): Response
        {   
            $articles = $articleRepository->findByTitre(
                
                [
                    'titre' => 'maison standard à vendre',
                
                ]);
            // Envoie vers la vue du tablea des articles à utiliser
            return $this->render('article/index.html.twig', [
                'articles' => $articles,
            ]);
        }   
    */
    
}