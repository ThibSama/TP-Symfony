<?php

namespace App\Controller;

use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowProductController extends AbstractController
{
    #[Route('/p/{id}', name: 'app_show_product')]
    public function index(ProductsRepository $productsRepository, int $id): Response
    {
        $product = $productsRepository->find($id);

        return $this->render('show_product/index.html.twig', [
            'controller_name' => 'ShowProductController',
            'product' => $product,
        ]);
    }
}
