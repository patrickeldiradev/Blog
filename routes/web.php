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

Route::group([
    'namespace' => 'App\Http\Controllers\Site',
    'as' => 'site.',
], function () {
    Route::get('/', 'PostController@index')->name('post.index');
    Route::get('/posts/{post}', 'PostController@show')->name('post.show');
});

Route::group([
    'namespace' => 'App\Http\Controllers\Dashboard',
    'prefix' => 'dashboard',
    'as' => 'Dashboard.',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::get('/', 'PostController@index')->name('post.index');
});

require __DIR__ . '/auth.php';
