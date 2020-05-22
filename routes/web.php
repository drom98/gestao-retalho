<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'OperarioController@home')->name('home');
//Route::get('/retalho', 'OperarioController@consultarRetalho')->name('retalho');
//Route::get('/retalho/adicionar', 'OperarioController@adicionarRetalho')->name('retalho');

Auth::routes(['register' => false]);

Route::middleware(['auth:web', 'auth:admin'])->group(function () {

    /*
    Route::get('/retalho/getRetalho', 'RetalhoController@getRetalho')->name('retalho.get');
    Route::get('/tipoVidro/getTipoVidro', 'TipoVidroController@getTiposVidro')->name('tipoVidro.get');
    Route::get('/categoria/getCategorias', 'CategoriaController@getCategorias')->name('categorias.get');
    Route::get('/localizacao/getLocalizacoes', 'LocalizacaoController@getLocalizacoes')->name('localizacoes.get');

    Route::resource('retalho', 'RetalhoController');
    Route::resource('tipoVidro', 'TipoVidroController');
    Route::resource('categoria', 'CategoriaController');
    Route::resource('localizacao', 'LocalizacaoController');
    */
});

Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){

    Route::get('/', 'HomeController@index')->name('home');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/retalho/get', 'RetalhoController@getDataTables')->name('retalho.get');
        Route::resource('retalho', 'RetalhoController');
    });

    Route::namespace('Auth')->group(function(){

        //Login Routes
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login');
        Route::post('/logout','LoginController@logout')->name('logout');

        //Forgot Password Routes
        Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');

        //Reset Password Routes
        Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');

    });
});
