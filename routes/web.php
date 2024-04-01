<?php

use App\Models\Shop;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $shops = Shop::paginate(3);
    return view('welcome', compact("shops"));
});