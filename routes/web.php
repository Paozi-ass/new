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

Route::get('/', function () {
    return view('welcome');
});

Route::any('/index','index\StudentController@index');
Route::any('/add','index\StudentController@add');
Route::any('/edit','index\StudentController@edit');
Route::any('/update','index\StudentController@update');
Route::any('/delete','index\StudentController@delete');




Route::prefix('student')->group(function () {
    Route::any('index','admin\StudentController@index');
    Route::any('add','admin\StudentController@add');
    Route::any('/edit','admin\StudentController@edit');
    Route::any('/update','admin\StudentController@update');
    Route::any('/delete','admin\StudentController@delete');

    Route::any('/model','admin\StudentController@model');
    Route::any('/session','admin\StudentController@session');

});

Route::prefix('login')->group(function () {
    Route::any('/login','admin\LoginController@login');
    Route::any('/login_do','admin\LoginController@login_do');

});


Route::prefix('project')->group(function () {
    Route::any('/logouts','project\IndexController@logouts');
    Route::any('/index','project\IndexController@index');
    Route::any('/add','project\IndexController@add');
    Route::any('/detail/{id}','project\IndexController@detail')->name('detail');
    Route::get('/edit/{id}','project\IndexController@edit');
    Route::post('/edit/{id}','project\IndexController@update');
    Route::get('/delete/{id}','project\IndexController@delete');

});



Route::prefix('index')->group(function () {
    Route::any('/register','index\IndexController@register');
    Route::any('/login','index\IndexController@login');
    Route::any('/login_do','index\IndexController@login_do');
    Route::get('/index','index\IndexController@index');
    // Route::get('/ce','index\IndexController@ceshi');
    Route::get('/info/{id}','index\IndexController@info');
    Route::any('/list','index\IndexController@list');
});


Route::prefix('ceshi')->group(function () {
    Route::any('/login','ceshi\KucunController@login');
    Route::any('/login_do','ceshi\KucunController@login_do');
    Route::any('/add','ceshi\KucunController@add');
    Route::any('/list','ceshi\KucunController@list');
    Route::any('/shengji/{id}','ceshi\KucunController@shengji');
    Route::any('/huoadd','ceshi\KucunController@huoadd');
});



Route::prefix('zhoukao')->group(function () {
    Route::any('/login','zhoukao\UserController@login');
    Route::any('/login_do','zhoukao\UserController@login_do');
    Route::any('/index','zhoukao\UserController@index');
    Route::any('/list/{id}','zhoukao\UserController@list');
    Route::any('/search','zhoukao\UserController@search');
});
Route::get('zhoukao/linlin',function(){
    return view('zhoukao/index');
});


Route::any('/login','wechat\IndexController@login');
Route::any('/wechat','wechat\IndexController@index');
Route::any('/taglist','wechat\IndexController@tag_list');
Route::any('/tagadd','wechat\IndexController@tag_add');
Route::any('/tag_add_do','wechat\IndexController@tag_add_do');
Route::any('/tag_update','wechat\IndexController@tag_update');
Route::any('/tag_update_do','wechat\IndexController@tag_update_do');
Route::any('/tag_del','wechat\IndexController@tag_del');
Route::any('/wechatuser','wechat\IndexController@wechat_user');
Route::any('/wechat_user_add','wechat\IndexController@wechat_user_add');



Route::any('wechat/event','wechat\EventController@event');













    



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
