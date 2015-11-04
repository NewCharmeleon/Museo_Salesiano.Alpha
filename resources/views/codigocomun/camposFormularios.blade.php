    <div class="form-group">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('cuit_cuil', 'Cuit/Cuil:') !!}
        {!! Form::text('cuit_cuil',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('telefono', 'Telefono:') !!}
        {!! Form::text('telefono',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('domicilio', 'Domicilio:') !!}
        {!! Form::text('domicilio',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email',null,['class'=>'form-control']) !!}
    </div>
        