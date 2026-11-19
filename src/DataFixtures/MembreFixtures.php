<?php

namespace App\DataFixtures;

use App\Entity\Membre;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MembreFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Initialiser les données de l'entité Membre
        for ($i = 0; $i < 14; $i++) {
            $membre = new Membre();
            $membre->setNoms('Paul');
            $membre->setPrenoms('');
            $membre->setFonction('');
            $membre->setDatEmploi(new \DateTime());

        // Preparer l'Enregistrement l'entité Membre dans la base de données
        $manager->persist($membre);
        }

        // Enregistrer les Utilisateurs
        $manager->flush();
    }
}

