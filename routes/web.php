<?php

use App\Http\Controllers\ShopController;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $shops = Shop::paginate(3);
    return view('welcome', compact("shops"));
})->name("home");

Route::get('/product', function () {
    $products = Product::paginate(3);
    return view("pages.product", compact("products"));
})->name("product");

Route::resource("shops", ShopController::class);