<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function search(Request $request){
        $products = Product::where("name","LIKE","%".$request->search.'%')->paginate(3);
        $shops = Shop::all();
        return view("pages.product",compact("products", "shops"));
    }
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
            "price" => "required|numeric",
            "shop_id"=>"required"
        ]);
        $oldProduct = Product::where("name", "LIKE", $request->name)->first();
        if ($oldProduct)
            return redirect(route("home"))->with("error", "Product has been created");
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->shopId = $request->shop_id;
        $product->save();
        return redirect(route("home"))->with("message", "Product created successfully");
    }
    public function show($id)
    {
        $product = Product::find($id);
        $shops = Shop::all();
        return view("pages.products.information", compact("product","shops"));//tương đương : pages/Products/information
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        $products = $product->products;
        foreach ($products as $p) {
            $p->delete();
        }
        $product->delete();
        return redirect(route("home"))->with("message", "Product deleted successfully");
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
            "price" => "required|numeric",
            "shop_id"=>"required"
        ]);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->shopId = $request->shop_id;
        $product->save();
        return redirect(route("products.show", $id))->with("message", "Product update successfully");
    }
}