<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\MessageController;

use App\Http\Controllers\ChallengeController;


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

Route::get('/boutique', function () {
    return view('boutique_accueil');
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

Route::post('/inscription', function () {
    return view('inscription');
});



Route::get('/test', function () {
    return view('test');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/admin_dashboard', function () {


    return view('admin_dashboard');
});


Route::get('logout', [LoginController::class, 'logout']);

Route::resource('user', UserController::class);

Route::resource('challenge', ChallengeController::class);
Route::resource('Article', ArticleController::class);

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/chat', function () {
    return view('chat');
});

Route::get('/emission', function () {
    return view('emission');
});

