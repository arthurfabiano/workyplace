<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro em Evento</title>
</head>
<body>
    <div class="px-4 py-5 my-5 text-center">
        <h1 style="background-color: #e9ebec; padding: 10px; text-align: center;">Inscrito em Evento</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4"><b>Title:</b> {{ $event->title }}</p>
            <p class="lead mb-4"><b>Data Início:</b> {{ $event->start_date }}</p>
            <p class="lead mb-4"><b>Data Fim:</b> {{ $event->finish_date }}</p>
            <p class="lead mb-4"><b>Descrição:</b> {{ $event->description }}</p>
        </div>
        <h1 style="background-color: #e9ebec; padding: 10px; text-align: center;">Worby Place</h1>
    </div>
</body>
</html>
