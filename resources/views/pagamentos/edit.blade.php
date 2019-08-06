@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Tempo de Aula</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('pagamentos.index') !!}">Tempo de Aula</a></li>
            <li class="active">Editar</li>
        </ol>
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary criar-unidade">
        <div class="box-body">
            <div class="row">
                {!! Form::model($tempoAula, ['route' => ['pagamentos.update', $aluno->id], 'method' => 'patch']) !!}

                <!-- Tempoaula Field -->
                <div class="form-group col-sm-6 row">
                    <div class="col-md-3">{!! Form::label('tempoAula', 'Tempo de Aula:', ['style' => 'font-size:
                        1.31rem']) !!}<span style="color: red">*</span></div>
                    <div class="col-md-9">{!! Form::text('tempoAula', null, ['class' => 'form-control']) !!}</div>
                </div>

                <!-- Submit Field -->
                <div class="form-group col-sm-12">
                    <button class="btn btn-success btn-flat" style="margin-bottom: 1rem" type="submit"><i
                            class="fa fa-save"></i> Salvar Tempo de Aula</button>
                    <a href="{!! route('pagamentos.index') !!}" style="margin-bottom: 1rem"
                        class="btn btn-danger btn-flat"> <i class="fa fa-close"></i> Cancelar</a>
                </div>


                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
