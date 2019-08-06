@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Frequencia
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary criar-unidade">
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
