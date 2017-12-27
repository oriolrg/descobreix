<?php
use App\Restaurant;
use App\Http\Resources\Restaurants;
use App\Http\Controllers\EstadistiquesController;
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
Route::get('error', function () {
    abort(503);
});

Route::get('/', function () {
    return view('welcome');
});
/*Route::get('/restaurant/{lat}', function () {
    return new Restaurants(Restaurant::all());
});*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/onmenjar', 'onMenjarController@index')->name('index');
Route::get('/onmenjar/add', 'onMenjarController@onMenjaradd')->name('onMenjaradd');
//Route::get('/onmenjar/post', 'onMenjarController@onMenjarpost')->name('onMenjarpost');
Route::post('/onmenjar/post', 'onMenjarController@onMenjarpost')->name('onMenjarpost');
Route::get('/onmenjar/dell', 'onMenjarController@onMenjardell')->name('onMenjardell');
Route::post('/onmenjar/mod', 'onMenjarController@onMenjarmod')->name('onMenjarmod');
Route::post('/onmenjar/mod/post', 'onMenjarController@onMenjarmodpost')->name('onMenjarmodpost');
Route::get('/onmenjar/estadistiquesRes', 'EstadistiquesController@reset')->name('reset');
//desactivar restaurant
Route::get('/onmenjar/desac/{item}', 'onMenjarController@desactivarRestaurant')->name('desactivarRestaurant');
Route::get('/onmenjar/act/{item}', 'onMenjarController@activarRestaurant')->name('activarRestaurant');
Route::get('/onmenjar/eliminar/{item}', 'onMenjarController@borrarRestaurant')->name('borrarRestaurant');
//borrar restaurant
Route::get('/onmenjar/borrar/{item}', 'onMenjarController@borrarRestaurant')->name('borrarRestaurant');
Route::get('/restaurant', 'proveidorRestaurantController@proveidor')->name('proveidorRestaurantController@proveidor');
Route::get('/restaurant/diahora/{dia}/{hora}', 'proveidorRestaurantController@proveidorDiaHora')->name('proveidorRestaurantController@proveidorDiaHora');
Route::get('/restaurant/hora/{hora}', 'proveidorRestaurantController@proveidorHora')->name('proveidorRestaurantController@proveidorHora');
Route::get('/restaurant/dia/{dia}', 'proveidorRestaurantController@proveidorDia')->name('proveidorRestaurantController@proveidorDia');
Route::get('/restaurant/item/{item}', 'proveidorRestaurantController@proveidorItem')->name('proveidorRestaurantController@proveidorItem');
