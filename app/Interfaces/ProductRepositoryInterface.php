<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    // Getting all products
    public function getProduct();

    // Get Product by ID
    public function findProduct($id);

    // Create new Product
    public function createProduct(array $data);

    // Update product
    public function updateProduct($id, array $data);

    // Delete product
    public function deleteProduct($id);
}
