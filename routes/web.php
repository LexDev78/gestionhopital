<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\VisiteController;
use App\Http\Controllers\PatientController;


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


  //========================================Authentification=============================//  
    Auth::routes();
  //====================================End Authentification=============================//  

 //======================================Group Middleware Auth===========================//   
Route::group(['middleware'=>'auth'],function()
{
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/', function () {
        return view('index');
    })->name("home");

    //========================================Gestion Utilisateurs==========================//
        Route::resource("user",UserController::class);
        Route::get('profile',[UserController::class,"profile"])->name("user.profile");
        Route::post('user/up',[UserController::class,"update"])->name("user.up");
    //=====================================End Gestion Utilisateurs==========================//
    //**Test */
Route::resource('test', TestController::class);
//Route Visite
Route::resource('Visite', VisiteController::class);
//Route patient
Route::resource('Patient', PatientController::class);

});
//=========================================End Group Middleware Auth========================//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware("auth")->name('home');




