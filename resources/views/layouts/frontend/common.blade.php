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
                <a class="small" href="#!">Home</a>
                <span class="mx-1">&middot;</span>
                <a class="small" href="#!">Eventos</a>
                <span class="mx-1">&middot;</span>
                <a class="small" href="#!">Palestrantes</a>
                <span class="mx-1">&middot;</span>
                <a class="small" href="#!">Contato</a>
                <span class="mx-1">&middot;</span>
                <a class="small" href="#!">Entrar</a>
                <span class="mx-1">&middot;</span>
                <a class="small" href="#!">Registar</a>
            </div>
        </div>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{ url('assets/frontend/js/scripts.js') }}"></script>
</body>
</html>
