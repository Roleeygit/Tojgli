<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function NewProduct()
    {
        $categories = Category::first()->get();

        foreach ($categories as $category) 
        {
            return view("new_product", [

                "categories" => $category
             ]); 

        }
    }

    public function StoreProduct(REQUEST $request)
    {
        
        $category = $request->category;
        $category = Category::where("cid",$category)->get();
        $category_cid = 0;
        foreach($category as $category)
            $category_cid = $category->cid;


        $product = new Product;
        $product->name=$request->name;
        $product->price=$request->price;
        $product->weight=$request->weight;
        $product->description=$request->description;
        $product->categories_id= $category_cid;
        $product->save();

        $request->session()->flash("success","Sikeres adat felvétel.");
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
