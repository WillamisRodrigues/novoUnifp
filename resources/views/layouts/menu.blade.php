<li class="dropdown menu-top-navbar">
    <!-- Menu Toggle Button -->
    <a href="/home"><i class="fa fa-area-chart"></i>
        Dashboard</a>
</li>

<li class="dropdown menu-top-navbar">
    <!-- Menu Toggle Button -->
    <a href="https://fpeduc.com/loja/" target="_blank"><i class="fa fa-shopping-basket"></i>
        E-commerce</a>
</li>

<li class="dropdown menu-top-navbar">
    <!-- Menu Toggle Button -->
    <a href="https://fpeduc.com/unifp/treinamentos/" target="_blank"><i class="fa fa-television"></i>
        Treinamentos</a>
</li>

<li class="dropdown menu-top-navbar">
    <!-- Menu Toggle Button -->
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

<li class="dropdown menu-top-navbar">
    <!-- Menu Toggle Button -->
    <a href="#" class="dropdown-toggle drop-menu-item-main" data-toggle="dropdown"><i class="fa  fa-keyboard-o"></i>
        Secretaria <i class="glyphicon glyphicon-chevron-down"></i> </a>
    <ul class="dropdown-menu drop-menu-item-top">

    </ul>
</li>

<li class="dropdown menu-top-navbar">
    <!-- Menu Toggle Button -->
    <a href="#" class="dropdown-toggle drop-menu-item-main" data-toggle="dropdown"><i class="fa fa-money"></i>
        Financeiro <i class="glyphicon glyphicon-chevron-down"></i> </a>
    <ul class="dropdown-menu drop-menu-item-top">

    </ul>
</li>

<li class="dropdown menu-top-navbar">
    <!-- Menu Toggle Button -->
    <a href="#" class="dropdown-toggle drop-menu-item-main" data-toggle="dropdown"><i class="fa fa-file-text-o"></i>
        Relatórios <i class="glyphicon glyphicon-chevron-down"></i> </a>
    <ul class="dropdown-menu drop-menu-item-top">

    </ul>
</li>

<li class="dropdown menu-top-navbar">
    <!-- Menu Toggle Button -->
    <a href="#" class="dropdown-toggle drop-menu-item-main" data-toggle="dropdown"><i class="fa fa-gear"></i> Manutenção
        <i class="glyphicon glyphicon-chevron-down"></i> </a>
    <ul class="dropdown-menu drop-menu-item-top">
        <li class="{{ Request::is('usuarios*') ? 'active' : '' }}">
            <a href="{!! route('usuarios.index') !!}"><i class="fa-user-circle-o fa"></i><span>Usuarios</span></a>
        </li>
    </ul>
</li>

<li class="dropdown menu-top-navbar">
    <!-- Menu Toggle Button -->
    <a href="#" class="dropdown-toggle drop-menu-item-main" data-toggle="dropdown"><i class="fa fa-folder-o"></i>
        Administrador <i class="glyphicon glyphicon-chevron-down"></i>
    </a>
    <ul class="dropdown-menu drop-menu-item-top">
        <li class="{{ Request::is('unidades*') ? 'active' : '' }}">
            <a href="{!! route('unidades.index') !!}"><i class="fa fa-bank"></i><span>Unidades</span></a>
        </li>
        <li class="{{ Request::is('escolaridades*') ? 'active' : '' }}">
            <a href="{!! route('escolaridades.index') !!}"><i class="fa fa-square"></i><span>Escolaridades</span></a>
        </li>
        <li class="{{ Request::is('tempoAulas*') ? 'active' : '' }}">
            <a href="{!! route('tempoAulas.index') !!}"><i class="fa fa-star"></i><span>Tempo Aulas</span></a>
        </li>
        <li class="{{ Request::is('nivelAcessos*') ? 'active' : '' }}">
            <a href="{!! route('nivelAcessos.index') !!}"><i class="fa fa-list"></i><span>Niveis de acesso</span></a>
        </li>
    </ul>
</li>
