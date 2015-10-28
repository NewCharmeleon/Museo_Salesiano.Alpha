<?php

namespace App\Http\Controllers;

//Agrego la referencia al modelo
use App\Persona;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
                      orderBy('nombre')->get();
            }else{
                $resultado = Persona::where('nombre','like', "%$nombre%")
                        ->orderBy('nombre')->get();
            }
            return view('personas', ["personas" => $resultado]);
    }      
    public function nuevo(Request $request)
    {
        //recibir los datos del request
        //instanciar una nueva persona
        //guardar en la base
        
        $nombre = $request ->input("nombre");
        $cuit   = $request ->input("cuit_cuil");
        $telefono      = $request ->input("telefono");
        $domicilio      = $request ->input("domicilio");
        $email      = $request ->input("email");
        $fechaCarga      = $request ->input("fecha_carga_persona");
                
        
        $reglas = [
            'nombre' => 'required|regex:[a-zA-Záéíóúñ\s]|min:3|max:30',
            'cuit' => 'required|regex:[0-9]|min:9|max:13',
            'telefono' => 'required|numeric|min:6|max:15',
			'domicilio' => 'required|regex:[0-9a-zA-Záéíóúñ\s]|min:6|max:50',
            'email' => 'required|email|min:6',
            'fechaCarga' => 'required|date|min:9|before:yesterday'


            ];
            //validamos...
             /*if ($validate->fails()) {
            return Redirect::to('personas/nuevo')
                ->withErrors($validate)
                ->withInput(Input::except('password'));
            } else {*/
                   $this->validate($request, $reglas);
                    $personas = new Persona;
                    $personas ->nombre = $nombre;
                    $personas ->cuit_cuil = $cuit;
                    $personas ->telefono = $telefono;
        			$personas ->domicilio = $domicilio;
                    $personas ->email = $email;
                    $personas ->fecha_carga_persona = $fechaCarga;
           // }
            
            
            
            
            $personas ->save();
            //return view ('personasnuevo');
            return redirect('personasnuevo');
              
    }      
    public function borrar($id){
        //recupero el registro por id de la base primweo ,lo borro
        //redirijo
        $personas = Persona::findOrFail($id);
        
        $personas->delete();
        
        return redirect('personas');
        
                
    }
            
            

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function update(Request $request, $id)
    {
        //
    }

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
