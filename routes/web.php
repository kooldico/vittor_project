<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/','UserController@mainPage');

Route::get('reg','UserController@registration');

Route::post('reg-submit','UserController@regSubmit');

Route::get('login','UserController@login');

Route::post('login-submit','UserController@loginSubmit');

Route::get('blog','blogController@blog');

Route::post('blog-submit','blogController@blogSubmit');

Route::post('edit-blog','blogController@editBlog');

Route::get('delete-blog','blogController@deleteBlog');

Route::get('logout','UserController@logout');

