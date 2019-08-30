<div class="container formulario-padrao">
    <!-- NomeCurso Field -->
    <div class="row">
        <p class="col-xs-12 col-sm-3">{!! Form::label('NomeContrato', 'Nome do Contrato:') !!}</p>
        <p class="col-xs-12 col-sm-9">{!! Form::text('NomeContrato', null, ['class' => 'form-control']) !!}</p>
    </div>
    <!-- Idcurso Field -->
    <div class="row">
        <p class="col-xs-12 col-sm-3">{!! Form::label('idCurso', 'ID do Curso:') !!}</p>
        <p class="col-xs-12 col-sm-9 select-padrao">
            <select name="idCurso" id="idCurso">
                {{-- @foreach ($cursos as $curso) --}}
                    <option value="{!! $cursos->id !!}">{!! $cursos->nomeCurso !!}</option>
                {{-- @endforeach --}}
            </select>
        </p>
    </div>

    <!-- Contrato1 Field -->
    <div class="row">
        <p class="col-xs-12 col-sm-3">{!! Form::label('Contrato', 'Texto do Contrato:') !!}</p>
        <p class="col-xs-12 col-sm-9">{!! Form::textarea('Contrato', null, ['class' => 'form-control editor1']) !!}</p>
    </div>

    <!-- Matricula1 Field -->
    <div class="row">
        <p class="col-xs-12 col-sm-3" style="padding: 10px 15px">{!! Form::label('Matricula', 'Valor Matrícula:') !!}
        </p>
        <div class="col-xs-12 input-group col-sm-9" style="padding:5px 15px;">
            {!! Form::text('Matricula', null, ['class' => 'form-control']) !!}
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
                Contrato</button>
            <a href="{!! route('contratos.show', [$cursos->id]) !!}" style="margin-bottom: 1rem" class="btn btn-danger btn-flat"> <i
                    class="fa fa-close"></i>
                Cancelar</a>
        </div>
    </div>
</div>
