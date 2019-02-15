<?php

use App\Http\Controllers;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/artists', 'ArtistsController@getAll');
Route::get('/artist/{name}', 'ArtistsController@getOne');

Route::get('/albums', function () {
    return view('albums');
});

