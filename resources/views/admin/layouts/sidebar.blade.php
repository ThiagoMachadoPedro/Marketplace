{{-- Inicio SIDBAR --}}
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">Nome da Empresa</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}"> Ms</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Painel de Controle</li>
            <li class="dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Painel</span></a>
                <ul class="dropdown-menu">
                    <li class=active><a class="nav-link" href="index-0.html">Configurações</a></li>
                    <li><a class="nav-link" href="{{route('slider.index')}}">Slider Destaque</a></li>
                </ul>
            </li>
            <li class="menu-header">Categorias</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Gerencia Categoria</span></a>
                <ul class="dropdown-menu">
                   <li><a class="nav-link" href="{{route('categoria.index')}}">Categorias</a></li>
                   <li><a class="nav-link" href="{{route('subcategoria.index')}}">Sub-Categorias</a></li>


                </ul>
            </li>
            <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li>



        </ul>

    </aside>
</div>
{{-- FIM SIDBAR --}}
