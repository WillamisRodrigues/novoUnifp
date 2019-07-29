@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tempo Aula
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
