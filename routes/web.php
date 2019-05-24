<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Controller@welcome');

Route::get('questions/{question}/answers', 'AnswerController@index')->name('questions.answers.index');
Route::get('questions/{question}/answers/create', 'AnswerController@create')->name('questions.answers.create');
Route::get('questions/{question}/answers/{answer}', 'AnswerController@show')->name('questions.answers.show');
Route::post('questions/{question}/answers/store', 'AnswerController@store')->name('questions.answers.store');
Route::get('questions/{question}/answers/{answer}/edit', 'AnswerController@edit')->name('questions.answers.edit');
Route::put('questions/{question}/answers/{answer}/update', 'AnswerController@update')->name('questions.answers.update');
Route::delete('questions/{question}/answers/{answer}/destroy', 'AnswerController@destroy')->name('questions.answers.destroy');

Route::get('questions', 'QuestionController@index')->name('questions.index');
Route::get('questions/create', 'QuestionController@create')->name('questions.create');
Route::get('questions/{question}', 'QuestionController@show')->name('questions.show');
Route::post('questions/store', 'QuestionController@store')->name('questions.store');
Route::get('questions/{question}/edit', 'QuestionController@edit')->name('questions.edit');
Route::put('questions/{question}/update', 'QuestionController@update')->name('questions.update');
Route::delete('questions/{question}/destroy', 'QuestionController@destroy')->name('questions.destroy');

Route::post('games/{game}/{user}/{question}/answer', 'GameController@answer')->name('games.answer');
Route::get('games', 'GameController@index')->name('games.index');
Route::get('games/create', 'GameController@create')->name('games.create');
Route::get('games/{game}', 'GameController@show')->name('games.show');
Route::post('games/store', 'GameController@store')->name('games.store');
Route::get('games/{game}/edit', 'GameController@edit')->name('games.edit');
Route::put('games/{game}/update', 'GameController@update')->name('games.update');
Route::delete('games/{game}/destroy', 'GameController@destroy')->name('games.destroy');

Route::get('users', 'UserController@index')->name('users.index');
Route::get('users/create', 'UserController@create')->name('users.create');
Route::get('users/{user}', 'UserController@show')->name('users.show');
Route::post('users/store', 'UserController@store')->name('users.store');
Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
Route::put('users/{user}/update', 'UserController@update')->name('users.update');
Route::delete('users/{user}/destroy', 'UserController@destroy')->name('users.destroy');