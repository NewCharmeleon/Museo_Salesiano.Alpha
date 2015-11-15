<?php

namespace App\Http\Controllers;
use App\Foto;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FotoController extends Controller
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
    public function fotos ($descripcion = null)
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
                $resultado = Foto::
                      orderBy('descripcion')->get();
            }else{
                $resultado = Foto::where('id','like', "%$descripcion%")
                        ->orderBy('id')->get();
            }
            return view('fotos', ["fotos" => $resultado]);
    }      
    public function nuevo(Request $request)
    {
         //recibimos los datos del request
        
        $piezas_id = $request ->input("piezas_id");
        $fotos_id  = $request ->input("fotos_id");
         
        
        
             //realizacion de la validacion con las reglas estaticas del modelo 
            $this->validate($request, $reglas);
            //instanciamos un nuevo usuario
            $fotos = new Foto;
             //vinculamos los datos recibidos al modelo
            $fotos ->piezas_id = $piezas_id;
            $fotos ->fotos_id = $fotos_id;
            //guardamos en la base de datos los datos recibidos
            $fotos ->save();
            
            return redirect('fotos');
              
    }      
    public function borrar($id){
        //recupero el registro por id de la base primweo ,lo borro
        //redirijo
        $fotos = Foto::findOrFail($id);
        
        $fotos->delete();
        
        return redirect('fotos');
        
                
    }
    public function editar($id){
        //recupero el registro por id de la base primweo ,lo borro
        //redirijo
        $fotos = Foto::findOrFail($id);
        
       
        
        return view('editarFoto', ['fotos' => $fotos]);
        
                
    }
    
    public function update($id, Request $request)
{
   
   //Session::flash('flash_message', 'Persona Actualizada satisfactoriamente');
    $fotos=Foto::findOrFail($id);
    $input = $request->all();
    $fotos->fill($input)->save();
   return redirect('fotos')->with('key', 'You have done successfully');
    
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