<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rotas de Niveis e Desenvolvedores
|--------------------------------------------------------------------------
*/
require_once 'routes/niveis.php';
require_once 'routes/desenvolvedores.php';

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
