<div class="table-responsive">

    <table class="table display datatable-list">
        <thead>
            <tr>
                <th>Prioridade</th>
                <th>Data</th>
                <th>Horario</th>
                <th>Assunto</th>
                <th>Resolvido</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($agendas as $agenda)
            <tr>
                <td>{!! $agenda->prioridade !!}</td>
                <td>{!! $agenda->Data !!}</td>
                <td>{!! $agenda->Hora !!}</td>
                <td>{!! $agenda->Assunto !!}</td>
                <td>{!! $agenda->Resolvido !!}</td>
                <td>
                    {!! Form::open(['route' => ['agendas.destroy', $agenda->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('agendas.show', [$agenda->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('agendas.edit', [$agenda->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' =>
                        'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
