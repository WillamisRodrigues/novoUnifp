@extends('layouts.app')

@section('title', 'Fornecedores - Detalhes')

@section('content')
<section class="content-header">
    <h1>
        Frequencia
    </h1>
</section>
<div class="content">
    <div class="container" style="height: 100px">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fa fa-graduation-cap"></i> Informações do aluno</div>
                <div class="panel-body row">
                    @foreach ($alunos as $aluno)
                    <p class="col-md-6 col-sm-12"><strong>Matrícula</strong>: {!! $aluno->id !!}</p>
                    <p class="col-md-6 col-sm-12"><strong>Nome</strong>: {!! $aluno->Nome !!}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="box box-primary ">
        <div class="box-body">
            <div class="row" style="padding-left: 20px">
                @include('frequencias.show_fields')
                <div class="col-md-3"></div>
                <a href="{!! route('alunos.index') !!}" class="btn btn-default">Voltar</a>
            </div>
        </div>
    </div>
</div>
@endsection
