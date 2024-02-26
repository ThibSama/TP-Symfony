<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as Faker;
use App\Repository\ProductsRepository;
use App\Entity\Images;
use GuzzleHttp\Client;

class ImagesFixtures extends Fixture
{
    private $productsRepository;
    private $products;

    public function __construct(ProductsRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
        $this->products = $this->productsRepository->findAll();
    }


    public function load(ObjectManager $manager)
    {
        $faker = Faker::create();
        $client = new Client(['verify' => false]);

        $targetDir = __DIR__ . '/../../public/images/productimages/';

        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        foreach ($this->products as $product) {
            $image = new Images();
            $imageUrl = $faker->imageUrl();
            $imageContent = $client->get($imageUrl)->getBody()->getContents();

            $imagePath = $targetDir . uniqid() . '.jpg';
            file_put_contents($imagePath, $imageContent);

            $image->setName($imagePath);
            $image->setProducts($product);

            $manager->persist($image);
        }

        $manager->flush();
    }
}
