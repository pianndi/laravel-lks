<?php

use App\Http\Controllers\QuizController;
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

Route::get('/quiz',[QuizController::class,'index']);
Route::post('/quiz',[QuizController::class,'post']);
Route::get('/quiz/{quiz}',[QuizController::class,'show']);
Route::post('/quiz/{quiz}',[QuizController::class,'answer']);
