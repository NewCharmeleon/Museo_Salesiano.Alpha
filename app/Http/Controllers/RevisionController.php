<?php

namespace App\Http\Controllers;
use App\Revision;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RevisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function revisiones ($descripcion = null)
    {
        
            if ($descripcion=='todos'){
                $resultado = Revision::
                      orderBy('descripcion')->get();
            }else{
                $resultado = Revision::where('id','like', "%$descripcion%")
                        ->orderBy('id')->get();
            }
            return view('revisiones', ["revisiones" => $resultado]);
    }  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function nuevo(Request $request)
    {
        //recibimos los datos del request
        
        $usuarios_revision_id = $request ->input("usuarios_revision_id");
        $piezas_id   = $request ->input("piezas_id");
        $estado_de_conservacion   = $request ->input("estado_de_conservacion");
        $ubicacion   = $request ->input("ubicacion");
        
        
            //realizacion de la validacion con las reglas estaticas del modelo   
            $this->validate($request, $reglas);
            //instanciamos un nuevo usuario
            $revisiones = new Revision;
            //vinculamos los datos recibidos al modelo
            $revisiones ->usuarios_revision_id = $usuarios_revision_id;
            $revisiones ->piezas_id = $piezas_id;
            $revisiones ->estado_de_conservacion = $estado_de_conservacion;
            $revisiones ->ubicacion = $ubicacion;
            
            //guardamos en la base de datos los datos recibidos
            $revisiones ->save();
            
            return redirect('revisiones');
              
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
        $revisiones = Revision::findOrFail($id);
        
        $revisiones->delete();
        
        return redirect('revisiones');
        
                
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
        $revisiones = Revision::findOrFail($id);
        
        return view('editarRevision', ['revisiones' => $revisiones]);
        
                
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
        $revisiones=Revision::findOrFail($id);
        $input = $request->all();
        $this->validate($input, Revision::$reglas);///esto no anda
        $revisiones->fill($input)->save();
       return redirect('revisiones')->with('key', 'You have done successfully');
        
    }       

    public function destroy($id)
    {
        //
    }
}