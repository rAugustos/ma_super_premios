<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Inertia::view;
     */
    public function index()
    {
        $products = Product::paginate(20);
        return inertia('Admin/Products/Index', ['products' => $products]);
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return \Inertia\Inertia::view;
     */
    public function show(Product $product)
    {
//        return inertia('Admin/Products/Show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return \Inertia\Inertia::view;
     */
    public function edit(Product $product)
    {
        $product->load('images');
        return inertia('Admin/Products/Edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return \Inertia\Inertia::view;
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->except(['images']));

        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                ProductImage::create([
                    'path' => $image->store('images/products', ['disk' => 'public']),
                    'product_id' => $product->id,
                ]);
            }
        }

        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Inertia::view;
     */
    public function create()
    {
        return inertia('Admin/Products/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return \Inertia\Inertia::view;
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->except('images'));

        foreach ($request->file('images') as $image) {
            ProductImage::create([
                'path' => $image->store('images/products', ['disk' => 'public']),
                'product_id' => $product->id,
            ]);
        }

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return \Inertia\Inertia::view;
     */
    public function destroy(Product $product)
    {
        foreach ($product->images as $key => $image) {
            Storage::disk('local')->delete("public/$image->path");
        }

        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
