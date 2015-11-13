<?php

namespace App\Http\Controllers;
use App\Fondo;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FondoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fondos ($descripcion = null)
    {
        //$personas=Persona::all();
        //metodo 1:
        //$resultado = DB::select ('SELECT * FROM operaciones WHERE banco',['ape'=> "%$apellido%"]);
        
        //metodo 2: laravel query builder
        //$resultado = DB::table('cliente')
        //              ->where('apellido','like', "%$apellido%")
        //              ->orderBy('apellido')->get();
        //metodo 3: modelos (eloquent orm)
            if ($descripcion=='todos'){
                $resultado = Fondo::
                      orderBy('descripcion')->get();
            }else{
                $resultado = Fondo::where('descripcion','like', "%$descripcion%")
                        ->orderBy('descripcion')->get();
            }
            return view('fondos', ["fondos" => $resultado]);
    }      
    public function nuevo(Request $request)
    {
        //recibir los datos del request
        //instanciar una nueva persona
        //guardar en la base
        
        $personas_id = $request ->input("personas_id");
        $nombre_usuario   = $request ->input("nombreclasificacion");
        $password      = $request ->input("password");
        
        
        
        $reglas = [
            'personas_id' => 'required|numeric|min:3|max:100',
            'nombre_usuario' => 'required|numeric|min:3|max:30',
            'password' => 'required|min:8|max:50',
                     


            ];
            //validamos...
            $this->validate($request, $reglas);
            $usuarios = new Usuario;
            $usuarios ->personas_id = $personas_id;
            $usuarios ->nombre_usuario = $nombre_usuario;
            $usuarios ->password = $password;
            
            
            
            
            
            
            
            $usuarios ->save();
            
            return redirect('usuarios');
              
    }      
    public function borrar($id){
        //recupero el registro por id de la base primweo ,lo borro
        //redirijo
        $usuarios = Usuario::findOrFail($id);
        
        $usuarios->delete();
        
        return redirect('usuarios');
        
                
    }
    public function editar($id){
        //recupero el registro por id de la base primweo ,lo borro
        //redirijo
        $usuarios = Usuario::findOrFail($id);
        
        //$personas->delete();
        
        return view('editarUsuario', ['usuarios' => $usuarios]);
        //return view('editar', compact('personas'));
                
    }
    
    public function update($id, Request $request)
{
   
   //Session::flash('flash_message', 'Persona Actualizada satisfactoriamente');
    $usuarios=Usuario::findOrFail($id);
    $input = $request->all();
    $usuarios->fill($input)->save();
   return redirect('usuarios')->with('key', 'You have done successfully');
    //return redirect('personas');
}       


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}