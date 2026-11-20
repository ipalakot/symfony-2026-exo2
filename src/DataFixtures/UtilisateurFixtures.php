<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UtilisateurFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
    // Initialiser les données de l'entité Utilisateur

        //
            for ($i = 0; $i< 14; $i++) {
            $utilisateur = new Utilisateur();
            $utilisateur->setNoms('Test');
            $utilisateur->setPrenoms('Test');
            $utilisateur->setAdresse('Blv Chestenet');
            $utilisateur->setDatenaissance(new \DateTime());
            $utilisateur->setGenre('Masculie');
            $utilisateur->setTelephone('11111111');
            $utilisateur->setMail('tester@mail.com');
            $utilisateur->setLogin('testlogin'); 

        // Preparer l'enregistrement dans la BDD
            $manager->persist($utilisateur);
            }

    // Enregistrer dans BDD
        $manager->flush();
    }
}
