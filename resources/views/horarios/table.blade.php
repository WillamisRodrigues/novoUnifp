<div class="table-responsive">
    <table class="table display datatable-list">
        <thead>
            <tr>
                <th>Horário</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($horarios as $horario)
            <tr>
                <td>{!! $horario->Horario !!}</td>
                <td>
                    {!! Form::open(['route' => ['horarios.destroy', $horario->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('horarios.edit', [$horario->id]) !!}" class='btn btn-default btn-md'><i
                                class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' =>
                        'btn btn-danger btn-md', 'onclick' => "return confirm('Tem certeza que deseja excluir o horário selecionado?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
