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

     Route::get('mailsee', function () {
    //echo "la direccion show";
     return view('emails/bienvenido');
    });


    Route::get('index', function () {
        return view('welcome');
    });
    
    Route::resource('users','UsuarioController');
    

    ////PAQUETES
    Route::get('packages/view', [
        'middleware' => 'auth',
        'uses' => 'PaquetesController@view',
        'as' => 'packages.view'
    ]);

    /////FIN PAQUETES

   Route::post('users/authenticate',    [
        'uses' => 'UsuarioController@authenticate',
        'as' => 'users.authenticate'
    ]);

 
    Route::auth();
    Route::get('/home', 'HomeController@index');
        //Route::resource('users','UsuarioController');
    
    ///PAGOS - CONEKTA
        Route::get('pays/pagos', [
        'uses' => 'PagosController@view',
        'as' => 'pays.pagos'
    ]);


    ///PAGOS - EVENTO
    Route::post('pays/payment', [
        'uses' => 'PagosController@payment',
        'as' => 'pays.payment'
    ]);


////DIRECCIONES
    Route::get('addresses/create', [
        'middleware' => 'auth',
        'uses' => 'DireccionesController@create',
        'as' => 'addresses.view'
    ]);

});




