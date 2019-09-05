<div class="table-responsive">
    <table class="table display datatable-list">
        <thead>
            <tr>
                <th></th>
                <th>Unidade</th>
                <th>CNPJ</th>
                <th>Endereço</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>UF</th>
                <th>Telefone 1</th>
                <th>Telefone 2</th>
                <th>Tipo</th>
                <th>Logotipo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($unidades as $unidade)
            <tr>
                <td class="text-center">
                    {{ Form::open(array('url' => 'escolherUnidade'))}}
                    {!! Form::hidden('idUnidade', $unidade->id) !!}
                    <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-unlock"></i> Logar</button>
                    {!! Form::close() !!}
                </td>
                <td>{!! $unidade->NomeUnidade !!}</td>
                <td>{!! $unidade->CNPJ !!}</td>
                <td>{!! $unidade->Endereco !!}</td>
                <td>{!! $unidade->Bairro !!}</td>
                <td>{!! $unidade->Cidade !!}</td>
                <td>{!! $unidade->UF !!}</td>
                <td>{!! $unidade->Telefone1 !!}</td>
                <td>{!! $unidade->Telefone2 !!}</td>
                <td>{!! $unidade->Tipo !!}</td>
                <td><img src="storage/{{$unidade->Logotipo}}" alt=""></td>
                <td>
                    {!! Form::open(['route' => ['unidades.destroy', $unidade->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('unidades.show', [$unidade->id]) !!}" class='btn btn-default btn-sm'><i
                                class="glyphicon glyphicon-zoom-in"></i></a>
                        <a href="{!! route('unidades.edit', [$unidade->id]) !!}" class='btn btn-default btn-sm'><i
                                class="glyphicon glyphicon-pencil"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' =>
                        'btn btn-danger btn-sm', 'onclick' => "return confirm('Você tem certeza que deseja deletar a
                        unidade selecionada?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
