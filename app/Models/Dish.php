<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'category_id',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'dishes_products');
    }
}
