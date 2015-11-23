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
   /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function fotos ($descripcion = null)
    {
        
            if ($descripcion=='todos'){
                $resultado = Foto::
                      orderBy('descripcion')->get();
            }else{
                $resultado = Foto::where('id','like', "%$descripcion%")
                        ->orderBy('id')->get();
            }
            return view('fotos', ["fotos" => $resultado]);
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
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */   
    public function borrar($id){
        //recupero el registro por id de la base primweo ,lo borro
        //redirijo
        $fotos = Foto::findOrFail($id);
        
        $fotos->delete();
        
        return redirect('fotos');
        
                
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
        $fotos = Foto::findOrFail($id);
        
       
        
        return view('editarFoto', ['fotos' => $fotos]);
        
                
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
        $fotos=Foto::findOrFail($id);
        $input = $request->all();
        $this->validate($input, Foto::$reglas);///esto no anda
        $fotos->fill($input)->save();
       return redirect('fotos')->with('key', 'You have done successfully');
        
    }       

    public function destroy($id)
    {
        //
    }
}