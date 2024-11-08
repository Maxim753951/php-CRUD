<?php

namespace App\Services;

use App\Models\Category;

use Illuminate\Support\Facades\DB;

class CategoryService
{
    public function all()
    {
        return Category::all();
    }

    public function store($name)
    {
        return Category::insert([
            'name' => $name
        ],[
            'name' => $name
        ]);
    }
}
