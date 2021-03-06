<div class="table-responsive">
    <table class="table display datatable-list" id="cursos-table">
        <thead>
            <tr>
                <th>Nome do Curso</th>
                <th>Quantidade de Aulas</th>
                <th>Carga Horária</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($cursos as $curso)
            <tr>
                <td>{!! $curso->nomeCurso !!}</td>
                <td>{!! $curso->QtdeAulas !!} Aulas</td>
                <td>{!! $curso->CargaHoraria !!} Horas</td>
                <td>
                    {!! Form::open(['route' => ['cursos.destroy', $curso->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('cursos.show', [$curso->id]) !!}" class='btn btn-default btn-sm'><i
                                class="glyphicon glyphicon-zoom-in"></i></a>
                        <a href="{!! route('cursos.edit', [$curso->id]) !!}" class='btn btn-default btn-sm'><i
                                class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' =>
                        'btn btn-danger btn-sm', 'onclick' => "return confirm('Tem certeza que deseja deletar o curso
                        selecionado?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
                <td><a href="{!! route('formasPagamentos.show', [$curso->id]) !!}"
                        class="btn btn-primary btn-sm btn-flat"><i class="fa fa-bars"></i> Forma de Parcelamento</a>
                </td>
                <td><a href="turmasCursos/{!! $curso->id !!}" class="btn btn-primary btn-sm btn-flat"><i
                            class="fa fa-bars"></i> Turmas Ativas</a></td>
                <td><a href="{!! route('contratos.show', [$curso->id]) !!}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-bars"></i> Contrato</a></td>
                <td><a href="{!! route('modulos.show', [$curso->id]) !!}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-bars"></i> Módulos</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
