<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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


Route::get('/', [HomeController::class,'index']);
Route::get('/home', [HomeController::class,'redirect'])->middleware('auth','verified');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/add_view', [AdminController::class,'addview']);


Route::post('/upload_bank', [AdminController::class,'upload']);

Route::post('/appointment', [HomeController::class,'appointment']);
Route::get('/myappointment', [HomeController::class,'myappointment']);
Route::get('/cancel_appoint ', [HomeController::class,'cancel_appoint']);
Route::get('/showappointment', [AdminController::class,'showappointment']);
Route::get('/approved/{id} ', [AdminController::class,'approved']);
Route::get('/canceled/{id} ', [AdminController::class,'canceled']);
Route::get('/showbloodbank', [AdminController::class,'showbloodbank']);
Route::get('/deletebloodbank/{id} ', [AdminController::class,'deletebloodbank']);
Route::get('/updatebloodbank/{id}', [AdminController::class,'updatebloodbank']);
Route::post('/editbloodbank/{id}', [AdminController::class,'editbloodbank']);

Route::get('/emailview/{id}', [AdminController::class,'emailview']);
Route::post('/sendemail/{id}', [AdminController::class,'sendemail']);

