<!-- NomeCurso Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NomeContrato', 'NomeContrato:') !!}
    {!! Form::text('NomeContrato', null, ['class' => 'form-control']) !!}
</div>
<!-- Idcurso Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idCurso', 'Idcurso:') !!}
    {!! Form::number('idCurso', null, ['class' => 'form-control']) !!}
</div>

<!-- Contrato1 Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Contrato1', 'Contrato1:') !!}
    {!! Form::textarea('Contrato1', null, ['class' => 'form-control']) !!}
</div>

<!-- Assinatura1 Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Assinatura1', 'Assinatura1:') !!}
    {!! Form::textarea('Assinatura1', null, ['class' => 'form-control']) !!}
</div>

<!-- Valores1 Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Valores1', 'Valores1:') !!}
    {!! Form::textarea('Valores1', null, ['class' => 'form-control']) !!}
</div>

<!-- Matricula1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Matricula1', 'Matricula1:') !!}
    {!! Form::number('Matricula1', null, ['class' => 'form-control']) !!}
</div>

<!-- Contrato2 Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Contrato2', 'Contrato2:') !!}
    {!! Form::textarea('Contrato2', null, ['class' => 'form-control']) !!}
</div>

<!-- Assinatura2 Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Assinatura2', 'Assinatura2:') !!}
    {!! Form::textarea('Assinatura2', null, ['class' => 'form-control']) !!}
</div>

<!-- Valores2 Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Valores2', 'Valores2:') !!}
    {!! Form::textarea('Valores2', null, ['class' => 'form-control']) !!}
</div>

<!-- Matricula2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Matricula2', 'Matricula2:') !!}
    {!! Form::number('Matricula2', null, ['class' => 'form-control']) !!}
</div>

<!-- Prestadora Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Prestadora', 'Prestadora:') !!}
    {!! Form::textarea('Prestadora', null, ['class' => 'form-control']) !!}
</div>

<!-- Multacontrato Field -->
<div class="form-group col-sm-6">
    {!! Form::label('MultaContrato', 'Multacontrato:') !!}
    {!! Form::number('MultaContrato', null, ['class' => 'form-control']) !!}
</div>

<!-- Moracontrato Field -->
<div class="form-group col-sm-6">
    {!! Form::label('MoraContrato', 'Moracontrato:') !!}
    {!! Form::number('MoraContrato', null, ['class' => 'form-control']) !!}
</div>

<!-- Multa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Multa', 'Multa:') !!}
    {!! Form::number('Multa', null, ['class' => 'form-control']) !!}
</div>

<!-- Mora Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Mora', 'Mora:') !!}
    {!! Form::number('Mora', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('contratos.index') !!}" class="btn btn-default">Cancel</a>
</div>
