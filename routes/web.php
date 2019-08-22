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


Route::prefix('/simples')->group(function(){
    Route::get('/','PaginacaoSimplesController@lista')->name('paginacao.simples');
});

Route::prefix('datatable/ajax')->group(function(){
    Route::get('/','DataTableController@lista')->name('paginacao.datatable.ajax');
});

Route::prefix('paginate/table')->group(function(){
    Route::get('/','PaginateController@lista')->name('paginacao.table.ajax');
});


Route::prefix('datatable/vue')->group(function(){
    Route::get('/','DataTableVueController@lista')->name('datatable.vue');
    Route::get('/ajax','DataTableVueController@ajax')->name('datatable.vue.ajax');
});

Route::get('/','HomeController@index')->name('index');
