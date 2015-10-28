<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('bienvenido');
});
//faltan rutas
/*Route::get('/{nombre}', function($nombre){
    return $nombre;
    
    
});*/
/*Route::get('/{nombre}/{apellido}', function($nombre,$apellido){
    return "Hola Soy $nombre $apellido";
    
    
});*/
//Ver 

Route::get('/personas', 'PersonaController@personas');
Route::get('/clientes', 'ClienteController@cliente');
Route::get('/piezas', 'PiezaController@piezas');

//Route::get('/personas/{apellido}', 'PersonaController@personas');
//Insertar

//Route::get('/personas/nuevo', 'PersonaController@nuevo';


Route::get('/personas/nuevo', [
    'as' => 'nuevo', 'uses' => 'PersonaController@nuevo'
]);
Route::get('/clientes/nuevo', 'ClienteController@nuevo');
Route::get('/piezas/nuevo', 'PiezaController@nuevo');
//Borrar
Route::get('/personas/{id}/borrar', 'PersonaController@borrar');
Route::get('/clientes/{id}/borrar', 'ClienteController@borrar');
Route::get('/piezas/{id}/borrar', 'PiezaController@borrar');
//Route::resources('/personas','PersonaController');
    

