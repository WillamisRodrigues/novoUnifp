<!-- Menu Toggle Button -->
<li class="dropdown menu-top-navbar">
    <a href="/home"><i class="fa fa-area-chart"></i>
        Dashboard</a>
</li>

<!-- Menu Toggle Button -->
<li class="dropdown menu-top-navbar">
    <a href="https://fpeduc.com/loja/" target="_blank"><i class="fa fa-shopping-basket"></i>
        E-commerce</a>
</li>

<!-- Menu Toggle Button -->
<li class="dropdown menu-top-navbar">
    <a href="https://fpeduc.com/unifp/treinamentos/" target="_blank"><i class="fa fa-television"></i>
        Treinamentos</a>
</li>

<!-- Menu Toggle Button -->
<li class="dropdown menu-top-navbar">
    <a href="#" class="dropdown-toggle drop-menu-item-main" data-toggle="dropdown"><i
            class="glyphicon glyphicon-calendar"></i> Agenda <i class="glyphicon glyphicon-chevron-down"></i> </a>
    <ul class="dropdown-menu drop-menu-item-top">
        <li class="{{ Request::is('agendas*') ? 'active' : '' }}">
            <a href="{!! route('agendas.create') !!}" style="display: inline-block"><i
                    class="glyphicon glyphicon-calendar"></i>Agenda Pessoal</a>
        </li>
        <li class="{{ Request::is('agendas*') ? 'active' : '' }}">
            <a href="{!! route('agendas.index') !!}" style="display: inline-block"><i
                    class="glyphicon glyphicon-calendar"></i>Agenda Arquivada</a>
        </li>
    </ul>
</li>

<!-- Menu Toggle Button -->
<li class="dropdown menu-top-navbar">
    <a href="#" class="dropdown-toggle drop-menu-item-main" data-toggle="dropdown"><i class="fa  fa-keyboard-o"></i>
        Secretaria <i class="glyphicon glyphicon-chevron-down"></i> </a>
    <ul class="dropdown-menu drop-menu-item-top">
        <li class="{{ Request::is('visitantes*') ? 'active' : '' }}">
            <a href="{!! route('visitantes.index') !!}"><i class="fa fa-users"></i><span>Visitantes
                    (Interessados)</span></a>
        </li>
        <li class="{{ Request::is('alunos*') ? 'active' : '' }}">
            <a href="{!! route('alunos.index') !!}"><i class="fa fa-graduation-cap"></i><span>Alunos /
                    Matrículas</span></a>
        </li>
        <li class="{{ Request::is('cursos*') ? 'active' : '' }}">
            <a href="{!! route('cursos.index') !!}"><i class="fa fa-cube"></i><span>Cursos</span></a>
        </li>
        <li class="{{ Request::is('cronogramas*') ? 'active' : '' }}">
            <a href="{!! route('cronogramas.index') !!}"><i class="fa fa-bars"></i><span>Cronogramas</span></a>
        </li>
        <li class="{{ Request::is('turmas*') ? 'active' : '' }}">
            <a href="{!! route('turmas.index') !!}"><i class="fa fa-list"></i><span>Turmas Ativas</span></a>
        </li>
        <li class="{{ Request::is('turmas*') ? 'active' : '' }}">
            <a href="{!! route('turmasInativas.index') !!}"><i class="fa fa-list"></i><span>Turmas Inativas</span></a>
        </li>

    </ul>
</li>

<!-- Menu Toggle Button -->
<li class="dropdown menu-top-navbar">
    <a href="#" class="dropdown-toggle drop-menu-item-main" data-toggle="dropdown"><i class="fa fa-money"></i>
        Financeiro <i class="glyphicon glyphicon-chevron-down"></i> </a>
    <ul class="dropdown-menu drop-menu-item-top">
        <li class="{{ Request::is('caixas*') ? 'active' : '' }}">
            <a href="{!! route('caixas.index') !!}"><i class="fa fa-money"></i><span>Caixa do Dia</span></a>
        </li>
        <li class="{{ Request::is('caixas*') ? 'active' : '' }}">
            <a href="{!! route('lancamentos.index') !!}"><i class="fa fa-money"></i><span>Lançamentos</span></a>
        </li>
        <li class="{{ Request::is('centroCustos*') ? 'active' : '' }}">
            <a href="{!! route('centroCustos.index') !!}"><i class="fa fa-cube"></i><span>Centro Custos</span></a>
        </li>
        <li class="{{ Request::is('formasPagamentos*') ? 'active' : '' }}">
            <a href="{!! route('formasPagamentos.index') !!}"><i class="fa fa-cube"></i><span>Formas
                    Pagamentos</span></a>
        </li>
    </ul>
</li>

<!-- Menu Toggle Button -->
<li class="dropdown menu-top-navbar">
    <a href="#" class="dropdown-toggle drop-menu-item-main" data-toggle="dropdown"><i class="fa fa-file-text-o"></i>
        Relatórios <i class="glyphicon glyphicon-chevron-down"></i> </a>
    <ul class="dropdown-menu drop-menu-item-top">

    </ul>
</li>

<!-- Menu Toggle Button -->
<li class="dropdown menu-top-navbar">
    <a href="#" class="dropdown-toggle drop-menu-item-main" data-toggle="dropdown"><i class="fa fa-gear"></i> Manutenção
        <i class="glyphicon glyphicon-chevron-down"></i> </a>
    <ul class="dropdown-menu drop-menu-item-top">
        <li class="{{ Request::is('funcionarios*') ? 'active' : '' }}">
            <a href="{!! route('funcionarios.index') !!}"><i
                    class="fa fa-user-circle-o"></i><span>Funcionários</span></a>
        </li>
        <li class="{{ Request::is('fornecedors*') ? 'active' : '' }}">
            <a href="{!! route('fornecedors.index') !!}"><i
                    class="fa fa-address-card-o"></i><span>Fornecedores</span></a>
        </li>
        <li class="{{ Request::is('horarios*') ? 'active' : '' }}">
            <a href="{!! route('horarios.index') !!}"><i class="fa fa-clock-o"></i><span>Horários</span></a>
        </li>
        <li class="{{ Request::is('diasSemanas*') ? 'active' : '' }}">
            <a href="{!! route('diasSemanas.index') !!}"><i class="fa fa-list"></i><span>Dias de Aula</span></a>
        </li>
        <li class="{{ Request::is('usuarios*') ? 'active' : '' }}">
            <a href="{!! route('usuarios.index') !!}"><i class="fa-user-circle-o fa"></i><span>Usuários</span></a>
        </li>
    </ul>
</li>

<!-- Menu Toggle Button -->
<li class="dropdown menu-top-navbar">
    <a href="#" class="dropdown-toggle drop-menu-item-main" data-toggle="dropdown"><i class="fa fa-folder-o"></i>
        Administrador <i class="glyphicon glyphicon-chevron-down"></i>
    </a>
    <ul class="dropdown-menu drop-menu-item-top">
        <li class="{{ Request::is('unidades*') ? 'active' : '' }}">
            <a href="{!! route('unidades.index') !!}"><i class="fa fa-bank"></i><span>Escolas / Contratos</span></a>
        </li>
        <li class="{{ Request::is('escolaridades*') ? 'active' : '' }}">
            <a href="{!! route('escolaridades.index') !!}"><i class="fa fa-square"></i><span>Escolaridades</span></a>
        </li>
        <li class="{{ Request::is('tempoAulas*') ? 'active' : '' }}">
            <a href="{!! route('tempoAulas.index') !!}"><i class="fa fa-star"></i><span>Tempo de Aula</span></a>
        </li>
        <li class="{{ Request::is('ajudas*') ? 'active' : '' }}">
            <a href="{!! route('ajudas.index') !!}"><i class="fa fa-question-circle"></i><span>Edição da
                    Ajuda</span></a>
        </li>
        <li class="{{ Request::is('nivelAcessos*') ? 'active' : '' }}">
            <a href="{!! route('nivelAcessos.index') !!}"><i class="fa fa-list"></i><span>Perfil de Acesso</span></a>
        </li>
    </ul>
</li>
