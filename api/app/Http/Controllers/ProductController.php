<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Product as ProductResource;

class ProductController extends BaseController
{
    public function ProductList()
    {
        $products = Product::with("category")->get();

        return $this->sendResponse(ProductResource::collection($products), "Termékek kiirva!");
    }

    public function NewProduct(Request $request)
    {
        $input = $request->all();

        DB::statement("ALTER TABLE users AUTO_INCREMENT = 1;");
        
        $input["category_id"] = Category::where("category", $input["category"])->value("id");

        $validator = Validator::make($input,
        [
            "name" => "required",
            "price" => "required",
            "weight" => "required",
            "description" => "required",
            "category" => "required"
        ],
        [
            "name.required" => "A termék nevének megadása kötelező!",
            "price.required" => "A termék árának megadása kötelező!",
            "weight.required" => "A termék súlyának megadása kötelező!",
            "description.required" => "A termék leirásának megadása kötelező!",
            "category.required" => "A termék kategóriájának megadása kötelező!",
        ]);
 
        if ($validator->fails())
        {
            return $this->sendError($validator->errors());
        }

        $product = Product::create($input);

        return $this->sendResponse(new ProductResource($product), "Termék létrehozva!");

    }

    public function ShowProductById ($id)
    {
        $product = Product::find($id);

        if(is_null($product))
        {
            return $this->sendError("A termék nem létezik!");
        }

        return $this->sendResponse(new ProductResource($product), "Termék betöltve.");
        
    }

    public function DeleteProduct($id)
    {
        Product::destroy($id);
        
        $product = Product::find($id);
        $products = Product::where("id", ">", $id)->orderBy("id")->get();
        foreach($products as $product)
        {
            $product->id = $product->id -1;
            $product->save();
        }
        return $this->sendResponse([], "Product Deleted!");
    }

}
