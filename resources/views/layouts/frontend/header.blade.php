<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
    <div class="container px-5">
        <a class="navbar-brand" href="{{ route('site.index') }}"><span class="fw-bolder text-light">Workby Place</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                <li class="nav-item"><a class="nav-link" href="{{ route('site.index') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('site.eventos') }}">Eventos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('site.palestrantes') }}">Palestrantes</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('site.contato') }}">Contato</a></li>
                @if(Auth::check())
                    <li class="nav-item"><a class="nav-link text-warning" href="{{ route('admin.dashboard') }}">Acessar Painel</a></li>
                @endif
                @if(Auth::guest())
                    <li class="nav-item"><a class="nav-link text-warning" href="{{ route('login') }}">Entrar / Registar</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
