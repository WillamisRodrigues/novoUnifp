<div class="table-responsive">
    <table class="table display datatable-list" id="aulasCronogramas-table">
        <thead>
            <tr>
                <th>Nome da Aula</th>
                <th>Data da Aula</th>
                <th>Planejamento</th>
                <th>Relatorio do Professor</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($aulasCronogramas as $aulasCronograma)
            <tr>
                <td>{!! $aulasCronograma->NomeAula !!}</td>
                <td>
                    {!! date('d/m/Y', strtotime($aulasCronograma->DataAula)); !!}
                </td>
                <td>{!! $aulasCronograma->Planejamento !!}</td>
                <td>{!! $aulasCronograma->RelatorioProfessor !!}</td>
                <td>
                    {!! Form::open(['route' => ['aulasCronogramas.destroy', $aulasCronograma->id], 'method' =>
                    'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('aulasCronogramas.show', [$aulasCronograma->id]) !!}"
                            class='btn btn-default btn-sm'><i class="glyphicon glyphicon-zoom-in"></i></a>
                        <a href="{!! route('aulasCronogramas.edit', [$aulasCronograma->id]) !!}"
                            class='btn btn-default btn-sm'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' =>
                        'btn btn-danger btn-sm', 'onclick' => "return confirm('Tem certeza que deseja deletar o cronograma selecionado?')"])
                        !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
