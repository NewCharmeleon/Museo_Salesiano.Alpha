    <div class="form-group">
        {!! Form::label('descripcion', 'Descripcion:') !!}
        {!! Form::text('descripcion',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('clasificaciones', 'Clasificacion:') !!}
            {!! Form::select('$id = Pieza::all()->clasificacion_id') !!}
   </div>
    <div class="form-group">
        {!! Form::label('clasificaciones_id', 'Clasificacion:') !!}
        {!! Form::text('clasificaciones_id',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('procedencia', 'Procedencia:') !!}
        {!! Form::text('procedencia',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('autor', 'Autor:') !!}
        {!! Form::text('autor',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('tema', 'Tema:') !!}
        {!! Form::text('tema',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('observacion', 'Observaciones:') !!}
        {!! Form::text('observacion',null,['class'=>'form-control']) !!}
    </div>
        