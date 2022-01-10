<?php

use App\Http\Controllers\CarsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PracticeController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\PagesController;

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

/*
Route::get('/', function () {
    return view('home');
});
*/


//Route::get('/cars', [PagesController::class, 'index']);

//Route::get('/', [PracticeController::class, 'index']);

Route::resource('/cars', CarsController::class);

/*
Route::get('/users', function (){
    return redirect('/colleges');
}); */


// passing parameters as you see below with the data "id"
//also you can you create constrains on those parameters with the where clause ->where('id', '[0-9]' or '[0-9]+')
// Route::get('/colleges/{id}', [TeamController::class, 'show'])->where('id', '[a-z, A-Z, 0-9]+');

// or you can use this route it is the same thing as above

//Route::get('/Colleges', 'App\Http\Controllers\TeamController@index');
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

