@extends('layouts.admin.common')

@section('content')
<div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="row">
                    <div class="col-12">
                        <h1 class="mt-4">Palestrante</h1>
                        <hr>
                        <ol class="breadcrumb mb-4">
                            <a href="{{ url('/speakers/create') }}" class="btn btn-success btn-sm" title="Add New Speaker">
                                <i class="fa fa-plus" aria-hidden="true"></i> Cadastrar
                            </a>
                        </ol>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Lista de Palestrantes
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Email</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($speakers as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td><td>{{ $item->telefone }}</td><td>{{ $item->email }}</td>
                                    <td>
                                        <a href="{{ url('/speakers/' . $item->id) }}" title="View Speaker"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        <a href="{{ url('/speakers/' . $item->id . '/edit') }}" title="Edit Speaker"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square" aria-hidden="true"></i></button></a>

                                        <form method="POST" action="{{ url('/speakers' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Speaker" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $speakers->appends(['search' => Request::get('search')])->render() !!} </div>
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
