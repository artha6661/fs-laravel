<?php

use App\Http\Controllers\Api\BankUser;
use App\Http\Controllers\Api\BankUserController;
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

Route::get('/home',[BankUserController::class,'index']);

Route::post('/bankuser',[BankUserController::class,'store']);

Route::put('/bankuser/{id}',[BankUserController::class,'update']);

Route::delete('/bankuser/{id}',[BankUserController::class,'destroy']);
