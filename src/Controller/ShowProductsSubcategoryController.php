<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowProductsSubcategoryController extends AbstractController
{
    #[Route('/ps/{id}', name: 'app_show_products_subcategory')]
    public function index(int $id, CategoriesRepository $categoriesRepository, ProductsRepository $productsRepository): Response
    {
        $category = $categoriesRepository->find($id);
        $products = $productsRepository->findBy(['categories' => $category]);

        return $this->render('show_products_subcategory/index.html.twig', [
            'controller_name' => 'ShowProductsSubcategoryController',
            'category' => $category,
            'product' => $products,
        ]);
    }
}
