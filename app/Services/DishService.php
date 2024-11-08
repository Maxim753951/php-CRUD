<?php

namespace App\Services;

use App\Models\Dish;

use Illuminate\Support\Facades\DB;

class DishService
{
    public function all()
    {
        return Dish::with('products:id')->get();
    }

    public function store($data)
    {
        return Dish::create($data);
    }
}
