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

//Route::get('/produto', "App\Http\Controllers\ProdutoController@index")->name("produto.index");
//Route::get('/produto/create', "App\Http\Controllers\ProdutoController@create")->name("produto.create");
//Route::post('/produto', "App\Http\Controllers\ProdutoController@store")->name("produto.store");

//Route::get('/tipoproduto', "App\Http\Controllers\TipoProdutoController@index");

Route::resource('produto', "App\Http\Controllers\ProdutoController");
Route::resource('tipoproduto', "App\Http\Controllers\TipoProdutoController");


