<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;

use Illuminate\Http\Request;

class ProductController
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }


    public function index()
    {
        try {
            $products = $this->productService->all();

            return response()->json([
                'data' => $products
            ]);
        }
        catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function get(Product $product)
    {
        try {
            /*
            $request->validate([
                'id' => 'required',
            ]);

            $product = $this->productService->get($request->id);
            */

            return response()->json([
                'data' => $product
            ]);
        }
        catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function create(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|max:255',
            ]);

            $this->productService->store($request->name);

            return response()->json([
                'data' => null
            ], 201);
        }
        catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function update(Product $product, Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|max:255',
            ]);

            $product->update(['name' => $request->name]);

            return response()->json([
                'data' => null
            ]);
        }
        catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function delete(Product $product)
    {
        try {
            $product->delete();

            return response()->json([
                'data' => null
            ], 204);
        }
        catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }
    }
}
