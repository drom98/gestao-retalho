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

Route::get('/retalho/usar/get/{id}', 'RetalhoController@getRetalhoById')->name('usar.get');

Auth::routes(['register' => false]);

Route::middleware('auth:web')->group(function () {

    Route::get('/retalho/getRetalho', 'RetalhoController@getRetalho')->name('retalho.get');
    Route::resource('retalho', 'RetalhoController');

    Route::resource('usado', 'RetalhoUsadoController');

});

Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){

    Route::get('/', 'HomeController@index')->name('home');

    Route::middleware('auth:admin')->group(function () {

        Route::get('/retalho/get', 'RetalhoController@getDataTables')->name('retalho.get');
        Route::get('/retalho/usar/get/{id}', 'RetalhoController@getRetalho')->name('usar.get');

        Route::get('/retalho/DTeliminado', 'RetalhoController@getDTEliminado')->name('retalho.DTeliminado');
        Route::get('/retalho/eliminado', 'RetalhoController@getViewEliminado')->name('retalho.eliminado');
        Route::get('/retalho/eliminado/restore', 'RetalhoController@getViewEliminado')->name('retalho.eliminado');
        Route::get('/retalho/eliminado/{id}', 'RetalhoController@deletePerma')->name('retalho.eliminado.deletePerma');
        Route::get('/retalho/eliminado/restore/{id}', 'RetalhoController@restore')->name('retalho.eliminado.restore');

        Route::resource('retalho', 'RetalhoController');

        Route::get('/usado/getUsado', 'RetalhoUsadoController@getUsado')->name('usado.get');
        Route::resource('usado', 'RetalhoUsadoController');

        Route::get('/tiposVidro/get', 'TipoVidroController@getDataTables')->name('tipoVidro.get');
        Route::resource('tipoVidro', 'TipoVidroController');

        Route::get('/categoria/get', 'CategoriaController@getDataTables')->name('categoria.get');
        Route::resource('categoria', 'CategoriaController');

        Route::get('/localizacao/get', 'LocalizacaoController@getDataTables')->name('localizacao.get');
        Route::resource('localizacao', 'LocalizacaoController');

        Route::get('/operario/get', 'OperarioController@getDataTables')->name('operario.get');
        Route::resource('operario', 'OperarioController');

        Route::get('/administrador/get', 'AdminController@getDataTables')->name('administrador.get');
        Route::resource('administrador', 'AdminController');
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
