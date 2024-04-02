<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "address" => "required"
        ]);
        $oldShop = Shop::where("name", "LIKE", "%" . $request->name . "%");
        if ($oldShop)
            return redirect(route("home"))->with("error", "Shop has been created");
        $shop = new Shop();
        $shop->name = $request->name;
        $shop->email = $request->email;
        $shop->address = $request->address;
        $shop->save();
        return redirect(route("home"))->with("message", "Shop created successfully");
    }
    public function show($id)
    {
        $shop = Shop::find($id);
        return view("pages.shops.information", compact("shop"));//tương đương : pages/shops/information
    }
    public function destroy($id)
    {
        $shop = Shop::find($id);
        $products = $shop->products;
        foreach ($products as $p) {
            $p->delete();
        }
        $shop->delete();
        return redirect("home")->with("message", "Shop deleted successfully");
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "address" => "required"
        ]);
        $shop = Shop::find($id);
        $shop->name = $request->name;
        $shop->email = $request->email;
        $shop->address = $request->address;
        $shop->save();
        return redirect(route("shops.show", $id))->with("message", "Shop update successfully");
    }
}