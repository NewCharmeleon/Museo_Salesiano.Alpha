<?php

namespace App\Http\Controllers;
use App\Pieza;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PiezaController extends Controller
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
    public function piezas ($descripcion = null)
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
                $resultado = Pieza::
                      orderBy('descripcion')->get();
            }else{
                $resultado = Pieza::where('descripcion','like', "%$descripcion%")
                        ->orderBy('descripcion')->get();
            }
            return view('piezas', ["piezas" => $resultado]);
    }      
    public function nuevo(Request $request)
    {
       
        //recibimos los datos del request
               
        $descripcion = $request ->input("descripcion");
        $clasificacion   = $request ->input("clasificaciones_id");
        $procedencia      = $request ->input("procedencia");
        $autor     = $request ->input("autor");
        $tema      = $request ->input("tema");
        $observacion      = $request ->input("observacion");
        
          
       
            //realizacion de la validacion con las reglas estaticas del modelo
            $this->validate($request, Pieza::$reglas);
            //instanciamos una nueva pieza
            $piezas = new Pieza;
            //vinculamos los datos recibidos al modelo
            $piezas ->descripcion = $descripcion;
            $piezas ->clasificaciones_id = $clasificacion;
            $piezas ->procedencia = $procedencia;
            $piezas ->autor = $autor;
            $piezas ->tema = $tema;
            $piezas ->observacion = $observacion;
            
            //guardamos en la base de datos los datos recibidos            
            $piezas ->save();
            
            return redirect('piezas');
              
    }      
    public function borrar($id){
        //recupero el registro por id de la base primweo ,lo borro
        //redirijo
        $piezas = Pieza::findOrFail($id);
        
        $piezas->delete();
        
        return redirect('piezas');
        
                
    }
    public function editar($id){
        //recupero el registro por id de la base primweo ,lo borro
        //redirijo
        $piezas = Pieza::findOrFail($id);
        
        //$personas->delete();
        
        return view('editarPieza', ['piezas' => $piezas]);
        //return view('editar', compact('personas'));
                
    }
    
    public function update($id, Request $request)
{
   
   //Session::flash('flash_message', 'Persona Actualizada satisfactoriamente');
    $piezas=Pieza::findOrFail($id);

    $input = $request->all();
    $this->validate($input, Pieza::$reglas);///esto no anda
    $piezas->fill($input)->save();
   return redirect('piezas')->with('key', 'You have done successfully');
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
