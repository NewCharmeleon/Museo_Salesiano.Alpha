<?php

namespace App\Http\Controllers;

//Agrego la referencia al modelo
use App\Persona;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

//use Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       //$personas=Persona::all();
       
       // return view('personas.index', compact('personas'));
                
    }
    public function personas ($nombre = null)
    {
        //$personas=Persona::all();
        //metodo 1:
        //$resultado = DB::select ('SELECT * FROM operaciones WHERE banco',['ape'=> "%$apellido%"]);
        
        //metodo 2: laravel query builder
        //$resultado = DB::table('cliente')
        //              ->where('apellido','like', "%$apellido%")
        //              ->orderBy('apellido')->get();
        //metodo 3: modelos (eloquent orm)
            if ($nombre=='todos'){
                $resultado = Persona::
                      orderBy('id')->get();
            }else{
                $resultado = Persona::where('nombre','like', "%$nombre%")
                        ->orderBy('id')->get();
            }
            return view('personas', ["personas" => $resultado]);
    }      
    public function nuevo(Request $request)
    {
        //recibir los datos del request
        //instanciar una nueva persona
        //guardar en la base
        //dd(daf);
        $nombre = $request ->input("nombre");
        $cuit   = $request ->input("cuit_cuil");
        $telefono      = $request ->input("telefono");
        $domicilio      = $request ->input("domicilio");
        $email      = $request ->input("email");
       // $fechaCarga      = $request ->input("fecha_carga");
                
        
        $reglas = [
            'nombre' => 'required|min:3|max:30',
            'cuit_cuil' => 'required|numeric|digits_between:9,13',
            'telefono' => 'required|numeric|min:6|digits_between:7,25',
			'domicilio' => 'required|min:6|max:50',
            'email' => 'required|unique:personas,email|email|min:6',
            //'fecha_carga' => 'required|date|min:9|before:yesterday'


            ];
            //validamos...
             /*if ($validate->fails()) {
            return Redirect::to('nueva')
                ->withErrors($validate)
                ->withInput(Input::except('password'));
            } else {*/
                   $this->validate($request, $reglas);
                    $personas = new Persona;
                    //$personas ->id = null;
                    $personas->nombre = $nombre;
                    $personas->cuit_cuil = $cuit;
                    $personas->telefono = $telefono;
        			$personas->domicilio = $domicilio;
                    $personas->email = $email;
                    //$personas->fecha_carga_persona = 'now';
            //}
                 
            $personas ->save();
            //return view ('personasnuevo');
            return redirect('personas');
              
    }      
    public function borrar($id){
        //recupero el registro por id de la base primweo ,lo borro
        //redirijo
        $personas = Persona::findOrFail($id);
        
        $personas->delete();
        
        return redirect('personas');
        
                
    }
    public function editar($id){
        //recupero el registro por id de la base primweo ,lo borro
        //redirijo
        $personas = Persona::findOrFail($id);
        
        //$personas->delete();
        
        return view('editar', ['personas' => $personas]);
        //return view('editar', compact('personas'));
                
    }
    
    public function update($id, Request $request)
{
   //protected $request;
  $personas=Persona::findOrFail($id);
   //$personas=fill(Request::all());
 // $personasUpdate=$request->all();
   //dd('personas');
   //$personas->update($personasUpdate);
  // $personadatos = Input::all();
   //$personas = Persona::find($id);
   //$personas->update($personasdatos);
   //$personas->save();
   //Session::flash('flash_message', 'Persona Actualizada satisfactoriamente');
   
    $input = $request->all();
    $personas->fill($input)->save();
   return redirect()->back()->with('key', 'You have done successfully');
    //return redirect('personas');
}       
            

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // // Creamos un nuevo objeto User para ser usado por el helper Form::model
        $persona = new Persona;
      return View::make('personas/form')->with('persona', $persona);
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
   /* public function update(Request $request, $id)
    {
        //
    }*/

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
