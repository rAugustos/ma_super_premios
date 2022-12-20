<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\LuckyNumber;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', static function () {
    $notDrawn = collect([]);
    foreach (Product::withCount('luckyNumbers')
                 ->get()
                 ->where('lucky_numbers_count', '>=', 99900) as $product) {
        if ($product->luckyNumbers->where('is_winner', '=', 1)->count() === 0) {
            $notDrawn->push($product);
        }
    }

    $federal = Http::withoutVerifying()->get("https://servicebus2.caixa.gov.br/portaldeloterias/api/federal")->object();

    $vencedores = collect([]);
    foreach ($notDrawn as $finalizado) {
        foreach ($federal->listaDezenas as $numero) {
            $vencedores->push(LuckyNumber::where('number', '=', (int)$numero)
                ->where('product_id', '=', $finalizado->id)
                ->get());
        }
    }

    foreach ($vencedores as $vencedor) {
        $vencedor->first->update([
            'is_winner' => 1,
        ]);
    }

    return inertia('Index/Index', [
        'products' => Product::with(['images'])->limit(4)->get(),
    ]);
})->name('index');

Route::inertia('profile', 'Users/Edit');
Route::put('{user}/profile', function (Request $request, User $user) {
    $user->update($request->all());
    return back();
});

Route::resource('products', ProductController::class)->only(['index', 'show']);
Route::get('products/{product}/{quantity}/checkout', function (Product $product, $quantity) {
    $product->load('images');
    return inertia('Products/Checkout', ['product' => $product, 'quantity' => $quantity]);
})->name('products.checkout');

Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('/', function () {
        $federal = Http::withoutVerifying()->get("https://servicebus2.caixa.gov.br/portaldeloterias/api/federal")->object();
        $vencedores = [];

        foreach ($federal->listaDezenas as $numero) {
            $vencedores[$numero] = LuckyNumber::where('number', '=', $numero)->get();
        }

        return inertia('Admin/Index', ['federal' => $federal, 'vencedores' => $vencedores]);
    })->name('index');

    Route::resource('products', AdminProductController::class)->except(['show']);
    Route::resource('users', AdminUsersController::class)->only(['index', 'show']);

    Route::inertia('/login', 'Admin/Login');
    Route::delete('/products/images/{image}', function (Request $request, ProductImage $image) {
        Storage::disk('local')->delete("public/$image->path");
        $image->delete();
        return true;
    });
});

Route::inertia('/dashboard', 'Dashboard')->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('generate-numbers', function (Request $request) {
        $numbers = collect([]);

        for ($i = 0; $i < $request->quantity; $i++) {
            $numbers->push(LuckyNumber::create([
                'user_id' => auth()->id(),
                'product_id' => $request->product_id,
                'number' => LuckyNumber::generateNumber($request->product_id),
            ]));
        }

        return $numbers->toJson();
    })->name('generate-numbers');

    Route::get('draws', function () {
        $filtered = auth()->user()->luckyNumbers->unique('product_id');

        $products = collect([]);
        foreach ($filtered as $number) {
            $product = Product::find($number->product_id);
            $product->load('luckyNumbers');
            $products->push($product);
        }

        return inertia('User/Draws', ['products' => $products]);
    })->name('numbers');
});

require __DIR__ . '/auth.php';
