@extends('layouts.app')

@section('title', 'Como Conheceu - Editar')

@section('content')
    <section class="content-header">
            <h1 class="pull-left">Como Conheceu</h1>
            <h1 class="pull-right">
                <ol class="breadcrumb breadcrumb-fp">
                    <li><a href="/home"><i class="fa fa-home"></i></a></li>
                    <li><a href="{!! route('comoConheceus.index') !!}">Como Conheceu</a></li>
                    <li class="active">Editar</li>
                </ol>
            </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary criar-unidade">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($comoConheceu, ['route' => ['comoConheceus.update', $comoConheceu->id], 'method' => 'patch']) !!}

                        @include('como_conheceus.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
