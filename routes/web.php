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

Route::get('/', function () {
    return view('operario.auth.login');
});

Route::get('/admin', 'AdminController@index')->name('admin.home');

Route::get('admin/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
Route::get('admin/register', 'AuthAdmin\RegisterController@showRegistrationForm')->name('admin.register');
Route::post('admin/register', 'AuthAdmin\RegisterController@register')->name('admin.register');
Route::post('admin/login', 'AuthAdmin\LoginController@login')->name('admin.login');
Route::post('admin/logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');

Auth::routes();

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
