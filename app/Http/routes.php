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
//Rutas para ver las paginas con los datos cargados de las distintas clases 

Route::get('/personas', 'PersonaController@personas');
//Route::get('/clientes', 'ClienteController@cliente');
Route::get('/piezas', 'PiezaController@piezas');
Route::get('/usuarios', 'UsuarioController@usuarios');
Route::get('/clasificaciones', 'ClasificacionController@clasificaciones');
Route::get('/revisiones', 'RevisionController@revisiones');
Route::get('/fotos', 'FotoController@fotos');
Route::get('/fondos', 'FondoController@fondos');
Route::get('/donaciones', 'DonacionController@donaciones');
Route::get('/donantes', 'DonanteController@donantes');




//Route::get('/personas/{apellido}', 'PersonaController@personas');

//Rutas para ver los formularios para insertar datos en las distintas clases

Route::get('/altaPersona', function () {
    return view('altaPersona');
});

Route::get('/altaPieza', function () {
  //  $dato= Clasificaciones::all(array("id"));
    return view('altaPieza');//->with('dato',$dato);
});

Route::get('/altaUsuario', function () {
    return view('altaUsuario');
});

Route::get('/altaClasificacion', function () {
    return view('altaClasificacion');
});

Route::get('/altaRevision', function () {
    return view('altaRevision');
});
Route::get('/altaFoto', function () {
    return view('altaFoto');
});

Route::get('/altaFondo', function () {
    return view('altaFondo');
});

Route::get('/altaDonacion', function () {
    return view('altaDonacion');
});

Route::get('/altaDonante', function () {
    return view('altaDonante');
});

//Rutas para editar los datos de las distintas clases y grabarlos en las mismas
Route::get('/personas/{id}/editarPersona', 'PersonaController@editar');
Route::patch('/personas/editarPersona/{id}', 'PersonaController@update');

Route::get('/piezas/{id}/editarPieza', 'PiezaController@editar');
Route::patch('/piezas/editarPieza/{id}', 'PiezaController@update');

Route::get('/usuarios/{id}/editarUsuario', 'UsuarioController@editar');
Route::patch('/usuarios/editarUsuario/{id}', 'UsuarioController@update');

Route::get('/clasificaciones/{id}/editarClasificacion', 'ClasificacionController@editar');
Route::patch('/clasificaciones/editarClasificacion/{id}', 'ClasificacionController@update');

Route::get('/revisiones/{id}/editarRevision', 'RevisionController@editar');
Route::patch('/revisiones/editarRevision/{id}', 'RevisionController@update');

Route::get('/fotos/{id}/editarFoto', 'FotoController@editar');
Route::patch('/fotos/editarFoto/{id}', 'FotoController@update');

Route::get('/fondos/{id}/editarFondo', 'FondoController@editar');
Route::patch('/fondos/editarFondo/{id}', 'FondoController@update');

Route::get('/donaciones/{id}/editarDonacion', 'DonacionController@editar');
Route::patch('/donaciones/editarDonacion/{id}', 'DonacionController@update');

Route::get('/donantes/{id}/editarDonante', 'DonanteController@editar');
Route::patch('/donantes/editarDonante/{id}', 'DonanteController@update');


//Rutas para ingresar los datos a las tablas de las distintas clases

Route::post('/personas/nuevo', 'PersonaController@nuevo');
//Route::post('/clientes/nuevo', 'ClienteController@nuevo');
Route::post('/piezas/nuevo', 'PiezaController@nuevo');
Route::post('/usuarios/nuevo', 'UsuarioController@nuevo');
Route::post('/clasificaciones/nuevo', 'ClasificacionController@nuevo');
Route::post('/revisiones/nuevo', 'RevisionController@nuevo');
Route::post('/fotos/nuevo', 'FotoController@nuevo');
Route::post('/fondos/nuevo', 'FondoPersonaController@nuevo');
Route::post('/donaciones/nuevo', 'DonacionController@nuevo');
Route::post('/donantes/nuevo', 'DonanteController@nuevo');


//Rutas para Borrar entidades de las tablas de las clases

Route::post('/personas/{id}/borrar', 'PersonaController@borrar');
//Route::post('/clientes/{id}/borrar', 'ClienteController@borrar');
Route::post('/piezas/{id}/borrar', 'PiezaController@borrar');
Route::post('/usuarios/{id}/borrar', 'UsuarioController@borrar');
Route::post('/clasificaciones/{id}/borrar', 'ClasificacionController@borrar');
Route::post('/revisiones/{id}/borrar', 'RevisionController@borrar');
Route::post('/fotos/{id}/borrar', 'FotoController@borrar');
Route::post('/fondos/{id}/borrar', 'FondoController@borrar');
Route::post('/donaciones/{id}/borrar', 'DonacionController@borrar');
Route::post('/donantes/{id}/borrar', 'DonanteClienteController@borrar');


//------------------------------------------------------------///////
//Route::resources('/personas','PersonaController');
    

