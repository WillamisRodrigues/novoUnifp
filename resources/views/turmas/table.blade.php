<div class="table-responsive">
    <table class="table" id="turmas-table">
        <thead>
            <tr>
                <th>Curso</th>
                <th>Nome da Turma</th>
                <th>Dias da Semana</th>
                <th>Período</th>
                <th>Horário</th>
                <th>Data de Início</th>
                <th>Data de Término</th>
                <th>Duração das Aulas</th>
                <th>Professor</th>
                <th>Vagas</th>
                <th>Cronograma</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($turmas as $turma)
            <tr>
                <td>{!! $turma->Curso !!}</td>
                <td>{!! $turma->NomeTurma !!}</td>
                <td>{!! $turma->DiasDaSemana !!}</td>
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
                <td>{!! $turma->Horario !!}</td>
                <td>{!! $turma->DataInicio !!}</td>
                <td>{!! $turma->DataTermino !!}</td>
                <td>{!! $turma->DuracaoAulas !!}</td>
                <td>{!! $turma->Professor !!}</td>
                <td>{!! $turma->Vagas !!}</td>
                <td>{!! $turma->Cronograma !!}</td>
                <td>
                    {!! Form::open(['route' => ['turmas.destroy', $turma->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('turmas.show', [$turma->id]) !!}" class='btn btn-default btn-sm'><i
                                class="glyphicon glyphicon-zoom-in"></i></a>
                        <a href="{!! route('turmas.edit', [$turma->id]) !!}" class='btn btn-default btn-sm'><i
                                class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' =>
                        'btn btn-danger btn-sm', 'onclick' => "return confirm('Você tem certeza que deseja deletar a turma selecionada?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
