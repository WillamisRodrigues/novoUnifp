@extends('layouts.app')

@section('title', 'Adicionar Prova')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Avaliações</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('cursos.index') !!}">Cursos</a></li>
        <li><a href="avaliacoes/{{ $id }}">Avaliações</a></li>
            <li class="active">Adicionar</li>
        </ol>
    </h1>
</section>
<div class="content">
    @include('flash::message')
    @include('adminlte-templates::common.errors')
    <div class="box box-primary criar-unidade">

        <div class="box-body">
            <div class="row">
                {{ Form::open(array('url' => 'storeProva', 'files' => true))}}
                <div class="container formulario-padrao">
                    <!-- Campo Nome do Curso -->
                    <div class="row">
                        <p class="col-sm-12 col-md-3">{!! Form::label('nomeProva', 'Nome da Avaliação:') !!}<span
                                style="color: red">*</span></p>
                        <p class="col-sm-12 col-md-6">{!! Form::text('nomeProva', null, ['class' => 'form-control'])
                            !!}
                        </p>
                    </div>

                    <!-- Campo Quantidade de Aulas -->
                    <div class="row">
                        <p class="col-sm-12 col-md-3">{!! Form::label('caminhoProva', 'Prova:') !!}<span
                                style="color: red">*</span> <small>(O formato do arquivo tem que ser PDF)</small> </p>
                        <p class="col-sm-12 col-md-6">{!! Form::file('caminhoProva', null, ['class' =>
                            'form-control'])
                            !!}</p>
                    </div>

                    <input type="hidden" name="id" value="{{ $id }}">

                    <!-- Campo Submit -->
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <button class="btn btn-success btn-flat" style="margin-bottom: 1rem" type="submit"><i
                                    class="fa fa-save"></i>
                                Salvar
                                Avaliação</button>
                            <a href="#" style="margin-bottom: 1rem" class="btn btn-danger btn-flat"> <i
                                    class="fa fa-close"></i>
                                Cancelar</a>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
