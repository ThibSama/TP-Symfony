<?php

namespace App\Controller;

use App\Repository\CartRepository;
use App\Repository\OrdersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class ShoppingCartController extends AbstractController
{
    #[Route('/shopping}', name: 'shopping_cart', methods: ["POST"])]
    public function addToCart(OrdersRepository $ordersRepository, CartRepository $cartRepository, Request $request, $productId): Response
    {
        $product = $ordersRepository->find($productId);

        if (!$product) {
            throw $this->createNotFoundException('Produit non trouvé');
        }

        $cartRepository->addProduct($product);

        return $this->redirectToRoute('app_show_product');
    }
}
