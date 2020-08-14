<?php

use Illuminate\Support\Facades\Route;
use App\Todo

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
Route::get('/todos','TodosController@index')->name('todos.index');
Route::get('/todos/create','TodosController@create')->name('todos.create');
Route::post('/todos','TodosController@store')->name('todos.store'); // making a post request
Route::get('/todos/{id}','TodosController@show')->name('todos.show');
Route::get('/todos/{id}/edit','TodosController@edit')->name('todos.edit');
Route::put('/todos/{id}','TodosController@update')->name('todos.update'); // making a put request
Route::delete('/todos/{id}','TodosController@destroy')->name('todos.destroy'); // making a delete request
Route::resource('/todos','TodosController');
Todo::where('completed',true)->take(8)->get(); // only take 8 todos from the database. <- just an example, we don't have completed column
Todo::where('title','LIKE',"{%}$search_keyword{%}")->get(); // with LIKE operator.
Todo::where('title','LIKE',"{%}$search_keyword{%}")->take(8)->get(); //retrieve only 8 results.
Todo::select(['title','body'])->findOrFail(id); // for specific columns, you can also chain where() with select().
Todo::where('title','value')->whereOr('body','value')->firstOrFail(); // with SQL OR operator
Todo::where('title','value')->whereAnd('body','value')->firstOrFail(); // with SQL AND operator.