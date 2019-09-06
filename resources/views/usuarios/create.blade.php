@extends('layouts.app')

@section('title', 'Usuário - Adicionar')

@section('content')
<section class="content-header">
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('usuarios.index') !!}">Usuários</a></li>
            <li class="active">Cadastrar Usuário</li>
        </ol>
    </h1>
    <h1>
        Cadastrar Usuário
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary criar-unidade">

        <div class="box-body">
            <div class="row">
                {!! Form::open(['route' => 'usuarios.store']) !!}

                @include('usuarios.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
