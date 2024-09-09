<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {

  return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home.index');
Route::get('/assunto', 'AssuntoController@index')->name('assunto.index');
Route::get('/autor', 'AutorController@index')->name('autor.index');

Route::post('/insert_assunto', 'AssuntoController@store')->name('insert_assunto.index');
Route::post('/delete_assunto', 'AssuntoController@destroy')->name('delete_assunto.index');

Route::post('/insert_autor', 'AutorController@store')->name('insert_autor.index');
Route::post('/delete_autor', 'AutorController@destroy')->name('delete_autor.index');

Route::post('/insert_livro', 'LivroController@store')->name('insert_livro.index'); 

