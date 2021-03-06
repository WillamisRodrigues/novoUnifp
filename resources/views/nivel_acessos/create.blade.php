@extends('layouts.app')

@section('title', 'Nível de Acesso - Adicionar')

@section('content')
    <section class="content-header">
            <h1 class="pull-left">Adicionar Perfil</h1>
            <h1 class="pull-right">
                <ol class="breadcrumb breadcrumb-fp">
                    <li><a href="/home"><i class="fa fa-home"></i></a></li>
                    <li><a href="{!! route('nivelAcessos.index') !!}">Perfil de Acesso</a></li>
                    <li class="active">Adicionar</li>
                </ol>
            </h1>
            <div class="clearfix"></div>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary criar-unidade">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'nivelAcessos.store']) !!}

                        @include('nivel_acessos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
