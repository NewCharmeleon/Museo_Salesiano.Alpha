    <div class="form-group">
        {!! Form::label('usuarios_revision_id', 'Id del Usuario:') !!}
        {!! Form::text('usuarios_revision_id',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('piezas_id', 'Id de la Pieza:') !!}
            {!! Form::select('$id = Pieza::all()->clasificacion_id') !!}
   </div>
    <div class="form-group">
        {!! Form::label('piezas_id', 'Id de la Pieza:') !!}
        {!! Form::text('piezas_id',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('estado_de_conservacion', 'Estado de Conservacion de la Pieza:') !!}
        {!! Form::text('estado-de_conservacion',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('ubicacion', 'Ubicacion:') !!}
        {!! Form::text('ubicacion',null,['class'=>'form-control']) !!}
    </div>
    
    
        