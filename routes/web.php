<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TokoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/homepage', [HomeController::class, 'index1'])->name('homepage');

// Route::get('/homepage', [HomeController::class, 'homepage'])->name('homepage');
Route::get('/producpage', [TokoController::class, 'index'])->name('producpage');
Route::post('/producpage', [TokoController::class, 'store'])->name('store');
Route::get('/producpage/create', [TokoController::class, 'create'])->name('create');
Route::post('/producpage/{producpage}', [TokoController::class, 'update'])->name('update');
Route::delete('/producpage/{producpage}', [TokoController::class, 'destroy'])->name('delete');
Route::get('/producpage/{producpage}/edit', [TokoController::class, 'edit'])->name('edit');


Route::get('/homepage/{id}', [HomeController::class, 'detail'])->name('detail');

// order
Route::get('/homepage/order', [HomeController::class, 'order'])->name('order.submit');




Route::group(['middleware' => 'web'], function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});
