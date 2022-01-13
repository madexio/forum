<?php

use App\Http\Controllers\ReplyController;
use App\Http\Controllers\ThreadController;
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
Route::get("/threads", [ThreadController::class, "index"]);
Route::get("/threads/create", [ThreadController::class, "create"])->middleware("auth");
Route::post("/threads", [ThreadController::class, "store"])->middleware("auth");
Route::get("/threads/{channel:slug}/{thread}", [ThreadController::class, "show"]);
Route::post("/threads/{channel:slug}/{thread}/replies", [ReplyController::class, "store"])->middleware("auth");