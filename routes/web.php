<?php

use App\Http\Controllers\ProductController;
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
    $shops = Shop::all();
    return view("pages.product", compact("products", "shops"));
})->name("product");

Route::resource("shops", ShopController::class);
Route::resource("products", ProductController::class);

Route::post("/products/search",[ProductController::class,"search"])->name("products.search.post");
Route::get("/products/search",[ProductController::class,"search"])->name("products.search.post");