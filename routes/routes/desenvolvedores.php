<?php

Route::group(['prefix' => 'desenvolvedor'], function () {

    Route::get('/', 'DesenvolvedorController@index');

    Route::get('/create', 'DesenvolvedorController@create');

    Route::post('/store', 'DesenvolvedorController@store');

    Route::get('/edit/{desenvolvedor}', 'DesenvolvedorController@edit');

    Route::post('/destroy', 'DesenvolvedorController@destroy');

    Route::get('/show/{desenvolvedor}','DesenvolvedorController@show');

    Route::get('pesquisar','DesenvolvedorController@pesquisar');

    Route::post('pesquisar','DesenvolvedorController@pesquisar');

    Route::get('exportar','DesenvolvedorController@exportar');
});
