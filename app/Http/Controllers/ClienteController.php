<?php

namespace App\Http\Controllers;

//Agrego la referencia al modelo
use App\Cliente;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
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
    public function cliente ($apellido = null)
    {
        //$personas=Persona::all();
        //metodo 1:
        //$resultado = DB::select ('SELECT * FROM operaciones WHERE banco',['ape'=> "%$apellido%"]);
        
        //metodo 2: laravel query builder
        //$resultado = DB::table('cliente')
        //              ->where('apellido','like', "%$apellido%")
        //              ->orderBy('apellido')->get();
        //metodo 3: modelos (eloquent orm)
            if ($apellido=='todos'){
                $resultado = Cliente::
                      orderBy('apellido')->get();
            }else{
                $resultado = Cliente::where('apellido','like', "%$apellido%")
                        ->orderBy('apellido')->get();
            }
            return view('personas', ["personas" => $resultado]);
    }      
    public function nuevo(Request $request)
    {
        //recibir los datos del request
        //instanciar una nueva persona
        //guardar en la base
        
        $apellido = $request ->input("apellido");
        $nombre   = $request ->input("nombre");
        $documento      = $request ->input("documento");
        /*$sexo      = $request ->input("sexo");
        $nacionalidad      = $request ->input("nacionalidad");
        $archivosExt      = $request ->input("archivos_externos");
        $fechaExp      = $request ->input("fecha_expedicion");
        $fechaVenc      = $request ->input("fecha_vencimiento");
        $domicilio      = $request ->input("domicilio");
        $ciudad      = $request ->input("ciudad");
        $departamento      = $request ->input("departamento");
        $provincia      = $request ->input("provincia");
        $fechaNac      = $request ->input("fecha_nacimiento");
        $ugarNac      = $request ->input("lugar_nacimiento");*/
        
        
        $reglas = [
            'apellido' => 'required|min:3|max:50',
            'nombre' => 'required|min:3|max:50',
            'documento' => 'required|min:8|max:99999999'
            ];
            //validamos...
            $this->validate($request, $reglas);
            $clientes = new Cliente;
            $clientes ->apellido = $apellido;
            $clientes ->nombre = $nombre;
            $clientes ->documento = $documento;
            
            
            
            
            
            $clientes ->save();
            
            return redirect('clientes');
              
    }      
    public function borrar($id){
        //recupero el registro por id de la base primweo ,lo borro
        //redirijo
        $personas = Persona::findOrFail($id);
        
        $personas->delete();
        
        return redirect('clientes');
        
                
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
