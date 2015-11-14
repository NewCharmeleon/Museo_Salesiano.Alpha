    <div class="form-group">
        {!! Form::label('descripcion', 'Descripcion:') !!}
        {!! Form::text('descripcion',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('usuarios_id', 'Id del Usuario:') !!}
            {!! Form::select('$id = Pieza::all()->clasificacion_id') !!}
   </div>
    <div class="form-group">
        {!! Form::label('usuarios_id', 'Id del Usuario:') !!}
        {!! Form::text('usuarios_id',null,['class'=>'form-control']) !!}
    </div>
    
    
    
        