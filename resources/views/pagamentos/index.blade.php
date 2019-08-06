@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Pagamentos</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('pagamentos.index') !!}">Pagamentos</a></li>
            <li class="active">Lista</li>
        </ol>
    </h1>
</section>
<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table display datatable-list">
                    <thead>
                        <tr>
                            <th>Nº Documento</th>
                            <th>Parcela</th>
                            <th>Referente</th>
                            <th>Vencimento</th>
                            <th>Status</th>
                            <th>Forma</th>
                            <th>Data do Pagamento</th>
                            <th>Multa</th>
                            <th>Valor</th>
                            <th>Recibo</th>
                            <th>Usuário</th>
                            <th>Data/Hora</th>
                            <th>Lançamento</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach($alunos as $aluno)
                        <tr>
                            <td>{!! $aluno->aluno !!}</td>
                            <td>
                                {!! Form::open(['route' => ['alunos.destroy', $aluno->id], 'method' =>
                                'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{!! route('alunos.show', [$aluno->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                    <a href="{!! route('alunos.edit', [$aluno->id]) !!}"
                                        class='btn btn-default btn-sm'><i class="glyphicon glyphicon-edit"></i></a>
                                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Você tem certeza
                                    que deseja deletar o tempo de aula selecionado?')"]) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach --}}
                        <?php $_i = 1; ?>
                        @foreach($alunos as $aluno)
                        <tr>
                            <td>1</td>
                            <td>{!! $_i !!}</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td><a href="#" class="btn btn-flat btn-primary"><i class="fa fa-bars"></i> Recibo</a></td>
                            <td>1</td>
                            <td>1</td>
                            <td><a href="{!! route('pagamentos.edit', [$aluno->id]) !!}" class="btn btn-flat btn-primary"><i class="fa fa-bars"></i> Lançar</a></td>
                        </tr>
                        <?php $_i++; ?>
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
