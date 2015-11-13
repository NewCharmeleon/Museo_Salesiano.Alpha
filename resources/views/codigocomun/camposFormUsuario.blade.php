    <div class="form-group">
        {!! Form::select('personas_id', $usuario, null,'Personas_id:') !!}
        {!! Form::text('personas_id',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('nombre_usuario', 'Nombre de Usuario:') !!}
        {!! Form::text('nombre_usuario',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::text('password',null,['class'=>'form-control']) !!}
    </div>
   
        