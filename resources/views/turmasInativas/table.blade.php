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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
