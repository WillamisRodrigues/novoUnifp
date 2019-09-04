<div class="table-responsive">
        <table class="table display datatable-list">
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Data de Nascimento</th>
                <th>Perfil</th>
                <th>Unidade</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td>{!! $usuario->name  !!}</td>
                <td>{!! $usuario->email !!}</td>
                <td>
                    {!! date('d/m/Y', strtotime($usuario->nascimento)); !!}
                </td>
                <td>
                    @switch($usuario->nivelAcesso)
                        @case(0)
                            {!! "Administrador" !!}
                            @break
                        @case(1)
                            {!! "Supervisor" !!}
                            @break
                        @case(2)
                            {!! "Gestor" !!}
                            @break
                        @case(3)
                            {!! "Secretaria" !!}
                            @break
                        @case(4)
                            {!! "Professor" !!}
                            @break
                        @case(5)
                            {!! "Comercial" !!}
                            @break
                        @case(6)
                            {!! "Atendimento" !!}
                            @break
                        @default
                            {!! "Sem perfil definido" !!}
                    @endswitch
                </td>
                {{-- Falta fazer switch case para unidades  --}}
                <td>
                    {{-- {!! $usuario->unidadeEscolar !!} --}}
                    @php
                        foreach ($unidades as $unidade) {
                            if($unidade->id == $usuario->idUnidade){
                                echo $unidade->NomeUnidade;
                            }
                        }
                        if(!$usuario->idUnidade){
                            echo "Administrador";
                        }
                    @endphp
                </td>
                <td>
                    {!! Form::open(['route' => ['usuarios.destroy', $usuario->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('usuarios.show', [$usuario->id]) !!}" class='btn btn-default btn-sm'><i
                                class="glyphicon glyphicon-zoom-in"></i></a>
                        <a href="{!! route('usuarios.edit', [$usuario->id]) !!}" class='btn btn-default btn-sm'><i
                                class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' =>
                        'btn btn-danger btn-sm', 'onclick' => "return confirm('Tem certeza que deseja excluir o usuário?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
