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
       //recibimos los datos del request
        
        $descripcion = $request ->input("descripcion");
        $usuarios_id  = $request ->input("usuarios_id");
         
        
        
             //realizacion de la validacion con las reglas estaticas del modelo 
            $this->validate($request, $reglas);
            //instanciamos un nuevo usuario
            $fondos = new Fondo;
             //vinculamos los datos recibidos al modelo
            $fondos ->descripcion = $descripcion;
            $fondos ->usuarios_id = $usuarios_id;
            //guardamos en la base de datos los datos recibidos
            $fondos ->save();
            
            return redirect('fondos');
              
    }      
    public function borrar($id){
        //recupero el registro por id de la base primweo ,lo borro
        //redirijo
        $fondos = Fondo::findOrFail($id);
        
        $fondos->delete();
        
        return redirect('fondos');
        
                
    }
    public function editar($id){
        //recupero el registro por id de la base primweo ,lo borro
        //redirijo
        $fondos = Fondo::findOrFail($id);
        
        
        
        return view('editarFondo', ['fondos' => $fondos]);
        
                
    }
    
    public function update($id, Request $request)
{
   
   //Session::flash('flash_message', 'Persona Actualizada satisfactoriamente');
    $fondos=Fondo::findOrFail($id);
    $input = $request->all();
    $fondos->fill($input)->save();
   return redirect('fondos')->with('key', 'You have done successfully');
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