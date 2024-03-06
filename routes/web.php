<?php

use App\Http\Controllers\QuizController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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
    return redirect('/quiz');
});
Route::middleware('guest')->group(function (){
    Route::get('/login',[LoginController::class,'index']);
    Route::post('/login',[LoginController::class,'store']);
    Route::get('/register',[RegisterController::class,'index']);
    Route::post('/register',[RegisterController::class,'store']);
});
Route::middleware('auth')->group(function (){
    Route::post('/logout',[LoginController::class,'logout']);

    Route::get('/quiz',[QuizController::class,'index']);
    Route::post('/quiz',[QuizController::class,'post']);
    Route::get('/quiz/{quiz}',[QuizController::class,'show']);
    Route::post('/quiz/{quiz}',[QuizController::class,'answer']);
});
