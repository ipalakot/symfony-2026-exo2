<?php

namespace App\DataFixtures;

use App\Entity\Membre;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MembreFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();

        //Initialiser les données de l'entité Membre

        $membre = new Membre();

        $membre->setNoms('PAUl');
        $membre->setPrenoms('Romain');
        $membre->setFonction('Développeur');
        $membre->setDatEmploi(new \DateTime());

        // $manager->persist($product);
        // Enregistrer l'entité Membre dans la base de données
        $manager->persist($membre);

        // Vous pouvez ajouter d'autres membres ici si nécessaire
    
        $manager->flush();
    }
}
