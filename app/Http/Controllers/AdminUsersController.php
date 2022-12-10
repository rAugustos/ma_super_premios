<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function index()
    {
        return inertia('Admin/Users/Index', ['users' => User::paginate(25)]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function show(User $user)
    {
        $filtered = $user->luckyNumbers->unique('product_id');

        $products = collect([]);
        foreach ($filtered as $number) {
            $product = Product::find($number->product_id);
            $product->load('luckyNumbers');
            $products->push($product);
        }

        return inertia('Admin/Users/Show', ['user' => $user, 'products' => $products]);
    }
}

