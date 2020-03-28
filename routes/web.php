<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'OperarioHomeController@home')->name('operario.home');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('operario.login');
Route::post('/login', 'Auth\LoginController@login')->name('operario.login');
Route::post('/logout', 'Auth\LoginController@logout')->name('operario.logout');

Route::prefix('admin')->group(function ()  {
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.doLogin');
    Route::post('/logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');

    //Route::get('/register', 'AuthAdmin\RegisterController@showRegistrationForm')->name('admin.register');
    //Route::post('/register', 'AuthAdmin\RegisterController@register')->name('admin.register');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/retalho/getRetalho', 'RetalhoController@getRetalho')->name('retalho.get');
    Route::get('/tipoVidro/getTipoVidro', 'TipoVidroController@getTiposVidro')->name('tipoVidro.get');
    Route::get('/categoria/getCategorias', 'CategoriaController@getCategorias')->name('categorias.get');
    Route::get('/localizacao/getLocalizacoes', 'LocalizacaoController@getLocalizacoes')->name('localizacoes.get');

    Route::resource('retalho', 'RetalhoController');
    Route::resource('tipoVidro', 'TipoVidroController');
    Route::resource('categoria', 'CategoriaController');
    Route::resource('localizacao', 'LocalizacaoController');
});
