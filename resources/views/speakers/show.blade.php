@extends('layouts.admin.common')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-12">
                    <h1 class="mt-4">Palestrante #{{ $speaker->id }}</h1>
                    <hr>
                    <ol class="breadcrumb mb-4">
                        <a href="{{ url('/speakers') }}" title="Back" class="me-lg-1"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</button></a>
                        <a href="{{ url('/speakers/' . $speaker->id . '/edit') }}" title="Edit Speaker" class="me-lg-1"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square" aria-hidden="true"></i> Editar</button></a>

                        <form method="POST" action="{{ url('speakers' . '/' . $speaker->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Speaker" class="me-lg-1" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> Deletar</button>
                        </form>
                    </ol>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Palestrante #{{ $speaker->id }}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $speaker->id }}</td>
                                </tr>
                                <tr>
                                    <th> Nome </th>
                                    <td> {{ $speaker->name }} </td>
                                </tr>
                                <tr>
                                    <th> Skills </th>
                                    <td>
                                        @foreach($skills as $skill)
                                            {{ $skill }}
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th> Telefone </th>
                                    <td> {{ $speaker->telefone }} </td>
                                </tr>
                                <tr><th> Email </th>
                                    <td> {{ $speaker->email }} </td>
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
