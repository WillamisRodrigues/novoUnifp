<div class="table-responsive">
    <table class="table" id="comunicados-table">
        <thead>
            <tr>
                <th>Idaluno</th>
        <th>Comunicado</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($comunicados as $comunicados)
            <tr>
                <td>{!! $comunicados->idAluno !!}</td>
            <td>{!! $comunicados->Comunicado !!}</td>
                <td>
                    {!! Form::open(['route' => ['comunicados.destroy', $comunicados->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('comunicados.show', [$comunicados->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('comunicados.edit', [$comunicados->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
