@extends('layouts.admin.common')

@section('content')
<div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="row">
                    <div class="col-12">
                        <h1 class="mt-4">Cadastrar Novo Evento</h1>
                        <hr>
                        <ol class="breadcrumb">
                            <a href="{{ url('/events') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</button></a>
                            <br />
                            <br />
                        </ol>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Cadastrar
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/events') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('events.form', ['formMode' => 'create'])

                        </form>
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