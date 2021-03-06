<div class="table-responsive">
    <table class="table display datatable-list">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Observação</th>
                <th>Retorno</th>
                <th>Como Conheceu</th>
                <th>Data Atendimento</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($visitantes as $visitante)
            <tr>
                <td>{!! $visitante->nome !!}</td>
                <td>{!! $visitante->telefone !!}</td>
                <td>{!! $visitante->email !!}</td>
                <td style="max-width: 150px; ">{!! $visitante->observacao !!}</td>
                <td>
                    {!! date('H:m', strtotime($visitante->horaRetorno)); !!}
                    {!! date('d/m/Y', strtotime($visitante->dataRetorno)); !!}
                </td>
                <td>{!! $visitante->comoConheceu !!}</td>
                <td>
                    {!! date('d/m/Y', strtotime($visitante->dataAtendimento)); !!}
                </td>
                <td>
                    @switch($visitante->status)
                        @case('SemInteresse')
                            Sem interesse
                            @break
                        @case('RetornarContato')
                            A retornar contato
                            @break
                        @default
                            {{$visitante->status}}
                    @endswitch
                </td>
                <td>
                    {!! Form::open(['route' => ['visitantes.destroy', $visitante->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('visitantes.show', [$visitante->id]) !!}" class='btn btn-default btn-sm'><i
                                class="glyphicon glyphicon-zoom-in"></i></a>
                        <a href="{!! route('visitantes.edit', [$visitante->id]) !!}" class='btn btn-default btn-sm'><i
                                class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' =>
                        'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
