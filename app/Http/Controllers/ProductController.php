<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        $products = Product::all();
        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validate([
            'name'=>'required',
            'slug'=>'required',
            'description'=>"required",
            'price'=>'required'
        ]);
        $product = Product::create($data);
        return response()->json($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Product $product): \Illuminate\Http\JsonResponse
    {
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Product $product): \Illuminate\Http\JsonResponse
    {
        $data = $request->validate([
            'name'=>'required',
            'slug'=>'required',
            'description'=>"required",
            'price'=>'required'
        ]);
        $product->update($data);
        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Product $product): \Illuminate\Http\JsonResponse
    {
        $product->delete();
        return response()->json([
            'message'=>'Product deleted',
            'product'=>$product
        ]);
    }
}
