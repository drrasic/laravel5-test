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

Route::get('/', function () {
    return view('welcome');
});
//
//Route::get('contact', function () {
//    return view('pages.contact');
//});

Route::post('push_register', 'PushController@register');

Route::get('push_notifications', 'PushController@index');

Route::post('send_push', 'PushController@sendPush');

/*
Route::get('about', 'PagesController@about');

Route::get('task', 'TaskController@index');
Route::get('task/{id}', 'TaskController@show');
*/