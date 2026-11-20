<?php

namespace App\DataFixtures;

use App\Entity\Membre;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Faker\Factory;

class MembreFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
    // J'utilise la bibliothèque Faker    
        $faker = Factory::create('fr_FR');
        
        //Initialiser les données de l'entité Membre

        for ($i = 0; $i < 15; $i++) {
            $membre = new Membre();
            $membre->setNoms($faker->lastName());
            $membre->setPrenoms($faker->firstName());
            $membre->setFonction($faker->jobTitle());
            $membre->setDatEmploi(new \DateTime());
        // $manager->persist($product);
        // Enregistrer l'entité Membre dans la base de données
        $manager->persist($membre);
        }

        // Vous pouvez ajouter d'autres membres ici si nécessaire
    
        $manager->flush();
    }
}