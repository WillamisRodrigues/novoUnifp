@extends('layouts.app')

@section('title', 'Tempo de Aula - Detalhes')

@section('content')
    <section class="content-header">
        <h1>
            Tempo Aula
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary criar-unidade">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('tempo_aulas.show_fields')
                    <a href="{!! route('tempoAulas.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
