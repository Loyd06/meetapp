<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Membre;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class MembresFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create("fr_FR");
        $genres = ["male", "female"];
        
        for ($i=0 ; $i<100 ; $i++) {
            $sexe = mt_rand(0,1);
            if ($sexe == 0) {
                $type="men";
            }
            else {
                $type = "women";
            }
            $membre = new Membre();
            $membre     ->setNom($faker->lastName())
                        ->setPrenom($faker->firstName($genres[$sexe]))
                        ->setRue($faker->streetAddress())
                        ->setCp($faker->numberBetween(75000, 92000))
                        ->setVille($faker->city())
                        ->setMail($faker->email())
                        ->setSexe($sexe)
                        ->setAproposde($faker->sentence(100))
                        ->setAvatar("https://randomuser.me/api/portraits/".$type."/".$i.".jpg");
            $manager->persist($membre);
        }
        $manager->flush();
    }
}
