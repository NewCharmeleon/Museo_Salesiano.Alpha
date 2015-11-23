<?php

namespace App\Http\Controllers;
use App\Clasificacion;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ClasificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function clasificaciones ($descripcion = null)
    {
       
            if ($descripcion=='todos'){
                $resultado = Clasificacion::
                      orderBy('descripcion')->get();
            }else{
                $resultado = Clasificacion::where('descripcion','like', "%$descripcion%")
                        ->orderBy('descripcion')->get();
            }
            return view('clasificaciones', ["clasificaciones" => $resultado]);
    }     
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function nuevo(Request $request)
    {
       //recibimos los datos del request
        
        $descripcion = $request ->input("descripcion");
        $fondos_id   = $request ->input("fondos_id");
        $usuario_carga_id   = $request ->input("usuarios_carga_id");
        
        
            //realizacion de la validacion con las reglas estaticas del modelo   
            $this->validate($request, $reglas);
            //instanciamos una nueva clasificacion
            $clasificaciones = new Clasificacion;
            //vinculamos los datos recibidos al modelo
            $clasificaciones ->descripcion = $descripcion;
            $clasificaciones ->fondos_id = $fondos_id;
            $clasificaciones ->usuario_carga_id = $usuario_carga_id;
            
            //guardamos en la base de datos los datos recibidos
            $clasificaciones ->save();
            
            return redirect('clasificaciones');
              
    }      
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function borrar($id){
        //recupero el registro por id de la base primweo ,lo borro
        //redirijo
        $clasificaciones = Clasificacione::findOrFail($id);
        
        $clasificaciones->delete();
        
        return redirect('clasificaciones');
        
                
    }
      /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id){
        //recupero el registro por id de la base primweo ,lo borro
        //redirijo
        $clasificaciones = Clasificacion::findOrFail($id);
        
       
        
        return view('editarClasificacion', ['clasificaciones' => $clasificaciones]);
        
                
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
{
   
   //Session::flash('flash_message', 'Persona Actualizada satisfactoriamente');
    $clasificaciones=Clasificacion::findOrFail($id);
    $input = $request->all();
    $this->validate($input, Clasificacion::$reglas);///esto no anda
    $clasificaciones->fill($input)->save();
   return redirect('clasificaciones')->with('key', 'You have done successfully');
    
}       

       
    public function destroy($id)
    {
        //
    }
}