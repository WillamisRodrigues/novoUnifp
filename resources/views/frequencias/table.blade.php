<div class="table-responsive">
    <table class="table" id="frequencias-table">
        <thead>
            <tr>
                <th>Idaluno</th>
        <th>Idturma</th>
        <th>Idaula</th>
        <th>Frequencia</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($frequencias as $frequencia)
            <tr>
                <td>{!! $frequencia->idAluno !!}</td>
            <td>{!! $frequencia->idTurma !!}</td>
            <td>{!! $frequencia->idAula !!}</td>
            <td>{!! $frequencia->Frequencia !!}</td>
                <td>
                    {!! Form::open(['route' => ['frequencias.destroy', $frequencia->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('frequencias.show', [$frequencia->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('frequencias.edit', [$frequencia->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
