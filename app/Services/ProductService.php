<?php

namespace App\Services;

// Inject the interface in Services
use App\Interfaces\ProductRepositoryInterface;

class ProductService
{
    protected $products;

    public function __construct(ProductRepositoryInterface $productRepo) {
        $this->products = $productRepo;
    }

    public function getAllProduct() {
        return $this->products->getProduct();  //getProduct came from Repository methodd
    }

    public function getProductById($id) {
        return $this->products->findProduct($id); //findProduct from Repository method
    }

    public function createProducts(array $data) {
        return $this->products->createProduct($data);   //createProduct from Repo method
    }

    public function updateProducts($id, array $data) {
        return $this->products->updateProduct($id, $data);  //updateProduct from Repoe
    }

    public function destroyProducts($id) {
        return $this->products->deleteProduct($id);     //deleteProduct from Repo 
    }
}