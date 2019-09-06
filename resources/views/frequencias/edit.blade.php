@extends('layouts.app')

@section('title', 'Fornecedores - Editar')

@section('content')
    <section class="content-header">
        <h1>
            Frequencia
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($frequencia, ['route' => ['frequencias.update', $frequencia->id], 'method' => 'patch']) !!}

                        @include('frequencias.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
