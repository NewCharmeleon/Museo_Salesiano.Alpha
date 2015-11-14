    <div class="form-group">
        {!! Form::label('piezas_id', 'Id de la Foto:') !!}
        {!! Form::text('piezas_id',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('fotos_id', 'Id de la Foto:') !!}
            {!! Form::select('$id = Pieza::all()->clasificacion_id') !!}
   </div>
    <div class="form-group">
        {!! Form::label('fotos_id', 'Id de la Foto:') !!}
        {!! Form::text('fotos_id',null,['class'=>'form-control']) !!}
    </div>
    
    
    
        