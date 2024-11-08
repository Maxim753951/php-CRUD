<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CategoryService;

use Illuminate\Http\Request;

class CategoryController
{
    private CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }


    public function index() {
        $categories = $this->categoryService->all();

        return view('category.index', compact('categories'));
    }

    public function get(Category $category) {
        return view('category.edit', compact('category'));
    }

    public function create(Request $request)
    {
        try {
            $request->validate([
                'name' => 'max:255',
            ]);

            $this->categoryService->store($request->name);

            return redirect()->route('category.index');
        } catch (\Exception $e) {
            //return redirect()->back()->withErrors($e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(Category $category, Request $request)
    {
        try {
            $request->validate([
                'name' => 'max:255',
            ]);

            $category->update(['name' => $request->name]);

            return redirect()->route('category.index');
        } catch (\Exception $e) {
            //return redirect()->back()->withErrors($e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function delete(Category $category)
    {
        try {
            $category->delete();

            return redirect()->route('category.index');
        } catch (\Exception $e) {
            //return redirect()->back()->withErrors($e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
