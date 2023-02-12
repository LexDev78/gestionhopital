<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisiteController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\TraitementController;
use App\Http\Controllers\RapportController;

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
    })->name("index");

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

    //Route paiements
    Route::resource('Paiement', PaiementController::class);

    //Route salle
    Route::resource('salle', SalleController::class);

    //Route traitement
    Route::resource('traitement', TraitementController::class);

    //Route rapport
    Route::resource('rapport', RapportController::class);

    //Route operation
    Route::resource('operation', OperationController::class);

});
//=========================================End Group Middleware Auth========================//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware("auth")->name('home');




