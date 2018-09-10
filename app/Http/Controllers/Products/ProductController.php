<?php

namespace App\Http\Controllers\Products;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\{ProductIndexResource, ProductResource};
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);

        return ProductIndexResource::collection(
            $products
        );
    }

    public function show(Product $product)
    {
         return new ProductResource(
             $product
         );
    }
}
