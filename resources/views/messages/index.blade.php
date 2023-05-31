@extends('layouts.admin.common')

@section('content')
<div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="row">
                    <div class="col-12">
                        <h1 class="mt-4">Lista de Mensagens</h1>
                        <hr>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Lista de Mensagem
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
                            @foreach($messages as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->full_name }}</td><td>{{ $item->email }}</td><td>{{ $item->telefone }}</td>
                                    <td>
                                        <a href="{{ url('/messages/' . $item->id) }}" title="View Message"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>

                                        <form method="POST" action="{{ url('/messages' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Message" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $messages->appends(['search' => Request::get('search')])->render() !!} </div>
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
