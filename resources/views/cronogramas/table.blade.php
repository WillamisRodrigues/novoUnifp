<div class="table-responsive">
    <table class="table display datatable-list">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Aulas do Cronograma</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($cronogramas as $cronograma)
            <tr>
                <td>{!! $cronograma->Nome !!}</td>
                <td>
                    <a href="{!! route('aulasCronogramas.show', [$cronograma->id]) !!}" class="btn btn-primary"><i class="fa fa-bars"></i>
                        Aulas do Cronograma</a>
                </td>
                <td>
                    {!! Form::open(['route' => ['cronogramas.destroy', $cronograma->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('cronogramas.show', [$cronograma->id]) !!}" class='btn btn-default btn-sm'><i
                                class="glyphicon glyphicon-zoom-in"></i></a>
                        <a href="{!! route('cronogramas.edit', [$cronograma->id]) !!}" class='btn btn-default btn-sm'><i
                                class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' =>
                        'btn btn-danger btn-sm', 'onclick' => "return confirm('Você tem certeza que deseja deletar o
                        cronograma selecionado?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
