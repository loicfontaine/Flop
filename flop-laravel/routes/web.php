<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\Auth\LoginController;



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

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
//example of a route sending a variable to a controller

Route::get('/boutique', [App\Http\Controllers\ArticleController::class, 'index'])->name("boutique");

Route::get('/', function () {
    return view('homePage');
});
Route::get('/inscription', function () {
    return view('inscription');
});
Route::get('/dashboard', function () {
    return view('dashboard');
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

Route::get('/admin_dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/logout', [LoginController::class, 'logout']);

Route::resource('user', UserController::class);

Route::resource('poll', PollController::class);

Route::resource('challenge', ChallengeController::class);
Route::resource('article', ArticleController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/chat', function () {
    return view('chat');
});

Route::get('/emission', function () {
    return view('emission');
});

Route::get('/messages', [MessageController::class, 'index']);
Route::post('/messages', [MessageController::class, 'store']);
