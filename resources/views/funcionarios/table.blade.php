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
                <th>Data de Nascimento</th>
                <th>Estado Civil</th>
                <th>Observação</th>
                <th>Status</th>
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
                <td>
                    {!! date('d/m/Y', strtotime($funcionario->Nascimento)); !!}
                </td>
                <td>{!! $funcionario->EstadoCivil !!}</td>
                <td>{!! $funcionario->Observacao !!}</td>
                <td>
                    {{-- {!! $funcionario->Inativo !!} --}}
                    @switch($funcionario->Inativo)
                        @case("Sim")
                            {!! "Ativo" !!}
                            @break
                        @case("Nao")
                            {!! "Inativo" !!}
                            @break
                        @default
                            {!! "Sem período definido" !!}
                            @break
                    @endswitch
                </td>
                <td>
                    {!! Form::open(['route' => ['funcionarios.destroy', $funcionario->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('funcionarios.show', [$funcionario->id]) !!}"
                            class='btn btn-default btn-sm'><i class="glyphicon glyphicon-zoom-in"></i></a>
                        <a href="{!! route('funcionarios.edit', [$funcionario->id]) !!}"
                            class='btn btn-default btn-sm'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' =>
                        'btn btn-danger btn-sm', 'onclick' => "return confirm('Tem certeza que deseja excluir o
                        funcionário?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
