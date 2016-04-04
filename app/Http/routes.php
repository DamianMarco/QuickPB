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






/*


Route::get('logout', [ 'uses' => 'Auth\AuthController@getLogout', 'as' => 'logout' ]);
*/
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
   
    Route::get('/', function () {
    //echo "la direccion show";
     return view('welcome');
    });


    Route::get('index', function () {
        return view('welcome');
    });
    
    Route::resource('users','UsuarioController');


   Route::post('users/authenticate',    [
        'uses' => 'UsuarioController@authenticate',
        'as' => 'users.authenticate'
    ]);

 
Route::auth();

Route::get('/home', 'HomeController@index');
    //Route::resource('users','UsuarioController');

});




