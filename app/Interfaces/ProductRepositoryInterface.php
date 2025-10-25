<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    // Getting all products
    public function getProduct();

    // Find product by it ID
    public function findProduct($product_id);

    // Create new Product
    public function createProduct(array $product_data);

    // Update product
    public function updateProduct($product_id, array $product_data);

    // Delete product
    public function deleteProduct($product_id);
}
