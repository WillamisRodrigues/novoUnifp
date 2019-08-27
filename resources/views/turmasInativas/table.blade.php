<div class="table-responsive">
    <table class="table display datatable-list" id="turmas-table">
        <thead>
            <tr>
                <th>Curso</th>
                <th>Nome da Turma</th>
                <th>Dias da Semana</th>
                <th>Período</th>
                {{-- <th>Horário</th> --}}
                <th>Data de Início</th>
                <th>Data de Término</th>
                <th>Duração das Aulas</th>
                <th>Professor</th>
                <th>Vagas</th>
                <th>Cronograma</th>
            </tr>
        </thead>
        <tbody>
            @foreach($turmas as $turma)
            <tr>
                <td>{!! $turma->Curso !!}</td>
                <td>{!! $turma->NomeTurma !!}</td>
                <td>
                    {!! date('d/m/Y', strtotime($turma->DiasDaSemana)); !!}
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
                {{-- <td>
                    {!! date('H:m', strtotime($turma->Horario)); !!}
                </td> --}}
                <td>
                    {!! date('d/m/Y', strtotime($turma->DataInicio)); !!}
                </td>
                <td>
                    {!! date('d/m/Y', strtotime($turma->DataTermino)); !!}
                </td>
                <td>{!! $turma->DuracaoAulas !!}</td>
                <td>{!! $turma->Professor !!}</td>
                <td>{!! $turma->Vagas !!}</td>
                <td>{!! $turma->Cronograma !!}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
