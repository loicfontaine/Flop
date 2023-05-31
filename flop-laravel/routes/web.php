<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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



Route::get('/connexion', function () {
    return view('connexion');
});

Route::get('/', function () {
    return view('homePage');
});
Route::get('/inscription', function () {
    return view('inscription');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/connexion', function () {
    return view('connexion');
});


Route::get('/test', function () {
    return view('test');
});

Route::resource('user', UserController::class);
