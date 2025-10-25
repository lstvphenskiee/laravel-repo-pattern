<?php
namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Interfaces\ProductRepositoryInterface;

// Emplementation of ProductRepositoryInterfaces

class ProductRepository implements ProductRepositoryInterface
{
    protected $model;

    // Injection of product model into repository
    // public function __construct(Product $product_model) {
    //     $this->model = $product_model;
    // }

    // Return all products
    public function getProduct() {
        // return $this->model->all();
        return Product::all();
    }

    public function findProduct($product_id) {
        // return $this->model->find($product_id);
        return Product::find($product_id);
    }

    public function createProduct(array $product_data) {
        // return $this->model->create($product_data);
        return Product::create();
    }

    public function updateProduct($product_id, array $product_data) {
        // $product = $this->model->find($product_id);
        $product = Product::find($product_id);

        if(!$product) {
            return false;
        }

        $product->update($product_data);

        return $product;
    }

    public function deleteProduct($product_id) {
        // $product = $this->model->find($product_id);
        $product = Product::find($product_id);

        if(!$product) {
            return false;
        }

        $product->delete();
        
        return $product;
    }
}