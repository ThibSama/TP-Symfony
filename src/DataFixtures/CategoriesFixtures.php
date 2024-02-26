<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;;

class CategoriesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category = new Categories();
        $category->setName('informatique');
        $manager->persist($category);

        $produit = new Categories();
        $produit->setName('ordinateur');
        $produit->setParent($category);
        $manager->persist($produit);

        $produit = new Categories();
        $produit->setName('portable');
        $produit->setParent($category);
        $manager->persist($produit);

        $produit = new Categories();
        $produit->setName('smartphone');
        $produit->setParent($category);
        $manager->persist($produit);

        $category = new Categories();
        $category->setName('électronique');
        $manager->persist($category);

        $produit = new Categories();
        $produit->setName('télévision');
        $produit->setParent($category);
        $manager->persist($produit);

        $produit = new Categories();
        $produit->setName('console de jeux');
        $produit->setParent($category);
        $manager->persist($produit);

        $produit = new Categories();
        $produit->setName('appareil photo');
        $produit->setParent($category);
        $manager->persist($produit);

        $produit = new Categories();
        $produit->setName('haut-parleur');
        $produit->setParent($category);
        $manager->persist($produit);

        $category = new Categories();
        $category->setName('maison');
        $manager->persist($category);

        $produit = new Categories();
        $produit->setName('meubles');
        $produit->setParent($category);
        $manager->persist($produit);

        $produit = new Categories();
        $produit->setName('décoration');
        $produit->setParent($category);
        $manager->persist($produit);

        $produit = new Categories();
        $produit->setName('électroménager');
        $produit->setParent($category);
        $manager->persist($produit);

        $manager->flush();
    }
}
