<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile','ProfileController@index')->name('profile');
Route::put('/profile/update', 'ProfileController@update')->name('profile.update');


// Routes for posts
Route::get('/posts', 'PostController@index')->name('posts');
Route::get('/posts/trashed', 'PostController@postsTrashed')->name('posts.trashed');
Route::get('/post/create', 'PostController@create')->name('posts.create');
Route::post('/post/store', 'PostController@store')->name('posts.store');
Route::get('/post/show/{slug}', 'PostController@show')->name('posts.show');
Route::get('/post/edit/{id}', 'PostController@edit')->name('posts.edit');
Route::post('/post/update/{id}', 'PostController@update')->name('posts.update');
Route::get('/post/destroy/{id}', 'PostController@destroy')->name('posts.destroy');
Route::get('/post/delete/{id}', 'PostController@hdelete')->name('posts.hdelete');
Route::get('/post/resotre/{id}', 'PostController@restore')->name('posts.restore');

// Routes for Tags
Route::get('/tags', 'TagController@index')->name('tags');
Route::get('/tag/create', 'TagController@create')->name('tag.create');
Route::post('/tag/store', 'TagController@store')->name('tag.store');
Route::get('/tag/edit/{id}', 'TagController@edit')->name('tag.edit');
Route::post('/tag/update/{id}', 'TagController@update')->name('tag.update');
Route::get('/tag/destroy/{id}', 'TagController@destroy')->name('tag.destroy');

// Routes for users
Route::get('/users', 'UserController@index')->name('users');
Route::get('/user/create', 'UserController@create')->name('user.create');
Route::post('/user/store', 'UserController@store')->name('user.store');
Route::get('/user/destroy/{id}', 'UserController@destroy')->name('user.destroy');


