<?php
namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Interfaces\ProductRepositoryInterface;

// Implementation of ProductRepositoryInterfaces
class ProductRepository implements ProductRepositoryInterface
{
    // protected $model;

    // Injection of product model into repository
    // public function __construct(Product $product_model) {
    //     $this->model = $product_model;
    // }

    // Return all products, getProduct came from Interface
    public function getProduct() {
        // return $this->model->all();
        return Product::all();
    }

    public function findProduct($id) {
        // return $this->model->find($id);
        return Product::find($id);
    }

    public function createProduct(array $data) {
        // return $this->model->create($product_data);
        return Product::create($data);
    }

    public function updateProduct($id, array $data) {
        // $product = $this->model->find($product_id);
        $product = Product::find($id);  

        if(!$product) {
            return false;
        }

        return $product->update($data);
    }

    public function deleteProduct($id) {
        // $product = $this->model->find($product_id);
        $product = Product::find($id);

        if(!$product) {
            return false;
        }

        return $product->delete();
    }
}