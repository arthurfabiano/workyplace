@extends('layouts.admin.common')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-12">
                    <h1 class="mt-4">User {{ $user->id }}</h1>
                    <hr>
                    <ol class="breadcrumb mb-4">
                        <a href="{{ url('/users') }}" title="Back" class="me-lg-1"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</button></a>
                        <a href="{{ url('/users/' . $user->id . '/edit') }}" title="Edit User" class="me-lg-1"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square" aria-hidden="true"></i></button></a>

                        <form method="POST" action="{{ url('users' . '/' . $user->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete User" class="me-lg-1" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                    </ol>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Usuário #{{ $user->id }}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $user->id }}</td>
                                </tr>
                                <tr>
                                    <th> Nome </th>
                                    <td> {{ $user->last_name }} </td>
                                </tr>
                                <tr>
                                    <th> Sobrenome </th>
                                    <td> {{ $user->first_name }} </td>
                                </tr>
                                <tr>
                                    <th> Email </th>
                                    <td> {{ $user->email }} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
