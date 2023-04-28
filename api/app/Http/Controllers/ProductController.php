<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\Category as CategoryResource;
use Illuminate\Support\Facades\Storage;

class ProductController extends BaseController
{
    public function ProductList()
    {

        $products = Product::with("category")->get();
        
        foreach ($products as $product) 
        {
            $product->image = $product->image ? asset($product->image) : null;
            $product->id = $product->getKey();
        }

        return $this->sendResponse(ProductResource::collection($products), "Termékek kiirva!");
    }

    public function CategoryList()
    {
        $categories = Category::all();
        return $this->sendResponse(CategoryResource::collection($categories), "Kategóriák kiirva!");
    }



    public function NewProduct(Request $request)
    {
        $input = $request->all();

        DB::statement("ALTER TABLE products AUTO_INCREMENT = 1;");
        
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
            "category.required" => "A termék kategóriájának megadása kötelező!"
        ]);
 
        if ($validator->fails())
        {
            return $this->sendError($validator->errors());
        }

        $product = Product::create($input);

        return $this->sendResponse(new ProductResource($product), "Termék létrehozva!");

    }

    public function AddImageToProduct(Request $request, $image)
    {
        $input = $request->all();

        $validator = Validator::make($input,
        [
            "image" => "required|image|mimes:jpg,png,jpeg,gif"
        ],
        [
            "image.required" => "A kép megadása kötelező!",
            "image.image" => "A kép nem megfelelő!",
            "image.mimes" => "A kép fomátuma nem megfelelő! (jpg,png,jpeg,gif)"
        ]);

        if ($validator->fails())
        {
            return $this->sendError($validator->errors());
        }

        $product = Product::find($image);

        if ($request->hasFile("image")) 
        {
            $imageFile = $request->file("image");
            $newImageName = time() . "_" . $imageFile->getClientOriginalName();
            $imagePath = $imageFile->storeAs("public/images", $newImageName);
            $product->image = "storage/". "app/" . $imagePath;
            $product->save();
        }

        return $this->sendResponse(new productResource($product), "A kép frissítve!");

    }

    public function GetProductImage($id)
    {
        $product = Product::find($id);

        if (!$product) 
        {
            return $this->sendError("A termék nem található!");
        }

        $imagePath = $product->image;

        if (!$imagePath) 
        {
            return $this->sendError("A terméknek nincs képe!");
        }

        $publicPath = str_replace("storage/app/", "", $imagePath);
        $imageFullPath = storage_path("app/" . $publicPath);

        if (!file_exists($imageFullPath)) 
        {
            return $this->sendError("A kép nem található!");
        }

        return response()->file($imageFullPath);
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

    public function UpdateProduct(Request $request, $id)
    {
        $input = $request->all();

        if(is_null($input))
        {
            return $this->sendError("A termék nem létezik!");
        }
        
        $validator = Validator::make($input,
        [
            "name" => "required",
            "price" => "required",
            "weight" => "required",
            "description" => "required",
        ],
        [
            "name.required" => "A termék nevének megadása kötelező!",
            "price.required" => "A termék árának megadása kötelező!",
            "weight.required" => "A termék súlyának megadása kötelező!",
            "description.required" => "A termék leirásának megadása kötelező!",
        ]);

        if ($validator->fails())
        {
            return $this->sendError($validator->errors());
        }

        $product = Product::find($id);
        $product->update($request->all());
        $product->save();

        return $this->sendResponse(new productResource($product), "A termék frissítve!"); 
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
        return $this->sendResponse([], "Termék törölve!");
    }

}