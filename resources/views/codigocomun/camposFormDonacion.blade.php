    <div class="form-group">
        {!! Form::label('donantes_id', 'Id del Donante:') !!}
        {!! Form::text('donantes_id',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('piezas_id', 'Id de la Pieza:') !!}
            {!! Form::select('$id = Pieza::all()->clasificacion_id') !!}
   </div>
    <div class="form-group">
        {!! Form::label('piezas_id', 'Id de la Pieza:') !!}
        {!! Form::text('piezas_id',null,['class'=>'form-control']) !!}
    </div>
    
    
    
        