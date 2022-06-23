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

Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
   Route::get('/', 'IndexController');
});

Route::group([
    'namespace' => 'App\Http\Controllers\Admin',
    'prefix' => 'admin',
], function (){
    Route::group(['namespace' => 'Main'], function (){
       Route::get('/', 'IndexController');
    });

    Route::group([
        'namespace' => 'Category',
        'prefix' => 'categories',
    ], function (){
        Route::get('/', 'IndexController')->name('admin.categories.index');
        Route::get('create', 'CreateController')->name('admin.categories.create');
        Route::post('store', 'StoreController')->name('admin.categories.store');
        Route::get('show/{category}', 'ShowController')->name('admin.categories.show');
        Route::get('edit/{category}', 'EditController')->name('admin.categories.edit');
        Route::patch('update/{category}', 'UpdateController')->name('admin.categories.update');
        Route::delete('delete/{category}', 'DeleteController')->name('admin.categories.delete');
    });
});

Auth::routes();
