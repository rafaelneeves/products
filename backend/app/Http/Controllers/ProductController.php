<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function getAllProducts()
    {
        $products = Product::get()->toJson(JSON_PRETTY_PRINT);
        return response($products, 200);
    }

    public function createProducts(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->save();

        return response()->json([
            "message" => "Produto criado com sucesso!"
        ], 201);
    }

    public function getProduct($id)
    {
        if (Product::where('id', $id)->exists()) {
            $product = Product::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($product, 200);
        } else {
            return response()->json([
                "message" => "Produto não encontrado!"
            ], 404);
        }
    }

    public function updateProduct(Request $request, $id)
    {
        if (Product::where('id', $id)->exists()) {
            $product = Product::find($id);
            $product->name = is_null($request->name) ? $product->name : $request->name;
            $product->description = is_null($request->description) ? $product->description : $request->description;
            $product->price = is_null($request->price) ? $product->price : $request->price;
            $product->category = is_null($request->category) ? $product->category : $request->category;
            $product->save();

            return response()->json([
                "message" => "Produto atualizado com sucesso!"
            ], 200);
        } else {
            return response()->json([
                "message" => "Produto não encontrado!"
            ], 404);
        }
    }

    public function deleteProduct($id)
    {
        if (Product::where('id', $id)->exists()) {
            $product = Product::find($id);
            $product->delete();

            return response()->json([
                "message" => "Produto Deletado"
            ], 202);
        } else {
            return response()->json([
                "message" => "Produto não encontrado!"
            ], 404);
        }
    }
}
