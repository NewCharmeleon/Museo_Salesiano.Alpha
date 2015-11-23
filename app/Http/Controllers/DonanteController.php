<?php

namespace App\Http\Controllers;
use App\Donante;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DonanteController extends Controller
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
    public function donantes ($descripcion = null)
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
                $resultado = Donante::
                      orderBy('descripcion')->get();
            }else{
                $resultado = Donante::where('id','like', "%$descripcion%")
                        ->orderBy('id')->get();
            }
            return view('donantes', ["donantes" => $resultado]);
    }      
    public function nuevo(Request $request)
    {
       //recibimos los datos del request
        
        $personas_id = $request ->input("personas_id");
           
        
        
             //realizacion de la validacion con las reglas estaticas del modelo 
            $this->validate($request, $reglas);
            //instanciamos un nuevo usuario
            $donantes = new Donante;
             //vinculamos los datos recibidos al modelo
            $donantes ->personas_id = $personas_id;
            
            //guardamos en la base de datos los datos recibidos
            $donantes ->save();
            
            return redirect('donantes');
    }      
    public function borrar($id){
        //recupero el registro por id de la base primweo ,lo borro
        //redirijo
        $donantes = Donante::findOrFail($id);
        
        $donantes->delete();
        
        return redirect('donantes');
        
                
    }
    public function editar($id){
        //recupero el registro por id de la base primweo ,lo borro
        //redirijo
        $donantes = Donante::findOrFail($id);
        
        
        
        return view('editarDonante', ['donantes' => $donantes]);
        
                
    }
    
    public function update($id, Request $request)
{
   
   //Session::flash('flash_message', 'Persona Actualizada satisfactoriamente');
    $donantes=Donante::findOrFail($id);
    $input = $request->all();
    $this->validate($input, Donante::$reglas);///esto no anda
    $donantes->fill($input)->save();
   return redirect('donantes')->with('key', 'You have done successfully');
    
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