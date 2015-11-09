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

Route::get('/altaPersona', function () {
    return view('altaPersona');
});
Route::get('/altaPieza', function () {
    return view('altaPieza');
});

Route::get('/personas/{id}/editarPersona', 'PersonaController@editar');
Route::patch('/personas/editarPersona/{id}', 'PersonaController@update');
//Route::post('personas.nuevo', 'PersonaController@nuevo');
Route::get('/piezas/{id}/editarPieza', 'PiezaController@editar');
Route::patch('/piezas/editarPieza/{id}', 'PiezaController@update');


Route::post('/personas/nuevo', 'PersonaController@nuevo');
Route::post('/clientes/nuevo', 'ClienteController@nuevo');
Route::post('/piezas/nuevo', 'PiezaController@nuevo');
//editar

Route::patch('/clientes/{id}/editarPersona', 'ClienteController@editar');
//Route::patch('/piezas/{id}/editarPieza', 'PiezaController@editar');




//Borrar
Route::post('/personas/{id}/borrar', 'PersonaController@borrar');
Route::post('/clientes/{id}/borrar', 'ClienteController@borrar');
Route::post('/piezas/{id}/borrar', 'PiezaController@borrar');
//Route::resources('/personas','PersonaController');
    

