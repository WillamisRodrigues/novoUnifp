@extends('layouts.app')

@section('title', 'Tempo de Aula - Editar')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Tempo de Aula</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('tempoAulas.index') !!}">Tempo de Aula</a></li>
            <li class="active">Editar</li>
        </ol>
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary criar-unidade">
        <div class="box-body">
            <div class="row">
                {!! Form::model($tempoAula, ['route' => ['tempoAulas.update', $tempoAula->id], 'method' => 'patch']) !!}

                @include('tempo_aulas.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
