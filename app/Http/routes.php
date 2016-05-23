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

    Route::get('/us', function () {
     return view('us');
    });

    Route::get('/services', function () {
     return view('services');
    });

    Route::get('/contact', function () {
     return view('contact');
    });

    Route::get('/termofuse', function () {
     return view('termofuse');
    });

    Route::get('/sends', function () {
     return view('sends');
    });

    Route::get('/location', function () {
     return view('location');
    });

    Route::get('/faq', function () {
     return view('faq');
    });    

    Route::get('/informationprotection', function () {
     return view('informationprotection');
    });

    Route::post('contact/send', [
        'uses' => 'ContactoController@emailTo',
        'as' => 'contact.send'
    ]);

     Route::get('mailsee', function () {
    //echo "la direccion show";
     return view('emails/bienvenido');
    });

    Route::get('index', function () {
        return view('welcome');
    });

    Route::get('users/userlist', [     
        'middleware' => 'auth',   
        'uses' => 'UsuarioController@userList',
        'as' => 'users.userlist'
    ]);

    Route::post('users/changeActive', [
        'middleware' => 'cors',
        'uses' => 'UsuarioController@changeActive',
        'as' => 'users.changeActive'
    ]);
    
    Route::post('users/changeTypeUser', [
        'middleware' => 'cors',
        'uses' => 'UsuarioController@changeTypeUser',
        'as' => 'users.changeTypeUser'
    ]);
    Route::get('users/view', [     
        'middleware' => 'auth',   
        'uses' => 'UsuarioController@view',
        'as' => 'users.view'
    ]);

    Route::get('users/view', [     
        'middleware' => 'auth',   
        'uses' => 'UsuarioController@view',
        'as' => 'users.view'
    ]);
    
    Route::resource('users','UsuarioController');


    ////PAQUETES

    Route::get('packages/list', [     
        'middleware' => 'auth',   
        'uses' => 'PaquetesController@apiList',
        'as' => 'packages.list'
    ]);

    Route::get('packages/view', [     
        'middleware' => 'auth',   
        'uses' => 'PaquetesController@view',
        'as' => 'packages.view'
    ]);
    
    Route::get('packages/packagesview', [
        'uses' => 'PaquetesController@packagesview',
        'as' => 'packages.packagesview'
    ]);


    Route::post('packages/storeimage', [
        'middleware' => 'cors',
        'uses' => 'PaquetesController@storeimage',
        'as' => 'packages.storeimage'
    ]);
/*
    Route::get('packages/storeimage', function() {
      return View::make('admin.packages.packagesview');
    });*/

    Route::post('test',['middleware' => 'cors'], function()
    {
        return 'Success! ajax in laravel 5';
    });

    Route::get('packages/create', [
        'uses' => 'PaquetesController@create',
        'as' => 'packages.create'
    ]);

    Route::post('packages/store', [        
        'uses' => 'PaquetesController@store',
        'as' => 'packages.store'
    ]);

    Route::get('packages/edit/{id}', [        
        'uses' => 'PaquetesController@edit',
        'as' => 'packages.edit'
    ]);

    Route::get('packages/take/{usuario_id}/{nombreUsuario}', [        
        'uses' => 'PaquetesController@take',
        'as' => 'packages.take'
    ]);

    Route::post('packages/update', [        
        'uses' => 'PaquetesController@update',
        'as' => 'packages.update'
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
   
    Route::post('pays/madepayment', [
        'uses' => 'PagosController@madepayment',
        'as' => 'pays.realizapago'
    ]);

    ///PAGOS - EVENTO
    Route::post('pays/payment', [
        'uses' => 'PagosController@payment',
        'as' => 'pays.payment'
    ]);


////DIRECCIONES
    Route::get('addresses/create', [
        'uses' => 'DireccionesController@create',
        'as' => 'addresses.view'
    ]);

    Route::post('addresses/store', [        
        'uses' => 'DireccionesController@store',
        'as' => 'addresses.store'
    ]);

});




