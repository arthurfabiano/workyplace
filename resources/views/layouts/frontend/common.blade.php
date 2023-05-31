<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Worby Place</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ url('assets/frontend/assets/favicon.ico') }}" />
    <!-- Custom Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ url('assets/frontend/css/styles.css') }}" rel="stylesheet" />
</head>
<body class="d-flex flex-column h-100">
<main class="flex-shrink-0">
    @include('layouts.frontend.header')

    @yield('content')
</main>
<!-- Footer-->
<footer class="bg-white py-4 mt-auto">
    <div class="container px-5">
        <div class="row align-items-center justify-content-between flex-column flex-sm-row">
            <div class="col-auto"><div class="small m-0">Desenvolvido por Arthur Fabiano 2023</div></div>
            <div class="col-auto">
                <a class="small" href="{{ route('site.index') }}">Home</a>
                <span class="mx-1">&middot;</span>
                <a class="small" href="{{ route('site.eventos') }}">Eventos</a>
                <span class="mx-1">&middot;</span>
                <a class="small" href="{{ route('site.palestrantes') }}">Palestrantes</a>
                <span class="mx-1">&middot;</span>
                <a class="small" href="{{ route('site.contato') }}">Contato</a>
                <span class="mx-1">&middot;</span>
                @if(Auth::check())
                    <a class="small" href="{{ route('admin.dashboard') }}">Acessar Painel</a>
                @endif
                @if(Auth::guest())
                    <a class="small" href="{{ route('login') }}">Entrar</a>
                    <span class="mx-1">&middot;</span>
                    <a class="small" href="{{ route('register') }}">Registar</a>
                @endif
            </div>
        </div>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{ url('assets/frontend/js/scripts.js') }}"></script>

<div class="modal fade" id="eventModalParticipant" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Evento</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('site.participar-evento') }}" method="POST">
                <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="full_name" class="col-form-label">Nome Completo:</label>
                            <input type="text" name="full_name" class="form-control" id="full_name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="text" name="email" class="form-control" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="col-form-label">Telefone:</label>
                            <input type="text" name="phone" class="form-control" id="phone">
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="event_id" class="form-control" id="id-event">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Quero Participar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const eventModalParticipant = document.getElementById('eventModalParticipant')
    if (eventModalParticipant) {
        eventModalParticipant.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget

            const titleEvent = button.getAttribute('data-event-title')
            const idEvent = button.getAttribute('data-event-id')

            const modalTitle = eventModalParticipant.querySelector('.modal-title')
            const modalBodyInput = eventModalParticipant.querySelector('.modal-footer input')

            modalTitle.textContent = `Evento ${titleEvent}`
            modalBodyInput.value = idEvent
        })
    }
</script>

</body>
</html>
