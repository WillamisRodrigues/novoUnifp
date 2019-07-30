<div class="table-responsive">
    <table class="table display datatable-list">
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Celular</th>
                <th>Telefone Fixo</th>
                <th>Cargo</th>
                <th>Setor</th>
                <th>Nascimento</th>
                <th>Estado Civil</th>
                <th>Observação</th>
                <th>Inativo</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($funcionarios as $funcionario)
            <tr>
                <td>{!! $funcionario->Nome !!}</td>
                <td>{!! $funcionario->Email !!}</td>
                <td>{!! $funcionario->Celular !!}</td>
                <td>{!! $funcionario->TelefoneFixo !!}</td>
                <td>{!! $funcionario->Cargo !!}</td>
                <td>{!! $funcionario->Setor !!}</td>
                <td>{!! $funcionario->Nascimento !!}</td>
                <td>{!! $funcionario->EstadoCivil !!}</td>
                <td>{!! $funcionario->Observacao !!}</td>
                <td>{!! $funcionario->Inativo !!}</td>
                <td>
                    {!! Form::open(['route' => ['funcionarios.destroy', $funcionario->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('funcionarios.show', [$funcionario->id]) !!}"
                            class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('funcionarios.edit', [$funcionario->id]) !!}"
                            class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
