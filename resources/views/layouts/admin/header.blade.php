<!-- Navbar Brand-->
<a class="navbar-brand ps-3" href="{{ route('admin.dashboard') }}">Worby Place</a>
<!-- Sidebar Toggle-->
<button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
<!-- Navbar Search-->
<form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
    <div class="input-group">
    </div>
</form>
<!-- Navbar-->
<ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ route('users.index') }}">Usuários</a></li>
            <li><a class="dropdown-item" href="{{ route('events.index') }}">Eventos</a></li>
            <li><a class="dropdown-item" href="{{ route('rooms.index') }}">Salas</a></li>
            <li><a class="dropdown-item" href="{{ route('speakers.index') }}">Palestrantes</a></li>
            <li><a class="dropdown-item" href="{{ route('participants.index') }}">Participantes</a></li>
            <li><hr class="dropdown-divider" /></li>
            <li><a class="dropdown-item" href="{{ route('site.index') }}" target="_blank">Ver Site</a></li>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-power-off mr-2"></i> Sair
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </li>
</ul>

