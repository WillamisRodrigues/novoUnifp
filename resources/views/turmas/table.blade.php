<div class="table-responsive">
    <table class="table display datatable-list" id="turmas-table">
        <thead>
            <tr>
                <th>Curso</th>
                <th>Nome da Turma</th>
                <th>Dias da Semana</th>
                <th>Período</th>
                <th>Data de Início</th>
                <th>Data de Término</th>
                <th>Duração das Aulas</th>
                <th>Professor</th>
                <th>Vagas</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($turmas as $turma)

            <tr>
                <td>
                    @php
                        foreach ($cursos as $curso) {
                            if($curso->id == $turma->idCurso){
                                echo $curso->nomeCurso;
                            }
                        }
                    @endphp
                </td>
                <td>{!! $turma->NomeTurma !!}</td>
                <td>
                    @php
                        $str1 = str_replace(","," - ", $turma->DiasDaSemana);
                        $str2 = str_replace("\""," ", $str1);
                        $str3 = str_replace("]", "", $str2);
                        $str4 = str_replace("[", "", $str3);
                        echo $str4;
                        // print_r($turma->DiasDaSemana);
                        // foreach ($turma->DiasDaSemana as $dia) {
                        //     echo "$dia ";
                        // }
                    @endphp
                </td>
                <td>
                    @switch($turma->Periodo)
                        @case("Manha")
                            {!! "Manhã" !!}
                            @break
                        @case("Tarde")
                            {!! "Tarde" !!}
                            @break
                        @case("Noite")
                            {!! "Noite" !!}
                            @break
                        @default
                            {!! "Sem período definido" !!}
                    @endswitch
                </td>
                <td>
                    {!! date('d/m/Y', strtotime($turma->DataInicio)); !!}
                </td>
                <td>
                    {!! date('d/m/Y', strtotime($turma->DataTermino)); !!}
                </td>
                <td>{!! $turma->DuracaoAulas !!}</td>
                <td>
                    @php
                        foreach ($professores as $professor) {
                            if($professor->id == $turma->Professor){
                                echo $professor->Nome;
                            }
                        }
                    @endphp
                </td>
                <td>{!! $turma->Vagas !!}</td>
                <td>
                    {!! Form::open(['route' => ['turmas.destroy', $turma->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('turmas.show', [$turma->id]) !!}" class='btn btn-default btn-sm'><i
                                class="glyphicon glyphicon-zoom-in"></i></a>
                        <a href="{!! route('turmas.edit', [$turma->id]) !!}" class='btn btn-default btn-sm'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    </div>
                    {!! Form::close() !!}
                </td>
                <td><a href="/AlunosTurma/{!!$turma->id!!}" class="btn btn-primary btn-flat">Alunos/Matrículas</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
