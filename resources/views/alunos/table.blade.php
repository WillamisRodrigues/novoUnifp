<div class="table-responsive">
    <table class="table display datatable-list" id="alunos-table">
        <thead>
            <tr>
                <th>Matrícula</th>
                <th class="text-center">Nome</th>
                <th>Sexo</th>
                <th>CPF</th>
                <th>Status</th>
                <th>Frequência %</th>
                <th>Frequência AVA</th>
                <th class="text-center">Termo<br>Cancelamento</th>
                {{-- <th>Média</th> --}}
                <th>Pagamentos</th>
                <th>Contrato</th>
                <th>Carnê</th>
                @canAtLeast(['alunos.edit'])
                <th>Ações</th>
                @endCanAtLeast
                <th>Pagamentos</th>
                {{-- <th>Notas</th> --}}
                <th>Comunicados</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alunos as $aluno)
            <tr>
                <td class="text-center">
                    {!! str_pad($aluno->id, 8, '0', STR_PAD_LEFT) !!}
                </td>
                <td>{!! $aluno->Nome !!}</td>
                <td class="text-center">
                    @if($aluno->Sexo == 'Masculino')
                        {!! 'M' !!}
                    @else
                        {!! 'F' !!}
                    @endif
                </td>
                <td>{!! $aluno->CpfAluno !!}</td>
                <td>{!! $aluno->Status !!}</td>
                <td class="text-center">
                    {{ App\Http\Controllers\FrequenciaController::frequencia($aluno->id) }}
                </td>
                <td><a href="{!! route('frequencias.show', [$aluno->id]) !!}"
                        class="btn btn-primary btn-flat text-uppercase"><i class="fa fa-bars"> Frequência</i></a></td>
                <td>
                    @if ($aluno->Status == "Desistente")
                        <a href="/termoCancelamento/{!! $aluno->id !!}" target="_blank" class="btn btn-flat botao-cancelamento" style="border: 1px solid #D73925; color: #D73925; background-color:white"> <i class="fa fa-print"></i> Cancelamento </a>
                    @endif
                </td>
                {{-- <td class="text-center">
                    10
                </td> --}}
                <td>
                    {{-- Pagamentos --}}
                    @php
                        $resultado = App\Http\Controllers\RelatoriosController::pagamentos($aluno->id);
                        echo $resultado;
                    @endphp
                </td>
                <td>
                    <a href="gerarContrato/{!!$aluno->id!!}" target="_blank" class="btn btn-flat btn-success">
                        <i class="fa fa-print"></i>CT
                    </a>
                </td>
                <td>
                    <a href="gerarCarne/{!!$aluno->id!!}" target="_blank" class="btn btn-flat botao-cancelamento"
                        style="border: 1px solid #D73925; color: #D73925">
                        <i class="fa fa-print"></i>CN
                    </a>
                </td>
                @canAtLeast(['alunos.edit'])
                <td>
                    {!! Form::open(['route' => ['alunos.destroy', $aluno->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('alunos.show', [$aluno->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-zoom-in"></i></a>
                        <a href="{!! route('alunos.edit', [$aluno->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                            @canAtLeast(['alunos.delete'])
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' =>
                        'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que você deseja deletar o
                        aluno selecionado?')"]) !!}
                            @endCanAtLeast
                    </div>
                    {!! Form::close() !!}
                </td>
                @endCanAtLeast
                <td><a href="{!! route('pagamentos.show', [$aluno->id]) !!}"
                        class="btn btn-primary btn-flat text-uppercase"><i class="fa fa-bars"> Pagamentos</i></a>
                </td>
                {{-- <td><a href="notas/{!! $aluno->id !!}" class="btn btn-primary btn-flat text-uppercase"><i class="fa fa-bars"> Notas</i></a></td> --}}
                <td><a href="{!! route('comunicados.show', [$aluno->id]) !!}"
                        class="btn btn-primary btn-flat text-uppercase"><i class="fa fa-bars"> Comunicados</i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="4">
                    
                </td>
            </tr>
        </tfoot>
    </table>
</div>
