<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;;

use Faker;

class ProductsFixtures extends Fixture
{
    private $categoryRepository;

    public function __construct(\App\Repository\CategoriesRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        $categories = $this->categoryRepository->findAll();
        $categoryId = array_map(fn ($category) => $category->getId(), $categories);

        for ($i = 0; $i < 15; $i++) {
            $product = new \App\Entity\Products();
            $category = $this->categoryRepository->find($faker->randomElement($categoryId));

            if ($category) {
                $product->setCategories($category);
            }

            // $product->setCategories($faker->randomElement($categoryId));
            $product->setName($faker->name);
            $product->setDescription($faker->text);
            $product->setPrice($faker->randomFloat(2, 0, 1000));
            $product->setstock($faker->numberBetween(0, 100));

            $manager->persist($product);
        }


        $manager->flush();
    }
    public function getDependencies(): array
    {
        return [
            CategoriesFixtures::class
        ];
    }
}
