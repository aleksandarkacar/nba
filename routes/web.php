<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [TeamController::class, 'index'])->middleware('signedin');
Route::get('/teams/{id}', [TeamController::class, 'show'])->middleware('signedin');
Route::get('/players/{id}', [PlayerController::class, 'show'])->middleware('signedin');
Route::get('/signout', [AuthController::class, 'signout']);
Route::get('/verify/{id}', [AuthController::class, 'verifyemail']);
Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{id}', [NewsController::class, 'show']);
Route::get('/news/team/{name}', [NewsController::class, 'filter']);

//povezi news sa userom associate i news dodati u db

Route::get('signin', function (){
    return view('auth/signin');
});

Route::get('/register', function (){
    return view('auth/register');
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/signin', [AuthController::class, 'signin']);
Route::post('createcomment', [CommentController::class, 'store'])->middleware('hatechecker');
