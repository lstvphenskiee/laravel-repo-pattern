<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductsResource;

class ProductController extends Controller
{
    protected $product;

    // intject interfacce
    public function __construct(ProductService $productService) {
        $this->product = $productService;
    }

    public function index() {
        $product = $this->product->getAllProduct();     //getAllProduct method is came from the method of ProductService
 
        return response()->json($product, 200);
    }

    // display specific product
    public function show($id) {
        $product = $this->product->getProductById($id);

        if(!$product) {
            return response()->json(['message'=> 'Product not found'], 404) ;
        }

        // return response()->json($product, 200);
        return new ProductsResource($product);
    }

    // storing product
    public function store(ProductRequest $req) {
        // dd("store mothod hit");
        $data = $req->validated();   //validated data from Product Request

        $product = $this->product->createProducts($data);

        // Return with the Resources
        // return new ProductsResource($product);

        return response()->json([
            'message' => "Product created",
            'data' => new ProductsResource($product)
        ]);
    }

    // update
    public function  update(ProductRequest $req, $id) {
        // $data = $req->only('name', 'price', 'description');
        $data = $req->validated();

        $updated = $this->product->updateProducts($id, $data);

        if(!$updated) {
            return response()->json(['message' => "Product not found to be updated"], 404);
        }

        // This one use for json output
        return response()->json([
            'message' => 'Product updated',
            'data' => new ProductsResource($updated)
        ], 200);
    }

    public function destroy($id) {
        $deleted = $this->product->destroyProducts($id);

        if(!$deleted) {
            return response()->json([
                'message' => "product not found"
            ], 404);
        }

        return response()->json([
            'message' => "Product deleted"
        ], 200);
    }
}
