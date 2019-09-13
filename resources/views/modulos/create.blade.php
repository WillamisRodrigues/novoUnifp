@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Módulos</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('cursos.index') !!}"> Cursos </a></li>
            <li><a href="{!!  route('modulos.show', [$idCurso])  !!}"> Módulos </a></li>
            <li class="active">Adicionar Módulo</li>
        </ol>
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary criar-unidade">

        <div class="box-body">
            <div class="row">
                {!! Form::open(['route' => 'modulos.store']) !!}

                @include('modulos.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
