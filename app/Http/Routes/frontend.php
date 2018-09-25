<?php
Route::group(['namespace' => 'Frontend'], function()
{
    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
    Route::post('/send-contact', ['as' => 'send-contact', 'uses' => 'ContactController@store']);   
    Route::get('{slug}', ['as' => 'detail', 'uses' => 'DetailController@index']);
    Route::get('{slug}.html', ['as' => 'pages', 'uses' => 'HomeController@pages']);
});

