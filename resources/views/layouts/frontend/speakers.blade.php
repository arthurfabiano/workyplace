@extends('layouts.frontend.common')

@section('content')
<!-- Projects Section-->
<section class="py-5">
    <div class="container px-5 mb-5">
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Palestrantes</span></h1>
        </div>
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-11 col-xl-9 col-xxl-8">
                @forelse( $speakers as $speaker )
                    <div class="card overflow-hidden shadow rounded-4 border-0 mb-5">
                        <div class="card-body p-0">
                            <div class="d-flex align-items-center">
                                <div class="p-5">
                                    <h2 class="text-gradient fw-bolder">{{ $speaker->name }}</h2>
                                    <p>{{ $speaker->description }}</p>
                                    <b>{{ $speaker->email }}</b>
                                </div>
                                <div>
                                    <img class="img-fluid" style="float: right !important;" width="50%" src="{{ $speaker->image ? url("storage/{$speaker->image}") : url('assets/frontend/assets/profile.png') }}" alt="{{ $speaker->name }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card overflow-hidden shadow rounded-4 border-0 mb-5">
                        <div class="card-body p-0">
                            <div class="d-flex align-items-center">
                                <div class="p-5">
                                    Ainda não possui nenhum palestrante cadastrado no sistema. Clique aqui para <a href="{{ route('login') }}" >logar</a> ou aqui para <a href="{{ route('register') }}" >Registrar</a>!
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
<!-- Call to action section-->
<section class="py-5 bg-gradient-primary-to-secondary text-white">
    <div class="container px-5 my-5">
        <div class="text-center">
            <h2 class="display-4 fw-bolder mb-4">Clique aqui para saber mais!</h2>
            <a class="btn btn-outline-light btn-lg px-5 py-3 fs-6 fw-bolder" href="{{ route('site.contato') }}">Contato</a>
        </div>
    </div>
</section>
</main>
@endsection
