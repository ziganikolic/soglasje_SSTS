<?php

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
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'password.confirm']);;

//Contract all
Route::get('/contract_questions', [\App\Http\Controllers\ContractQuestionsController::class, 'index']);

//Contract
Route::get('/contract', [\App\Http\Controllers\ContractController::class, 'index'])
    ->name('contract')
    ->middleware('auth');

//Contract status
Route::post('/contract_status',[\App\Http\Controllers\ContractStatusController::class, 'store'])
    ->middleware('auth');
Route::get('/contract_status/{id}', [\App\Http\Controllers\ContractStatusController::class, 'show'])->middleware('auth');
Route::delete('/contract_status/delete/{id}', [\App\Http\Controllers\ContractStatusController::class, 'destroy'])->middleware('auth');

//DASHBOARD
Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');


//DASHBOARD CREATE USERS
Route::post('/dashboard/create_users', [\App\Http\Controllers\DashboardController::class, 'store'])
    ->name('dashboard.store')
    ->middleware('auth');

//DASHBOARD DELETE USERS
Route::post('/dashboard/delete_users', [\App\Http\Controllers\DashboardController::class, 'destroyALL'])
    ->middleware('auth');

//DASHBOARD USER INFO
Route::get('/dashboard/{id}', [\App\Http\Controllers\DashboardController::class, 'show'])
    ->name('dashboard.show')
    ->middleware('auth');


//Route::any('/{any}',function(){
//    return view('app');
//})->where('any','.*');
