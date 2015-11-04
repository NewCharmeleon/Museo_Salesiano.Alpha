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

Route::get('/alta', function () {
    return view('alta');
});
Route::get('personas/{id}/editar', function () {
    return view('editar');
});
//Route::post('personas.nuevo', 'PersonaController@nuevo');


Route::post('/personas/nuevo', 'PersonaController@nuevo');
Route::post('/clientes/nuevo', 'ClienteController@nuevo');
Route::post('/piezas/nuevo', 'PiezaController@nuevo');
//editar
Route::patch('/personas/{id}', 'PersonaController@update');
Route::patch('/clientes/{id}/editar', 'ClienteController@editar');
Route::patch('/piezas/{id}/editar', 'PiezaController@editar');




//Borrar
Route::post('/personas/{id}/borrar', 'PersonaController@borrar');
Route::post('/clientes/{id}/borrar', 'ClienteController@borrar');
Route::post('/piezas/{id}/borrar', 'PiezaController@borrar');
//Route::resources('/personas','PersonaController');
    

