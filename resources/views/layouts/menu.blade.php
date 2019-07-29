<li class="dropdown menu-top-navbar">
    <!-- Menu Toggle Button -->
    <a href="#" class="dropdown-toggle drop-menu-item-main" data-toggle="dropdown"><i class="fa fa-area-chart"></i>
        Dashboard <i class="glyphicon glyphicon-chevron-down"></i> </a>
    <ul class="dropdown-menu drop-menu-item-top">

    </ul>
</li>

<li class="dropdown menu-top-navbar">
    <!-- Menu Toggle Button -->
    <a href="#" class="dropdown-toggle drop-menu-item-main" data-toggle="dropdown"><i class="icon ion-md-basket"></i>
        E-commerce <i class="glyphicon glyphicon-chevron-down"></i> </a>
    <ul class="dropdown-menu drop-menu-item-top">

    </ul>
</li>

<li class="dropdown menu-top-navbar">
    <!-- Menu Toggle Button -->
    <a href="#" class="dropdown-toggle drop-menu-item-main" data-toggle="dropdown"><i class="fa fa-television"></i>
        Treinamentos <i class="glyphicon glyphicon-chevron-down"></i> </a>
    <ul class="dropdown-menu drop-menu-item-top">

    </ul>
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
    </ul>
</li>
