<div class="container formulario-padrao">
    <!-- NomeCurso Field -->
    <div class="row">
        <p class="col-xs-12 col-sm-3">{!! Form::label('NomeContrato', 'Nome do Contrato:') !!}</p>
        <p class="col-xs-12 col-sm-9">{!! Form::text('NomeContrato', null, ['class' => 'form-control']) !!}</p>
    </div>
    <!-- Idcurso Field -->
    <div class="row">
        <p class="col-xs-12 col-sm-3">{!! Form::label('idCurso', 'ID do Curso:') !!}</p>
        <p class="col-xs-12 col-sm-9">{!! Form::number('idCurso', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Contrato1 Field -->
    <div class="row">
        <p class="col-xs-12 col-sm-3">{!! Form::label('Contrato1', 'Texto do Contrato:') !!}</p>
        <p class="col-xs-12 col-sm-9">{!! Form::textarea('Contrato1', null, ['class' => 'form-control editor1']) !!}</p>
    </div>

    <!-- Assinatura1 Field -->
    <div class="row">
        <p class="col-xs-12 col-sm-3">{!! Form::label('Assinatura1', 'Assinatura:') !!}</p>
        <p class="col-xs-12 col-sm-9">{!! Form::textarea('Assinatura1', null, ['class' => 'form-control editor2']) !!}
        </p>
    </div>

    <!-- Valores1 Field -->
    <div class="row">
        <p class="col-xs-12 col-sm-3">{!! Form::label('Valores1', 'Valores:') !!}</p>
        <p class="col-xs-12 col-sm-9">{!! Form::textarea('Valores1', null, ['class' => 'form-control editor3']) !!}</p>
    </div>

    <!-- Prestadora Field -->
    <div class="row">
        <p class="col-xs-12 col-sm-3">{!! Form::label('Prestadora', 'Prestadora:') !!}</p>
        <p class="col-xs-12 col-sm-9">{!! Form::textarea('Prestadora', null, ['class' => 'form-control editor4']) !!}
        </p>
    </div>

    <!-- Matricula1 Field -->
    <div class="row">
        <p class="col-xs-12 col-sm-3" style="padding: 10px 15px">{!! Form::label('Matricula1', 'Valor Matrícula:') !!}
        </p>
        <div class="col-xs-12 input-group col-sm-9" style="padding:5px 15px;">
            {!! Form::text('Matricula1', null, ['class' => 'form-control']) !!}
            <div class="input-group-addon agenda-input-hora">
                <i class="fa fa-money"></i>
            </div>
        </div>
    </div>

    <!-- Multacontrato Field -->
    <div class="row">
        <p class="col-xs-12 col-sm-3" style="padding:10px 15px">{!! Form::label('MultaContrato', 'Multa do Contrato:')
            !!}</p>
        <div class="col-xs-12 input-group col-sm-9" style="padding:5px 15px;">
            {!! Form::text('MultaContrato', null, ['class' => 'form-control']) !!}
            <div class="input-group-addon agenda-input-hora">
                <i class="fa fa-money"></i>
            </div>
        </div>
    </div>

    <!-- Moracontrato Field -->
    <div class="row">
        <p class="col-xs-12 col-sm-3" style="padding:10px 15px">{!! Form::label('MoraContrato', 'Mora do Contrato:') !!}
        </p>
        <div class="col-xs-12 input-group col-sm-9" style="padding:5px 15px;">
            {!! Form::text('MoraContrato', null, ['class' => 'form-control']) !!}
            <div class="input-group-addon agenda-input-hora">
                <i class="fa fa-money"></i>
            </div>
        </div>
    </div>

    <!-- Multa Field -->
    <div class="row">
        <p class="col-xs-12 col-sm-3" style="padding:10px 15px">{!! Form::label('Multa', 'Multa:') !!}</p>
        <div class="col-xs-12 input-group col-sm-9" style="padding:5px 15px;">
            {!! Form::text('Multa', null, ['class' => 'form-control']) !!}
            <div class="input-group-addon agenda-input-hora">
                <i class="fa fa-money"></i>
            </div>
        </div>
    </div>

    <!-- Mora Field -->
    <div class="row">
        <p class="col-xs-12 col-sm-3" style="padding:10px 15px">{!! Form::label('Mora', 'Mora:') !!}</p>
        <div class="col-xs-12 input-group col-sm-9" style="padding:5px 15px;">
            {!! Form::text('Mora', null, ['class' => 'form-control']) !!}
            <div class="input-group-addon agenda-input-hora">
                <i class="fa fa-money"></i>
            </div>
        </div>
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
            <button class="btn btn-success btn-flat" style="margin-bottom: 1rem" type="submit"><i
                    class="fa fa-save"></i>
                Salvar
                Curso</button>
            <a href="{!! route('contratos.index') !!}" style="margin-bottom: 1rem" class="btn btn-danger btn-flat"> <i
                    class="fa fa-close"></i>
                Cancelar</a>
        </div>
    </div>
</div>
