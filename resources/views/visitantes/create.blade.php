@extends('layouts.app')

@section('content')
    <section class="content-header">
            <h1 class="pull-right">
                    <ol class="breadcrumb breadcrumb-fp">
                        <li><a href="/home"><i class="fa fa-home"></i></a></li>
                        <li><a href="{!! route('visitantes.index') !!}">Visitante</a></li>
                        <li class="active">Cadastrar Visitante</li>
                    </ol>
                </h1>
                <h1>
                    Cadastrar Visitante
                </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary criar-unidade">

            <div class="box-body">
                <div class="row mx-auto">
                    {!! Form::open(['route' => 'visitantes.store']) !!}

                        @include('visitantes.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
