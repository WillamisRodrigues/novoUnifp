@extends('layouts.app')

@section('title', 'Listar Vendedores')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Vendedores</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li class="active">Lista</li>
        </ol>
    </h1>
</section>
<div class="clearfix"></div>
<a class="btn btn-success" style="margin-left: 1rem" href="{!! route('funcionarios.create') !!}"><i
        class="fa fa-plus"></i> Adicionar</a>
<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary criar-unidade">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table display datatable-list">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Celular</th>
                            <th>Telefone Fixo</th>
                            <th>Cargo</th>
                            <th>Setor</th>
                            <th>Estado Civil</th>
                            <th>Observação</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($funcionarios as $funcionario)
                        <tr>
                            <td>{!! $funcionario->Nome !!}</td>
                            <td>{!! $funcionario->Email !!}</td>
                            <td>{!! $funcionario->Celular !!}</td>
                            <td>{!! $funcionario->TelefoneFixo !!}</td>
                            <td>{!! $funcionario->Cargo !!}</td>
                            <td>{!! $funcionario->Setor !!}</td>
                            <td>{!! $funcionario->EstadoCivil !!}</td>
                            <td>{!! $funcionario->Observacao !!}</td>
                            <td>
                                @switch($funcionario->Inativo)
                                @case("Nao")
                                {!! "Ativo" !!}
                                @break
                                @case("Sim")
                                {!! "Inativo" !!}
                                @break
                                @default
                                {!! "Sem período definido" !!}
                                @break
                                @endswitch
                            </td>
                            <td>
                                {!! Form::open(['route' => ['funcionarios.destroy', $funcionario->id], 'method' =>
                                'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{!! route('funcionarios.show', [$funcionario->id]) !!}"
                                        class='btn btn-default btn-sm'><i class="glyphicon glyphicon-zoom-in"></i></a>
                                    <a href="{!! route('funcionarios.edit', [$funcionario->id]) !!}"
                                        class='btn btn-default btn-sm'><i class="glyphicon glyphicon-edit"></i></a>
                                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit',
                                    'class' =>
                                    'btn btn-danger btn-sm', 'onclick' => "return confirm('Tem certeza que deseja
                                    excluir o
                                    funcionário?')"]) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div class="text-center">

    </div>
</div>
@endsection
