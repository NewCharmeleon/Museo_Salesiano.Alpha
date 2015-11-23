<?php

namespace App\Http\Controllers;
use App\Usuario;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function usuarios ($descripcion = null)
    {
        
            if ($descripcion=='todos'){
                $resultado = Usuario::
                      orderBy('descripcion')->get();
            }else{
                $resultado = Usuario::where('nombre_usuario','like', "%$descripcion%")
                        ->orderBy('nombre_usuario')->get();
            }
            return view('usuarios', ["usuarios" => $resultado]);
    }   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function nuevo(Request $request)
    {
        //recibimos los datos del request
        
        $personas_id = $request ->input("personas_id");
        $nombre_usuario   = $request ->input("nombreclasificacion");
        $password      = $request ->input("password");
        $perfil_usuario  = $request ->input("perfil_usuario");
        
        
        
        
             //realizacion de la validacion con las reglas estaticas del modelo 
            $this->validate($request, $reglas);
            //instanciamos un nuevo usuario
            $usuarios = new Usuario;
             //vinculamos los datos recibidos al modelo
            $usuarios ->personas_id = $personas_id;
            $usuarios ->nombre_usuario = $nombre_usuario;
            $usuarios ->password = $password;
            $usuarios ->perfil_usuario = $perfil_usuario;
            //guardamos en la base de datos los datos recibidos
            $usuarios ->save();
            
            return redirect('usuarios');
              
    }    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */  
    public function borrar($id){
        //recupero el registro por id de la base primweo ,lo borro
        //redirijo
        $usuarios = Usuario::findOrFail($id);
        
        $usuarios->delete();
        
        return redirect('usuarios');
        
                
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id){
        //recupero el registro por id de la base primweo ,lo borro
        //redirijo
        $usuarios = Usuario::findOrFail($id);
        
        //$personas->delete();
        
        return view('editarUsuario', ['usuarios' => $usuarios]);
        //return view('editar', compact('personas'));
                
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
       
       //Session::flash('flash_message', 'Persona Actualizada satisfactoriamente');
        $usuarios=Usuario::findOrFail($id);
        $input = $request->all();
        $this->validate($input, Usuario::$reglas);///esto no anda
        $usuarios->fill($input)->save();
       return redirect('usuarios')->with('key', 'You have done successfully');
        //return redirect('personas');
    }       

    public function destroy($id)
    {
        //
    }
}