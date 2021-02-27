<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Bien;
use App\Repository\BienRepository;
use App\Entity\Chauffage;
use App\Repository\ChauffageRepository;
use ContainerWJEWdck\getChauffageRepositoryService;
use Doctrine\ORM\Mapping\Id;
use Faker\Factory;
use Proxies\__CG__\App\Entity\Chauffage as EntityChauffage;

class BienFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 50; $i++) {

            $repository = $manager->getRepository(Chauffage::class);
            $chauffage = $repository->findAll();

            $bien = new Bien();

            $bien->setTitre($faker->words(3, true));
            $bien->setDescription($faker->sentences(3, true));
            $bien->setSurface($faker->numberBetween(20, 350));
            $bien->setChambre($faker->numberBetween(2, 10));
            $bien->setPiece($faker->numberBetween(1, 5));
            $bien->setEtage($faker->numberBetween(1, 5));
            $bien->setAdresse($faker->address);
            $bien->setVille($faker->city);
            $bien->setCp($faker->postcode);
            $bien->setActif(true);
            $bien->setChauffage($chauffage->getId([1]));
            $bien->setPrix($faker->numberBetween(100000, 1000000));

            $manager->persist($bien);
        }

        $manager->flush();
    }
}
