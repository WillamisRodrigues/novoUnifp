@extends('layouts.app')

@section('title', 'Controle de Presença - Editar')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Controle de Presença de Alunos</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{{ route('presenca.index') }}">Controle de Presença de Alunos</a></li>
            <li class="active">Editar</li>
        </ol>
    </h1>
</section>
<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>

    <div class="box box-primary criar-unidade">
        <div class="box-body" style="padding: 3rem 5rem">
            <div class="row" style="padding: 1rem 0">
                <div class="col-xs-12 col-sm-2" style="font-weight: bold">Aluno: </div>
                <div class="col-xs-12 col-sm-6">
                    <input type="text" name="" id="" value="{{ $aluno->Nome }}" readonly>
                </div>
            </div>
            <div class="row" style="padding: 1rem 0">
                <div class="col-xs-12 col-sm-2" style="font-weight: bold">Nº Aula: </div>
                <div class="col-xs-12 col-sm-6">
                    <input type="text" name="" id="" value="{{ $frequencia->idAula }}" readonly>
                </div>
            </div>
            <div class="row" style="padding: 1rem 0">
                <div class="col-xs-12 col-sm-2" style="font-weight: bold">Data: </div>
                <div class="col-xs-12 col-sm-6">
                    <input type="text" name="" id="" value="{{ date('d/m/Y', strtotime($frequencia->created_at)) }}"
                        readonly>
                </div>
            </div>
            {!! Form::open(['route' => ['presenca.update', $frequencia->idFrequencia], 'method' => 'patch']) !!}
            {{-- {!! Form::model($frequencia, ['route' => ['presenca.update', $frequencia->idFrequencia], 'method' => 'patch']) !!} --}}
            <input type="hidden" name="idFrequencia" value="{{ $frequencia->idFrequencia }}">
            <div class="row" style="padding: 1rem 0">
                <div class="col-xs-12 col-sm-2" style="font-weight: bold">Presença: </div>
                <div class="col-xs-12 col-sm-6">
                    <input type="radio" name="Frequencia" id="Presente" value="1" checked>
                    <label for="Presente" style="margin-right: 2rem"> Presente </label>
                    <input type="radio" name="Frequencia" id="Frequencia" value="0">
                    <label for="Frequencia"> Ausente </label>
                </div>
            </div>
            <div class="row" style="margin-top: 2rem">
                <a style="margin-left: 10rem" href="{{ route('presenca.index') }}" class="btn btn-default"> Voltar </a>
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
