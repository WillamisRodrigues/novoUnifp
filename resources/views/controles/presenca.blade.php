@extends('layouts.app')

@section('title', 'Controle de Presença')

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
        {!! Form::open(['id' => 'filtroPresença', 'route' => 'filtro.presenca']) !!}
        <p class="select-padrao col-md-3"> Selecione o curso:
            <select name="cursos" id="cursos" class="cursos">
                <option value="">Cursos</option>
                @foreach($cursos as $curso )
                <option value="{{ $curso->id }}">{{ $curso->nomeCurso }}</option>
                @endforeach
            </select>
        </p>
        <p class="select-padrao col-md-3"> Selecione a turma:
            <select name="turmas" id="turmas">
                <option value="">Turmas</option>
            </select>
        </p>
        {{-- <p class="select-padrao col-md-3"> Selecione o módulo:
            <select name="modulo" id="modulo">
                <option value="">Módulos</option>
            </select>
        </p> --}}
        <input type="hidden" id="idUnidade" name="unidade" value="{!! $unidade !!}">
        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i> Filtrar</button>
        {!! Form::close() !!}
    </div>

    <div class="box box-primary">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table display" id="alunos-table">
                    <thead>
                        <tr>
                            <th>Aluno</th>
                            <th class="text-center">Aula</th>
                            <th class="text-center">Presença</th>
                            <th class="text-center">Data</th>
                            <th class="text-center">Editar</th>
                        </tr>
                    </thead>
                    <tbody id="listaAlunos">
                        @foreach($frequencias as $frequencia)
                        <tr>
                            @foreach ($alunos as $aluno)
                            @if ($frequencia->idAluno == $aluno->id)
                            <td>
                                {{ str_pad($aluno->id, 8, '0', STR_PAD_LEFT) }} - {{ $aluno->Nome }}
                            </td>
                            <td class="text-center">{{ $frequencia->idAula }}</td>
                            <td class="text-center">
                                @if ($frequencia->Frequencia == 1)
                                    Presente
                                    @else
                                    Ausente
                                @endif
                            </td>
                            <td class="text-center">{{ date('d/m/Y', strtotime($frequencia->created_at)) }}</td>
                            <td class="text-center">
                                <a href="{{ route('frequencia.edit', $frequencia->idFrequencia) }}" class="btn btn-primary"><i class="fa fa-bars"></i></a>
                            </td>
                            @endif
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $(".cursos").change(function(){
            var curso_id=$(this).val();
            var unidade_id = document.getElementById("idUnidade").value;

            $.ajax({
                type: "GET",
                url: "api/getTurmas/" + unidade_id + "/" + curso_id,
                cache: false,
                success: function(turmas){
                    turmas.forEach(element => {
                        var selectTurmas = document.getElementById("turmas");
                        var opt = document.createElement("option");
                        opt.value= element.id;
                        opt.innerHTML = element.nome;

                        selectTurmas.appendChild(opt);
                        // index++
                    });
                }
            });
        });

        $(".cursos").change(function(){
            var curso_id=$(this).val();
            var unidade_id = document.getElementById("idUnidade").value;

            $.ajax({
                type: "GET",
                url: "api/getModulos/" + unidade_id + "/" + curso_id,
                cache: false,
                success: function(modulos){
                    modulos.forEach(element => {
                        var selectModulos = document.getElementById("modulo");
                        var opt = document.createElement("option");
                        opt.value= element.id;
                        opt.innerHTML = element.nome;

                        selectModulos.appendChild(opt);
                        // index++
                    });
                }
            });

        });

        // $('#filtroPresença').submit(function(e) {
        //     e.preventDefault();
        //     var formulario = $(this);

        //     $.ajax({
        //         type: "POST",
        //         data: formulario.serialize(),
        //         url: "api/filtroPresença/" + curso_id + "/" + turma_id + "/" + modulo_id,
        //         async: false
        //     }).done(function(data) {
        //         console.log("Sucesso!");
        //         console.log(formulario.serialize());
        //     }).fail(function() {
        //         console.log("Ops! Algo errado aconteceu.");
        //     })
        // });
    });

</script>
@endsection
