<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Inertia::view;
     */
    public function index()
    {
        $products = Product::with('images')->paginate(15);
        return inertia('Products/Index', ['products' => $products]);
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return \Inertia\Inertia::view;
     */
    public function show(Product $product)
    {
        $product->load('images');
        $product->loadCount('luckyNumbers');
        return inertia('Products/Show', ['product' => $product, 'url' => request()->url()]);
    }
}
