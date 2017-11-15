<?php
use App\Restaurant;
use App\Http\Resources\Restaurants;
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
Route::get('/onmenjar/mod', 'onMenjarController@onMenjarmod')->name('onMenjarmod');
Route::get('/restaurant', 'proveidorRestaurantController@proveidor')->name('proveidorRestaurantController@proveidor');
Route::get('/restaurant/item/{item}', 'proveidorRestaurantController@proveidorItem')->name('proveidorRestaurantController@proveidorItem');
