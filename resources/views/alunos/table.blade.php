<div class="table-responsive">
    <table class="table display datatable-list" id="alunos-table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>RG</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th>Curso</th>
                <th>Turma</th>
                <th>Parcelamento</th>
                <th>Vencimento</th>
                <th>Mãe</th>
                <th>Pai</th>
                <th>Data do Cadastro</th>
                <th>Endereço</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>UF</th>
                <th>CEP</th>
                <th>Telefone</th>
                <th>Celular 1</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($alunos as $aluno)
            <tr>
                <td>{!! $aluno->Nome !!}</td>
                <td>{!! $aluno->RgAluno !!}</td>
                <td>{!! $aluno->CpfAluno !!}</td>
                <td>{!! $aluno->Email !!}</td>
                <td>{!! $aluno->Curso !!}</td>
                <td>{!! $aluno->Turma !!}</td>
                <td>{!! $aluno->Parcelamento !!}</td>
                <td>{!! $aluno->Vencimento !!}</td>
                <td>{!! $aluno->Mae !!}</td>
                <td>{!! $aluno->Pai !!}</td>
                <td>{!! $aluno->DataCadastro !!}</td>
                <td>{!! $aluno->Endereco !!}</td>
                <td>{!! $aluno->Bairro !!}</td>
                <td>{!! $aluno->Cidade !!}</td>
                <td>{!! $aluno->UF !!}</td>
                <td>{!! $aluno->CEP !!}</td>
                <td>{!! $aluno->Telefone !!}</td>
                <td>{!! $aluno->Celular1 !!}</td>
                <td>
                    {!! Form::open(['route' => ['alunos.destroy', $aluno->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('alunos.show', [$aluno->id]) !!}" class='btn btn-default btn-sm'><i
                                class="glyphicon glyphicon-zoom-in"></i></a>
                        <a href="{!! route('alunos.edit', [$aluno->id]) !!}" class='btn btn-default btn-sm'><i
                                class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' =>
                        'btn btn-danger btn-sm', 'onclick' => "return confirm('Tem certeza que você deseja deletar o aluno selecionado?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
