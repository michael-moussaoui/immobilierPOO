<?php

namespace App\Controller;


use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;




class ProductController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/nos-biens', name: 'app_product')]
    public function index()
    {
        // on récupère tous les products
        $products = $this->entityManager->getRepository(Product::class)->findAll();



        return $this->render('product/index.html.twig', [
            'products' => $products
        ]);
    }
}
