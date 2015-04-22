<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Home page
    Route::get('/', ['uses' => 'PagesController@home', 'as' => 'home']);
    Route::get('home', ['uses' => 'PagesController@home' , 'as' => 'home']);

//region Single Page Routes
    Route::get('news',  ['uses' => 'PagesController@news' ,  'as' => 'news'] );
    Route::get('about', ['uses' => 'PagesController@about' , 'as' => 'about']);
    //Route::get('feeds', ['uses' => 'PagesController@feeds' , 'as' => 'feeds']);
//endregion

//region Authenticated Routes
    Route::group(['middleware' => 'main_toon'], function()
    {
        Route::get('feeds',          ['uses' => 'PagesController@feeds' ,  'as' => 'feeds']);
        Route::get('events',         ['uses' => 'EventsController@index' , 'as' => 'events']);
        Route::get('coc',            ['uses' => 'PagesController@coc' ,    'as' => 'coc']);
        Route::get('chat',           ['uses' => 'PagesController@chat' ,   'as' => 'chat']);
//        Route::get('resetToonTable', ['uses' => 'AdminController@resetToonTable' , 'as' => 'resetToonTable']);
    });

//        Route::get('feeds', ['middleware' => 'auth', 'uses' => 'PagesController@feeds', 'as' => 'feeds']);
//        Route::get('coc',             ['middleware' => 'auth', 'uses' => 'PagesController@coc',            'as' => 'coc']);
//        Route::get('chat',            ['middleware' => 'auth', 'uses' => 'PagesController@chat',           'as' => 'chat' ]);
//        Route::post('resetToonTable', ['middleware' => 'auth', 'uses' => 'AdminController@resetToonTable', 'as' => 'resetToonTable']);
//endregion

//region Administration Routes
//    Route::get('admin', ['uses' => 'AdminController@index', 'as' => 'admin']);
//    Route::get('admin/get-members',['uses'  => 'AdminController@getMembers', 'as' => 'admin/get-members']);
//    Route::get('access', ['middleware' => 'admin', 'uses' => 'AdminController@index', 'as' => 'access']);
//endregion

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
