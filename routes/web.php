<?php

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



Route::group (['namespace'=>'Admin', 'middleware'=>['auth']],function () {
    Route::resource('admin', 'AdminController');
});

Route::get('/', 'IndexController@show')->name('index');
Route::get('/textnews{id}', 'TextNewsController@show')->name('textnews');

Route::post('/subscribe','SubscribeController@store')->name('subscribe');


Route::post ('/publishComment', 'CommentController@publishComment')->name('publishComment');

Route::post('/getComment', 'CommentController@getComment')->name('getComment');

Route::get('/getNews', 'Admin\AdminController@getNews')->name('getNews');

Route::post('/destroy', 'Admin\AdminController@destroy')->name('destroy');

//Route::post('/edit', 'Admin\AdminController@edit')->name('edit');

Route::get ('/job', function (){
    App\Jobs\SendMessage::dispatch("TEST Message");

});

Auth::routes();

