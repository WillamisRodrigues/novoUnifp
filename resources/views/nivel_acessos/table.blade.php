<div class="table-responsive">
    <table class="table" id="nivelAcessos-table">
        <thead>
            <tr>
                <th>Perfil de Acesso</th>
                <th>Editar Permissões</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nivelAcessos as $nivelAcesso)
            <tr>
                <td>{!! $nivelAcesso->perfilAcesso !!}</td>
                <td>
                    {!! Form::open(['route' => ['nivelAcessos.destroy', $nivelAcesso->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('nivelAcessos.edit', [$nivelAcesso->id]) !!}"
                            class='btn btn-default btn-md'><i class="glyphicon glyphicon-edit"></i></a>
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
