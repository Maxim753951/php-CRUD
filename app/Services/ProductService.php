<?php

namespace App\Services;

use App\Models\Product;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class ProductService
{
    public function all()
    {
        return Product::all();
    }

    /*
    public function get($id)
    {
        return Product::findOrFail($id);
    }
    */

    public function store($name)
    {
        return Product::insert([
            'name' => $name
        ]);
    }
}
