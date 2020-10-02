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
    return view('public.index');
});


Route::get('/blogpost', 'BlogController@getAllBlogPost')->name('blogpost.getall');
Route::get('/singlepost/{id}', 'BlogController@getPostById')->name('blogpost.singlepost');
Route::get('/categories', 'BlogController@getAllCategory')->name('blogpost.getAllCategory');
Route::get('/categorypost/{id}', 'BlogController@getPostByCategoryId')->name('blogpost.postbycategoryid');
Route::get('/search', 'BlogController@searchPost')->name('blogpost.searchpost');


Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
Route::get( '/post', 'PostController@all_post')->name('post.all');
Route::get('/post/{id}', 'PostController@deletePost')->name('post.delete');
Route::post('/savepost', 'PostController@savePost')->name('post.save');
Route::get('/editpost/{id}', 'PostController@editPost')->name('post.edit');
Route::post('/update-post/{id}', 'PostController@updatePost')->name('post.update');


Route::post( '/add-category', 'CategoryController@add_category')->name('category.save');
Route::get( '/category', 'CategoryController@getAllCategory')->name('category.getall');
Route::get('/editcategory/{id}', 'CategoryController@editCategory')->name('category.edit');
Route::get( '/category/{id}', 'CategoryController@deleteCategory')->name('category.delete');
Route::post('/update-category/{id}', 'CategoryController@updateCategory')->name('category.update');


//Route::get('/{anypath}', 'HomeController@index')->where('path', '.*');

