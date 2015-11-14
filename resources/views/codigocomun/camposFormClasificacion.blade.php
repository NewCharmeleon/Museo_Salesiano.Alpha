    <div class="form-group">
        {!! Form::label('descripcion', 'Descripcion:') !!}
        {!! Form::text('descripcion',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('fondos_id', 'Id del Fondo:') !!}
            {!! Form::select('$id = Pieza::all()->clasificacion_id') !!}
   </div>
    <div class="form-group">
        {!! Form::label('fondos_id', 'Id del Fondo:') !!}
        {!! Form::text('fondos_id',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('usuarios_carga_id', 'Id del Usuario:') !!}
        {!! Form::text('usuarios_carga_id',null,['class'=>'form-control']) !!}
    </div>
    
        