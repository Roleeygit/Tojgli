<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function NewProduct()
    {
        $categories = Category::all();

        foreach ($categories as $category) 
        {
            return view("new_product", [

                "categories" => $categories
             ]); 

        }
    }

    public function StoreProduct(REQUEST $request)
    {
        
        $category = $request->category;
        $categories = Category::where("id", $category)->get();
        $category_id = 0;
        foreach($categories as $category)
            $category_id = $category->id;


        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->weight = $request->weight;
        $product->description = $request->description;
        $product->category_id = $category_id;
        $product->save();

        $request->session()->flash("success","Adat feltöltése sikeres!");
        return redirect("/new-product");
    }

    public function ProductData()
    {
        $products = Product::with("category")->get();
        foreach ($products as $product) 
        {
            return view("list_products", [

                "products" => $products
             ]); 

        }
    }


    public function listProducts()
    {
        $products = Product::with("category")->get();

        return view("list_products", 
        [
            "products" => $products
        ]);
    }
}
