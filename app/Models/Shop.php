<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function products()
    {
        return $this->hasMany(Product::class,"shopId","id");
    }
}