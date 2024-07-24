<?php

namespace App\DataFixtures;

use ArrayIterator;
use Faker\Factory;
use App\Entity\Map;
use Faker\Generator;
use App\Entity\Establishment;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    private Generator $faker;

    public function __construct() {
        $this->faker = Factory::create('fr_FR');
    }
    
    public function load(ObjectManager $manager): void
    {
        //Map
        $maps = [];
        for ($i=0; $i < 10; $i++) { 
            $map = new Map();
            $map -> setName($this->faker->word());

            $maps[] = $map;
            $manager -> persist($map);
        }
        
        //Establishment
        $establishments = [];
        for ($i=0; $i < 10; $i++) {
            $establishment = new Establishment();
            $establishment  -> setName($this->faker->company())
                            -> setFiness(mt_rand(010000000, 959999999))
                            -> setAddress($this->faker->streetAddress())
                            -> setDepartment($this->faker->departmentNumber())
                            -> setRegion($this->faker->region())
                            -> setGeolocX($this->faker->latitude())
                            -> setGeolocY($this->faker->longitude());

            for ($k=0; $k < mt_rand(1, 5); $k++) { 
                $establishment->addMap($maps[mt_rand(0, count($maps)-1)]);
            }
            $establishments[] = $establishment;
            $manager -> persist($establishment);
        }



        $manager->flush();
    }
}
