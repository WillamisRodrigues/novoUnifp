@extends('layouts.app')

@section('title', 'Escolaridade - Editar')

@section('content')
<section class="content-header">
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('escolaridades.index') !!}" class="disabled">Escolaridade</a></li>
            <li class="active">Editar Escolaridade</li>
        </ol>
    </h1>
    <h1>
        Editar Escolaridade
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary criar-unidade">
        <div class="box-body">
            <div class="row">
                {!! Form::model($escolaridade, ['route' => ['escolaridades.update', $escolaridade->id], 'method' =>
                'patch']) !!}

                @include('escolaridades.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
