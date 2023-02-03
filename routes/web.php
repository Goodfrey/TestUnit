<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TestController;
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

Auth::routes();

Route::get('/home',     [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/register', [App\Http\Controllers\RegisterController::class, 'showRegistrationForm'])->name('register');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'  =>  '/admin', 'middleware' => 'auth'], function()
{
    Route::get('/',                     [AdminController::class, 'view'])->name('/');
    Route::get('/invoices',             [AdminController::class, 'invoices'])->name('/invoices');
    Route::get('/view/{id}',            [AdminController::class, 'identified'])->name('/view/{id}');
});

Route::group(['prefix'  =>  '/client', 'middleware' => 'auth'], function()
{
    Route::get('/',                     [ClientController::class, 'view'])->name('/');
    Route::post('/add',                 [ClientController::class, 'add'])->name('/add');

});

Route::group(['prefix'  =>  '/test'], function()
{
    Route::get('/',                 [TestController::class, 'view'])->name('/');
});
