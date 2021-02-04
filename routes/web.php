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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile/{user}', 'ProfilesController@show')->name('profile.show');
Route::patch('/profile/{user}/', 'ProfilesController@update')->name('profile.update')->middleware('auth');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit')->middleware('auth');


Route::get('/question/create', 'QuestionsController@create')->name('question.create')->middleware('auth');
Route::post('/question/create', 'QuestionsController@store')->middleware('auth');
Route::get('/question/{question}', 'QuestionsController@show')->name('question.show');
Route::get('/question/{question}/edit', 'QuestionsController@edit')->name('question.edit')->middleware('auth');
Route::patch('/question/{question}', 'QuestionsController@update')->name('question.update')->middleware('auth');
Route::delete('/question/{question}', 'QuestionsController@delete')->name('question.delete')->middleware('auth');

Route::get('/question/{question}/answer/create', 'AnswersController@create')->name('answer.create')->middleware('auth');
Route::post('/question/{question}/answer/create', 'AnswersController@store')->middleware('auth');
Route::get('/question/{question}/answer/{answer}/edit', 'AnswersController@edit')->name('answer.edit')->middleware('auth');
Route::patch('/question/{question}/answer/{answer}/edit', 'AnswersController@update')->middleware('auth');
Route::delete('/question/{question}/answer/{answer}/edit', 'AnswersController@delete')->middleware('auth');
