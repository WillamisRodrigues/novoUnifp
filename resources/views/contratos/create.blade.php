@extends('layouts.app')

@section('title', 'Contratos - Adicionar')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Contratos</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('cursos.index') !!}">Cursos</a></li>
            {{-- falta a rota --}}
            <li><a href="{!! route('contratos.show', [$cursos->id]) !!}">Contratos</a></li>
            <li class="active">Criar</li>
        </ol>
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary criar-unidade">

        <div class="box-body">
            <div class="row">
                {!! Form::open(['route' => 'contratos.store']) !!}

                @include('contratos.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
