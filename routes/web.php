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

Route::view('/', 'under-construction')->name('index');
Route::view('/landing-page', 'landing-page')->name('landing-page');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => 'auth'], function() {
    Route::view('/', 'dashboard.index')->name('index');
    Route::resource('/cms', \App\Http\Controllers\CmsController::class)->except('show')->parameter('cms', 'cms');
});

require __DIR__.'/auth.php';
