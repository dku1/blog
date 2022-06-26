<?php

use Illuminate\Support\Facades\Auth;
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
    Route::get('/', 'IndexController')->name('index');
});

Route::group([
    'namespace' => 'App\Http\Controllers\Personal',
    'prefix' => 'personal',
    'middleware' => 'auth',
], function () {

    Route::group(['namespace' => 'Main'], function () {
        Route::get('main', 'IndexController')->name('personal.main.index');
    });

    Route::group(['namespace' => 'Liked', 'prefix' => 'liked'], function () {
        Route::get('/', 'IndexController')->name('personal.liked.index');
        Route::delete('{post}', 'DeleteController')->name('personal.liked.delete');
    });

    Route::group(['namespace' => 'Comment', 'prefix' => 'comment'], function () {
        Route::get('/', 'IndexController')->name('personal.comment.index');
        Route::get('edit/{comment}', 'EditController')->name('personal.comment.edit');
        Route::patch('update/{comment}', 'UpdateController')->name('personal.comment.update');
        Route::delete('{comment}', 'DeleteController')->name('personal.comment.delete');
    });

});

Route::group([
    'namespace' => 'App\Http\Controllers\Admin',
    'prefix' => 'admin',
    'middleware' => ['auth', 'is_admin'],
], function () {

    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('admin.index');
    });

    Route::group([
        'namespace' => 'Category',
        'prefix' => 'categories',
    ], function () {
        Route::get('/', 'IndexController')->name('admin.categories.index');
        Route::get('create', 'CreateController')->name('admin.categories.create');
        Route::post('store', 'StoreController')->name('admin.categories.store');
        Route::get('show/{category}', 'ShowController')->name('admin.categories.show');
        Route::get('edit/{category}', 'EditController')->name('admin.categories.edit');
        Route::patch('update/{category}', 'UpdateController')->name('admin.categories.update');
        Route::delete('delete/{category}', 'DeleteController')->name('admin.categories.delete');
    });

    Route::group([
        'namespace' => 'Tag',
        'prefix' => 'tags',
    ], function () {
        Route::get('/', 'IndexController')->name('admin.tags.index');
        Route::get('create', 'CreateController')->name('admin.tags.create');
        Route::post('store', 'StoreController')->name('admin.tags.store');
        Route::get('show/{tag}', 'ShowController')->name('admin.tags.show');
        Route::get('edit/{tag}', 'EditController')->name('admin.tags.edit');
        Route::patch('update/{tag}', 'UpdateController')->name('admin.tags.update');
        Route::delete('delete/{tag}', 'DeleteController')->name('admin.tags.delete');
    });

    Route::group([
        'namespace' => 'Post',
        'prefix' => 'posts',
    ], function () {
        Route::get('/', 'IndexController')->name('admin.posts.index');
        Route::get('create', 'CreateController')->name('admin.posts.create');
        Route::post('store', 'StoreController')->name('admin.posts.store');
        Route::get('show/{post}', 'ShowController')->name('admin.posts.show');
        Route::get('edit/{post}', 'EditController')->name('admin.posts.edit');
        Route::patch('update/{post}', 'UpdateController')->name('admin.posts.update');
        Route::delete('delete/{post}', 'DeleteController')->name('admin.posts.delete');
    });

    Route::group([
        'namespace' => 'User',
        'prefix' => 'users',
    ], function () {
        Route::get('/', 'IndexController')->name('admin.users.index');
        Route::get('create', 'CreateController')->name('admin.users.create');
        Route::post('store', 'StoreController')->name('admin.users.store');
        Route::get('show/{user}', 'ShowController')->name('admin.users.show');
        Route::get('edit/{user}', 'EditController')->name('admin.users.edit');
        Route::patch('update/{user}', 'UpdateController')->name('admin.users.update');
        Route::delete('delete/{user}', 'DeleteController')->name('admin.users.delete');
    });

});

Auth::routes();
