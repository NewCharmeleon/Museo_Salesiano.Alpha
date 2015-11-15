<?php

namespace App\Http\Controllers;
use App\Donacion;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DonacionController extends Controller
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
    public function donaciones ($descripcion = null)
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
                $resultado = Donacion::
                      orderBy('descripcion')->get();
            }else{
                $resultado = Donacion::where('id','like', "%$descripcion%")
                        ->orderBy('id')->get();
            }
            return view('donaciones', ["donaciones" => $resultado]);
    }      
    public function nuevo(Request $request)
    {
        //recibimos los datos del request
        
        $donantes_id = $request ->input("donantes_id");
        $piezas_id  = $request ->input("piezas_id");
         
        
        
             //realizacion de la validacion con las reglas estaticas del modelo 
            $this->validate($request, $reglas);
            //instanciamos un nuevo usuario
            $donaciones = new Donacion;
             //vinculamos los datos recibidos al modelo
            $donaciones ->donantes_id = $donantes_id;
            $donaciones ->piezas_id = $piezas_id;
            //guardamos en la base de datos los datos recibidos
            $donaciones ->save();
            
            return redirect('donaciones');
    }      
    public function borrar($id){
        //recupero el registro por id de la base primweo ,lo borro
        //redirijo
        $donaciones = Donacion::findOrFail($id);
        
        $donaciones->delete();
        
        return redirect('donaciones');
        
                
    }
    public function editar($id){
        //recupero el registro por id de la base primweo ,lo borro
        //redirijo
        $donaciones = Donacion::findOrFail($id);
        
        
        
        return view('editarDonacion', ['donaciones' => $donaciones]);
        
                
    }
    
    public function update($id, Request $request)
{
   
   //Session::flash('flash_message', 'Persona Actualizada satisfactoriamente');
    $donaciones=Donacion::findOrFail($id);
    $input = $request->all();
    $donaciones->fill($input)->save();
   return redirect('donaciones')->with('key', 'You have done successfully');
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