<?php

use App\Http\Controllers\ChannelsController;
use App\Http\Controllers\FavouritesController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\RepliesController;
use App\Http\Controllers\ThreadsController;
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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get("/threads", [ThreadsController::class, "index"]);
Route::get("/threads/create", [ThreadsController::class, "create"])->middleware("auth");
Route::post("/threads", [ThreadsController::class, "store"])->middleware("auth");
Route::get("/threads/{channel:slug}/{thread}", [ThreadsController::class, "show"]);

Route::get("/threads/{channel:slug}", [ChannelsController::class, "show"]);

Route::post("/threads/{channel:slug}/{thread}/replies", [RepliesController::class, "store"])->middleware("auth");

Route::post("/replies/{reply}/favourites", [FavouritesController::class, "store"])->middleware("auth");

Route::get("/profiles/{user:name}", [ProfilesController::class, "show"]);