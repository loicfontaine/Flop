<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ParticipationController;
use App\Http\Controllers\FileController;




use App\Http\Controllers\MessageController;
use App\Http\Controllers\ChallengeController;
use App\Models\Participation;

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
    return redirect('/home');
});

Route::get('/home', function () {
    return view('homePage');
})->name('home');

Route::get('/inscription', function () {
    return view('inscription');
});
Route::get('/dashboard', [UserController::class, "getParticipations"])->name('dashboard');


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

Route::post('/createMusic', [PollController::class, 'createMusic'])->name('createMusic');
Route::resource('poll', PollController::class);
Route::resource('answer', AnswerController::class);
Route::post('participer', [ParticipationController::class, 'participate']);
Route::resource('challenge', ChallengeController::class);
Route::resource('article', ArticleController::class);
Route::resource('participation', ParticipationController::class);


Auth::routes();


Route::get('/chat', function () {
    return view('chat');
});

Route::get('/messages', [MessageController::class, 'index']);
Route::post('/messages', [MessageController::class, 'store']);


Route::post('formSubmit', [FileController::class, 'formSubmit']);

Route::get('/emission', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');