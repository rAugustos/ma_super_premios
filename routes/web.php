<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\LuckyNumber;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
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

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});

Route::get('/', function () {
    $products = Product::limit(5)->get();
    $products->load('images');
    return inertia('Index/Index', ['products' => $products]);
})->name('index');

Route::inertia('login', 'Users/Login');
Route::post('login', [LoginController::class, 'login']);

Route::inertia('register', 'Users/Register');
Route::post('register', [LoginController::class, 'register']);

Route::get('logout', function () {
    Auth::logout();
    return redirect()->route('index');
});

Route::inertia('numbers', 'Users/Numbers')->name('numbers');

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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        $federal = Http::withoutVerifying()->get("https://servicebus2.caixa.gov.br/portaldeloterias/api/federal")->object();
        $vencedores = [];

        foreach ($federal->listaDezenas as $numero) {
            $vencedores[$numero] = LuckyNumber::where('number', '=', $numero)->get();
        }

        return inertia('Admin/Index', ['federal' => $federal, 'vencedores' => $vencedores]);
    })->name('index');

    Route::resource('products', AdminProductController::class)->except(['show']);

    Route::inertia('/users', 'Admin/Users/Index');
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
});

require __DIR__ . '/auth.php';
