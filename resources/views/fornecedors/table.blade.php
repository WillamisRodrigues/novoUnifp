<div class="table-responsive">
    <table class="table display datatable-list">
        <thead>
            <tr>
                <th>Fornecedor</th>
                <th>Nome Fantasia</th>
                <th>CNPJ</th>
                <th>Endereço</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>UF</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Telefone 2</th>
                <th>Pessoa para Contato</th>
                <th>Observação</th>
                <th>Data de Cadastro</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($fornecedors as $fornecedor)
            <tr>
                <td>{!! $fornecedor->Fornecedor !!}</td>
                <td>{!! $fornecedor->NomeFantasia !!}</td>
                <td>{!! $fornecedor->CNPJ !!}</td>
                <td>{!! $fornecedor->Endereco !!}</td>
                <td>{!! $fornecedor->Bairro !!}</td>
                <td>{!! $fornecedor->Cidade !!}</td>
                <td>{!! $fornecedor->UF !!}</td>
                <td>{!! $fornecedor->Email !!}</td>
                <td>{!! $fornecedor->Telefone1 !!}</td>
                <td>{!! $fornecedor->Telefone2 !!}</td>
                <td>{!! $fornecedor->PessoaContato !!}</td>
                <td>{!! $fornecedor->Observacao !!}</td>
                <td>
                    {{-- {!! $fornecedor->DataCadastro !!} --}}
                    {!! date('d/m/Y', strtotime($fornecedor->DataCadastro)); !!}
                </td>
                <td>
                    {!! Form::open(['route' => ['fornecedors.destroy', $fornecedor->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('fornecedors.show', [$fornecedor->id]) !!}" class='btn btn-default btn-sm'><i
                                class="glyphicon glyphicon-zoom-in"></i></a>
                        <a href="{!! route('fornecedors.edit', [$fornecedor->id]) !!}" class='btn btn-default btn-sm'><i
                                class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' =>
                        'btn btn-danger btn-sm', 'onclick' => "return confirm('Você tem certeza que deseja excluir o
                        fornecedor selecionado?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
