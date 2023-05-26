@extends('layouts.admin.common')

@section('content')
<div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="row">
                    <div class="col-12">
                        <h1 class="mt-4">Lista de Eventos</h1>
                        <hr>
                        <ol class="breadcrumb mb-4">
                            <a href="{{ url('/events/create') }}" class="btn btn-success btn-sm" title="Add New Event">
                                <i class="fa fa-plus" aria-hidden="true"></i> Criar Evento
                            </a>
                        </ol>
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
                                <th>Imagem</th>
                                <th>Palestrante</th>
                                <th>Titúlo</th>
                                <th>Data e Hora de Início</th>
                                <th>Data e Hora de Término</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($events as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img width="25px" src="{{ $item->image ? url("storage/{$item->image}") : url('assets/frontend/assets/profile.png') }}"></td>
                                    <td>{{ $item->speaker->name }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ data_iso_para_br($item->start_date) }}</td>
                                    <td>{{ data_iso_para_br($item->finish_date) }}</td>
                                    <td>
                                        <a href="{{ url('/events/' . $item->id) }}" title="View Event"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        <a href="{{ url('/events/' . $item->id . '/edit') }}" title="Edit Event"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square" aria-hidden="true"></i></button></a>

                                        <form method="POST" action="{{ url('/events' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Event" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $events->appends(['search' => Request::get('search')])->render() !!} </div>
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
