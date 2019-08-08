<div class="table-responsive">
    <table class="table display datatable-list" id="alunos-table">
        <thead>
            <tr>
                <th>Matrícula</th>
                <th>Nome</th>
                <th>Sexo</th>
                <th>CPF</th>
                <th>Status</th>
                <th>Frequência %</th>
                <th>Frequência AVA</th>
                <th>Termo Cancelamento</th>
                <th>Média</th>
                <th>Pagamentos</th>
                <th>Contrato</th>
                <th>Carnê</th>
                <th>Ações</th>
                <th>Pagamentos</th>
                <th>Notas</th>
                <th>Comunicados</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alunos as $aluno)
            <tr>
                <td>{!! $aluno->id !!}</td>
                <td>{!! $aluno->Nome !!}</td>
                <td>{!! $aluno->Sexo !!}</td>
                <td>{!! $aluno->CpfAluno !!}</td>
                <td>Status</td>
                <td>Frequência</td>
                <td><a href="{!! route('frequencias.show', [$aluno->id]) !!}" class="btn btn-primary btn-flat text-uppercase"><i class="fa fa-bars"> Frequência</i></a></td>
                <td>Termo Cancelamento</td>
                <td>Média</td>
                <td>Pagamentos</td>
                <td><a href="#" class="btn btn-flat btn-success"><i class="fa fa-print"></i>CT</a></td>
                <td><a href="#" class="btn btn-flat" style="border: 1px solid #D73925; color: #D73925"><i class="fa fa-print"></i>CN</a></td>
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
                <td><a href="{!! route('pagamentos.show', [$aluno->id]) !!}" class="btn btn-primary btn-flat text-uppercase"><i class="fa fa-bars"> Pagamentos (0)</i></a></td>
                <td><a href="notas" class="btn btn-primary btn-flat text-uppercase"><i class="fa fa-bars"> Notas (0)</i></a></td>
                <td><a href="{!! route('comunicados.show', [$aluno->id]) !!}" class="btn btn-primary btn-flat text-uppercase"><i class="fa fa-bars"> Comunicados (0)</i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
