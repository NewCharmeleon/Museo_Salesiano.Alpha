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
        //recibimos los datos del request
       
        $nombre = $request ->input("nombre");
        $cuit   = $request ->input("cuit_cuil");
        $telefono      = $request ->input("telefono");
        $domicilio      = $request ->input("domicilio");
        $email      = $request ->input("email");
       
                //realizacion de la validacion con las reglas estaticas del modelo
                   $this->validate($request, $reglas);
                   //instanciamos una nueva persona
                   $personas = new Persona;
                    //vinculamos los datos recibidos al modelo
                    $personas->nombre = $nombre;
                    $personas->cuit_cuil = $cuit;
                    $personas->telefono = $telefono;
        			$personas->domicilio = $domicilio;
                    $personas->email = $email;
                   //guardamos en la base de datos los datos recibidos 
                 
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
        
        return view('editarPersona', ['personas' => $personas]);
        //return view('editar', compact('personas'));
                
    }
    
    public function update($id, Request $request)
{
   
   //Session::flash('flash_message', 'Persona Actualizada satisfactoriamente');
    $personas=Persona::findOrFail($id);
    $input = $request->all();
    $this->validate($input, Persona::$reglas);///esto no anda
    $personas->fill($input)->save();
   return redirect('personas')->with('key', 'You have done successfully');
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
