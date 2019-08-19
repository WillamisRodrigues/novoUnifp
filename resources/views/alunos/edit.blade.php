@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Alunos</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('alunos.index') !!}">Alunos</a></li>
            <li class="active">Editar</li>
        </ol>
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    {{-- <div class="box box-primary criar-unidade">
        <div class="box-body">
            <div class="row">
                {!! Form::model($aluno, ['route' => ['alunos.update', $aluno->id], 'method' => 'patch']) !!}

                @include('alunos.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div> --}}
    {{-- <div class="box box-primary criar-unidade"> --}}

    <div class="clearfix"></div>
    <div class="box-body criar-aluno">
        <div class="clearfix"></div>
        <div class="row">
            {!! Form::open(['route' => 'alunos.store']) !!}

            @include('alunos.fields')

            {!! Form::close() !!}
        </div>
    </div>
    {{-- </div> --}}
</div>
@endsection
