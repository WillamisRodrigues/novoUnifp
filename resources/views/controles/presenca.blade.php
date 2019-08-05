@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Controle de Presença de Alunos</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li class="active">Controle de Presença de Alunos</li>
        </ol>
    </h1>
</section>
<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="row">
        <p class="select-padrao col-md-2"> Selecione o curso:
            <select name="cursos" id="cursos">
                @foreach($cursos as $curso )
                <option value="{{ $curso->nomeCurso }}">{{ $curso->nomeCurso }}</option>
                @endforeach
            </select>
        </p>
        <p class="select-padrao col-md-2"> Selecione a turma:
            <select name="turmas" id="turmas">
                @foreach($turmas as $turma )
                <option value="{{ $turma->NomeTurma }}">{{ $turma->NomeTurma }}</option>
                @endforeach
            </select>
        </p>
    </div>
    <div class="box box-primary">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table display datatable-list" id="alunos-table">
                    <thead>
                        <tr>
                            <th>Aluno</th>
                            <th class="text-center">Aula 01</th>
                            <th class="text-center">Aula 02</th>
                            <th class="text-center">Aula 03</th>
                            <th class="text-center">Aula 04</th>
                            <th class="text-center">Aula 05</th>
                            <th class="text-center">Aula 06</th>
                            <th class="text-center">Aula 07</th>
                            <th class="text-center">Aula 08</th>
                            <th class="text-center">Aula 09</th>
                            <th class="text-center">Aula 10</th>
                            <th class="text-center">Aula 11</th>
                            <th class="text-center">Aula 12</th>
                            <th class="text-center">Aula 13</th>
                            <th class="text-center">Aula 14</th>
                            <th class="text-center">Aula 15</th>
                            <th class="text-center">Aula 16</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alunos as $aluno)
                        <tr>
                            <td>{!! $aluno->Nome !!}</td>
                            <td class="text-center">{!! Form::checkbox('Presenca', 'Sim') !!}</td>
                            <td class="text-center">{!! Form::checkbox('Presenca', 'Sim') !!}</td>
                            <td class="text-center">{!! Form::checkbox('Presenca', 'Sim') !!}</td>
                            <td class="text-center">{!! Form::checkbox('Presenca', 'Sim') !!}</td>
                            <td class="text-center">{!! Form::checkbox('Presenca', 'Sim') !!}</td>
                            <td class="text-center">{!! Form::checkbox('Presenca', 'Sim') !!}</td>
                            <td class="text-center">{!! Form::checkbox('Presenca', 'Sim') !!}</td>
                            <td class="text-center">{!! Form::checkbox('Presenca', 'Sim') !!}</td>
                            <td class="text-center">{!! Form::checkbox('Presenca', 'Sim') !!}</td>
                            <td class="text-center">{!! Form::checkbox('Presenca', 'Sim') !!}</td>
                            <td class="text-center">{!! Form::checkbox('Presenca', 'Sim') !!}</td>
                            <td class="text-center">{!! Form::checkbox('Presenca', 'Sim') !!}</td>
                            <td class="text-center">{!! Form::checkbox('Presenca', 'Sim') !!}</td>
                            <td class="text-center">{!! Form::checkbox('Presenca', 'Sim') !!}</td>
                            <td class="text-center">{!! Form::checkbox('Presenca', 'Sim') !!}</td>
                            <td class="text-center">{!! Form::checkbox('Presenca', 'Sim') !!}</td>
                            {{-- <td>
                                {!! Form::open(['route' => ['alunos.destroy', $aluno->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{!! route('alunos.edit', [$aluno->id]) !!}"
                                        class='btn btn-default btn-sm'><i class="glyphicon glyphicon-edit"></i></a>
                                </div>
                                {!! Form::close() !!}
                            </td> --}}
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
