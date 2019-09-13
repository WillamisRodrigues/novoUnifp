@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Módulos do Curso {!! $curso->nomeCurso !!}</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('cursos.index') !!}"> Cursos </a></li>
            <li class="active">Lista de Módulos do Curso {!! $curso->nomeCurso !!}</li>
        </ol>
    </h1>
</section>
<div class="clearfix"></div>
<a class="btn btn-success" style="margin-left: 1rem" href="adicionarModulo/{!!$idCurso!!}"><i class="fa fa-plus"></i>
    Adicionar</a>
<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary criar-unidade">
        <div class="box-body">
            @include('modulos.table')
        </div>
        <a class="btn btn-default" style="margin: 1rem 3rem" href="{!! route('cursos.index') !!}"> Voltar </a>
    </div>
    <div class="text-center">

    </div>
</div>
@endsection
