<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Chauffage;



class ChauffagerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $listeChauffage = ["Electrique", "Fuel","Gaz","Bois"];

        for ($i=0; $i<=count($listeChauffage); $i++)
        {
            $chauffage = new Chauffage();
            $chauffage->setType($listeChauffage[$i]);
            $manager->persist($chauffage);
        }     
        $manager->flush();
    }
}
