<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'TodoListController@index');

Route::resource('todos', 'TodoListController');

Route::resource('todos.tasks', 'TaskController', array('except' => ['index', 'show']));

Route::patch('todos/{todos}/tasks/{tasks}/complete', ['as' => 'todos.tasks.complete', 'uses' => 'TaskController@complete']);