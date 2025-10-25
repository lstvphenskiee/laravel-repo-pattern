<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\ProductRepositoryInterface;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    protected $productRepo;

    // intject interfacce
    public function __construct(ProductRepositoryInterface $productRepo) {
        $this->productRepo = $productRepo;
    }

    public function index() {
        $product = $this->productRepo->getProduct();
 
        return response()->json($product, 200);
    }

    // display specific product
    public function show($id) {
        $product = $this->productRepo->findProduct($id);

        if(!$product) {
            return response()->json(['message'=> 'Product not found'], 404) ;
        }

        return response()->json($product, 200);
    }

    // storing product
    public function store(ProductRequest $req) {
        // dd("store mothod hit");
        // $data = $req->only('name', 'price', 'description');
        $data = $req->validated();   //validated data from Product Request

        $product = $this->productRepo->createProduct($data);

        return response()->json([
            'message' => 'Product created',
            'data' => $product
        ], 200);
    }

    // update
    public function  update(ProductRequest $req, $id) {
        // $data = $req->only('name', 'price', 'description');
        $data = $req->validated();

        $updated = $this->productRepo->updateProduct($id, $data);

        if(!$updated) {
            return response()->json(['message' => "Product not found"], 404);
        }

        // This one use for json output
        return response()->json([
            'message' => 'Product updated',
            'data' => $updated
        ], 200);
    }

    public function destroy($id) {
        $deleted = $this->productRepo->deleteProduct($id);

        if(!$deleted) {
            return response()->json([
                'message' => "product not found"
            ], 404);
        }

        return response()->json([
            'message' => "Product deleted",
            'data' => $deleted
        ], 200);
    }
}
