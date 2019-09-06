@extends('layouts.app')

@section('title', 'Centro de Custos - Editar')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Centro de Custos</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('centroCustos.index') !!}">Centro de Custos</a></li>
            <li class="active">Editar</li>
        </ol>
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary criar-unidade">
        <div class="box-body">
            <div class="row">
                {!! Form::model($centroCusto, ['route' => ['centroCustos.update', $centroCusto->id], 'method' =>
                'patch']) !!}

                @include('centro_custos.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
