<?php

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
Route::get('login', [UserController::class, 'index'])->name('login');
Route::post('custom-login', [UserController::class, 'Login'])->name('login.custom'); 
Route::get('register', [UserController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [UserController::class, 'Register'])->name('register.custom'); 
Route::get('signout', [UserController::class, 'signOut'])->name('signout');




