<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
Rutas de tipo
GET, POST, PUT, DELETE, RESOURCE
*/
Route::get('/', function () {
	//echo "la direccion show";
    return view('welcome');
});

Route::group(['prefix' => 'qpb'], function(){

	Route::get('viewpaquetes/{id}',[
			'uses' => 'PaquetesController@view',
			'as' => 'paquetesView'
		]);
});


Route::get('paquetes/{id?}', function ($id = "naranjas") {
   echo "la direccion show: " . $id;
});




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
