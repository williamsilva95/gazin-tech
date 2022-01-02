<?php
Route::group(['prefix' => 'nivel'], function (){

    Route::get('/', 'NivelController@index');

    Route::get('/create', 'NivelController@create');

    Route::post('/store', 'NivelController@store');

    Route::get('/edit/{nivel}', 'NivelController@edit');

    Route::post('/destroy', 'NivelController@destroy');

    Route::get('/show/{nivel}','NivelController@show');
});
