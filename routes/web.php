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

Route::get('/', function () {
    return view('welcome');
});
// Get all users
Route::get('/users', 'UserController@index');
// Insert new user
Route::post('/users', 'UserController@store');
// Get user with given id
Route::get('/users/{id}', 'UserController@show');
// Update user with given id
Route::patch('/users/{id}/update', 'UserController@update');
// Delete user with given id
Route::delete('/users/{id}/delete', 'UserController@destroy');
