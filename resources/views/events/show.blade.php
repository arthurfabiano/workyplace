@extends('layouts.admin.common')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-12">
                    <h1 class="mt-4">Editar Evento #{{ $event->id }}</h1>
                    <hr>
                    <ol class="breadcrumb mb-4">
                        <a href="{{ url('/events') }}" title="Back" class="me-lg-1"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</button></a>
                        <a href="{{ url('/events/' . $event->id . '/edit') }}" title="Edit Event" class="me-lg-1"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square" aria-hidden="true"></i> Editar</button></a>

                        <form method="POST" action="{{ url('events' . '/' . $event->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Event" class="me-lg-1" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> Deletar</button>
                        </form>
                    </ol>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Evento #{{ $event->id }}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Imagem</th>
                                    <td><img width="50px" src="{{ $event->image ? url("storage/{$event->image}") : url('assets/frontend/assets/profile.png') }}"> </td>
                                </tr>
                                <tr>
                                    <th>Palestrante</th>
                                    <td>{{ $event->speaker->name }}</td>
                                </tr>
                                <tr>
                                    <th> Título </th>
                                    <td> {{ $event->title }} </td>
                                </tr>
                                <tr>
                                    <th> Descrição </th>
                                    <td> {{ $event->description }} </td>
                                </tr>
                                <tr>
                                    <th> Tópicos </th>
                                    <td>
                                        @foreach($topics as $topic)
                                            {{ $topic }}
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th> Data e Hora de Início </th>
                                    <td> {{ data_iso_para_br($event->start_date) }}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Data e Hora de Término </th>
                                    <td> {{ data_iso_para_br($event->finish_date) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Eventos
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $event->participant as $item )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->full_name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>
                                    <a href="{{ url('/participants/' . $item->id) }}" title="View Event"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Visualizar</button></a>
                                    <a href="{{ url('/participants/' . $item->id . '/edit') }}" title="Edit Event"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square" aria-hidden="true"></i> Editar</button></a>

                                    <form method="POST" action="{{ url('/participants' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Event" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> Deletar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Desenvolvido por Arthur Fabiano - 2023</div>
            </div>
        </div>
    </footer>
</div>
@endsection
