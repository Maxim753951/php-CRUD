<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Services\DishService;

use Illuminate\Http\Request;

class DishController
{
    private DishService $dishService;

    public function __construct(DishService $dishService)
    {
        $this->dishService = $dishService;
    }


    public function index()
    {
        try {
            $products = $this->dishService->all();

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

    public function get(Dish $dish)
    {
        try {
            /*
            if ($request->query('include') === 'products') {
                $dish->load('products:id');
            }
            */

            $dish->load('products:id,name');

            return response()->json([
                'data' => $dish
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
            $validate = $request->validate([
                'name' => 'required|string|max:255',
                'category_id' => 'nullable|integer',
                'products_id' => 'array',
                'products_id.*' => 'integer'
            ]);

            $dish = $this->dishService->store($validate);

            if($tags = $request->input('products_id', [])) {
                $dish->products()->sync($tags);
            }

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

    public function update(Dish $dish, Request $request)
    {
        try {
            $validate =$request->validate([
                'name' => 'string|max:255',
                'category_id' => 'nullable|integer',
                'products_id' => 'array',
                'products_id.*' => 'integer'
            ]);

            if($tags = $request->input('products_id', [])) {
                $dish->products()->sync($tags);
            }

            $dish->update($validate);

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

    public function delete(Dish $dish)
    {
        try {
            $dish->delete();

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
