<div class="table-responsive">
        <table class="table display datatable-list">
        <thead>
            <tr>
                <th>Página</th>
                <th>Ticket</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($ajudas as $ajuda)
            <tr>
                <td>{!! $ajuda->Pagina !!}</td>
                <td>{!! $ajuda->Ticket !!}</td>
                <td>
                    {!! Form::open(['route' => ['ajudas.destroy', $ajuda->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('ajudas.show', [$ajuda->id]) !!}" class='btn btn-default btn-md'><i
                                class="glyphicon glyphicon-zoom-in"></i></a>
                        <a href="{!! route('ajudas.edit', [$ajuda->id]) !!}" class='btn btn-default btn-md'><i
                                class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' =>
                        'btn btn-danger btn-md', 'onclick' => "return confirm('Tem certeza que deseja excluir o ticket selecionado?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
