<?php

use App\Http\Controllers\FollowerController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;


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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('', [UserController::class, 'dashboard']); 
Route::get('login', [UserController::class, 'index']);
Route::post('postlogin', [UserController::class, 'Login'])->name('login.custom'); 
Route::get('register', [UserController::class, 'registration']);
Route::post('postregistration', [UserController::class, 'Register'])->name('register.custom'); 
Route::get('signout', [UserController::class, 'signOut']);



Route::post('follow/{id}', [FollowerController::class, 'SendRequest'])->name('follow'); 



