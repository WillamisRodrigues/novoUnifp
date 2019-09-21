<div class="table-responsive">
    <table class="table display datatable-list">
        <thead>
            <tr>
                <th>Perfil de Acesso</th>
                <th>Descrição</th>
                <th>Editar Permissões</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nivelAcessos as $nivelAcesso)
            <tr>
                <td>{!! $nivelAcesso->name !!}</td>
                <td>{!! $nivelAcesso->description !!}</td>
                <td>
                    {!! Form::open(['route' => ['nivelAcessos.destroy', $nivelAcesso->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('nivelAcessos.edit', [$nivelAcesso->id]) !!}"
                            class='btn btn-default btn-md'><i class="glyphicon glyphicon-edit"></i></a>
                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' =>
                        'btn btn-danger btn-md', 'onclick' => "return confirm('Você tem certeza que deseja deletar o perfil de acesso?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
