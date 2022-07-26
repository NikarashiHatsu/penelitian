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

Route::get('/', [\App\Http\Controllers\IndexController::class, 'landing_page'])->name('index');
Route::view('/under-construction', 'under-construction')->name('index');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => 'auth'], function() {
    Route::view('/', 'dashboard.index')->name('index');
    Route::resource('cms', \App\Http\Controllers\CmsController::class)->except('show')->parameter('cms', 'cms');
    Route::resource('cms.attachment', \App\Http\Controllers\AttachmentController::class)->only('destroy')->parameter('cms', 'cms');
    Route::resource('contact', \App\Http\Controllers\ContactController::class)->except('show');
    Route::resource('gallery', \App\Http\Controllers\GalleryController::class)->except('show');
    Route::resource('vision-mission', \App\Http\Controllers\VisionMissionController::class)->except('show');
    Route::resource('footer', \App\Http\Controllers\FooterController::class)->except('show');
    Route::resource('hero', \App\Http\Controllers\HeroController::class)->except('show');
    Route::resource('skema-penelitian', \App\Http\Controllers\SkemaPenelitianController::class)->except('show');
});

require __DIR__.'/auth.php';
