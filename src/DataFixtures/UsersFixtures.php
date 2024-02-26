<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;;

use Faker;

class UsersFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 15; $i++) {
            $user = new \App\Entity\Users();
            $user->setEmail($faker->email);
            $user->setPassword($faker->password);
            $user->setFirstname($faker->firstName);
            $user->setLastname($faker->lastName);
            $user->setAdress($faker->address);
            $user->setZipcode($faker->postcode);
            $user->setCity($faker->city);

            $manager->persist($user);
        }


        $manager->flush();
    }
}
