@extends('layouts.frontend.common')

@section('content')
<!-- Page Content-->
<div class="container px-5 my-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Eventos </span></h1>
    </div>
    <div class="row gx-5 justify-content-center">
        <div class="col-lg-11 col-xl-9 col-xxl-8">
            <section>
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h2 class="text-primary fw-bolder mb-0">Próximos Eventos</h2>
                </div>
                    <div>
                        @if (session()->has('message'))
                            <div class="alert alert-warning">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>

                    <div class="card shadow border-0 rounded-4 mb-5">
                        <div class="card-body p-5">
                            @forelse( $nextEvents as $key => $nextEevent )
                            <div class="row align-items-center gx-5 mb-5">
                                <div class="col-lg-4 text-center text-lg-start mb-4 mb-lg-0">
                                    <div class="bg-light p-4 rounded-4">
                                        <div class="text-primary fw-bolder mb-2">Palestrante</div>
                                        <div class="mb-2">
                                            <div class="small fw-bolder">{{ $nextEevent->speaker->name }}</div>
                                            <div class="small text-muted">{{ $nextEevent->speaker->email }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="mb-4">
                                        <div class="text-primary fw-bolder mb-2">{{ $nextEevent->title }}</div>
                                        {{ $nextEevent->description }}
                                    </div>
                                    <div class="fst-italic mb-4">
                                        <div class="small text-muted"><b>Início:</b> {{ data_iso_para_br($nextEevent->start_date) }}</div>
                                        <div class="small text-muted"><b>Término:</b> {{ data_iso_para_br($nextEevent->finish_date) }}</div>
                                    </div>
                                    <div class="fst-italic">
                                        <div class="small text-muted">
                                            <b>Vagas Disponíveis:</b> {{ ($nextEevent->room->number_of_participants > 0) ? $nextEevent->room->amount_of_participants.'/'.$nextEevent->room->number_of_participants : 'Sala Cheia até o momento!'}}
                                        </div>
                                    </div>
                                    <hr>
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#eventModalParticipant" data-event-title="{{ $nextEevent->title }}" data-event-id="{{ $nextEevent->id }}">
                                        <div class="d-inline-block bi bi-check2-all me-2"></div> Participar
                                    </button>
                                </div>
                            </div>
                            @empty
                                <div class="card-body p-5">
                                    Ainda não possui nenhum evento cadastro até o momento! Clique aqui para <a href="{{ route('login') }}" >logar</a> ou aqui para <a href="{{ route('register') }}" >Registrar</a>!
                                </div>
                            @endforelse
                            <div class="pagination-wrapper"> {{ $nextEvents->links() }} </div>
                        </div>
                    </div>
            </section>
            <!-- Education Section-->
            <section>
                <h2 class="text-secondary fw-bolder mb-4">Últimos 3 Eventos</h2>
                    <div class="card shadow border-0 rounded-4 mb-5">
                        <div class="card-body p-5">
                            @forelse( $previousEvents as $previousEevent )
                            <div class="row align-items-center gx-5 mb-5">
                                <div class="col-lg-4 text-center text-lg-start mb-4 mb-lg-0">
                                    <div class="bg-light p-4 rounded-4">
                                        <div class="text-secondary fw-bolder mb-2">Palestrante</div>
                                        <div class="mb-2">
                                            <div class="small fw-bolder">{{ $previousEevent->speaker->name }}</div>
                                            <div class="small text-muted">{{ $previousEevent->speaker->email }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-8">
                                    <div class="mb-4">
                                        <div class="text-secondary fw-bolder mb-2">{{ $previousEevent->title }}</div>
                                        <div>{{ $previousEevent->description }}</div>
                                    </div>
                                    <div class="fst-italic">
                                        <div class="small text-muted"><b>Início:</b> {{ data_iso_para_br($previousEevent->start_date) }}</div>
                                        <div class="small text-muted"><b>Término:</b> {{ data_iso_para_br($previousEevent->finish_date) }}</div>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <div class="card-body p-5">
                                    Ainda não foi realizado nenhum evento até o momento! Clique aqui para <a href="{{ route('login') }}" >logar</a> ou aqui para <a href="{{ route('register') }}" >Registrar</a>!
                                </div>
                            @endforelse
                        </div>
                    </div>
            </section>
            <!-- Divider-->
            <div class="pb-5"></div>
            <!-- Skills Section-->
            <section>
                <!-- Skillset Card-->
                <div class="card shadow border-0 rounded-4 mb-5">
                    <div class="card-body p-5">
                        <!-- Professional skills list-->
                        <div class="mb-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 me-3"><i class="bi bi-tools"></i></div>
                                <h3 class="fw-bolder mb-0"><span class="text-gradient d-inline">Tópicos Abordados</span></h3>
                            </div>
                            <div class="row row-cols-1 row-cols-md-4 mb-4 grid gap-2">
                                @if( isset($topics[0]) )
                                    @forelse( $topics as $topic)
                                        <div class="d-flex align-items-center bg-light rounded-4 p-2 h-100 mt-2">{{ $topic }}</div>
                                    @empty
                                        <p>Nenhum evento caastrado para mostrar algum tópico.</p>
                                    @endforelse
                                @else
                                    <div class="card-body">
                                        Nenhum evento caastrado para mostrar algum tópico
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- Languages list-->
                        <div class="mb-0">
                            <div class="d-flex align-items-center mb-4">
                                <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 me-3"><i class="bi bi-code-slash"></i></div>
                                <h3 class="fw-bolder mb-0"><span class="text-gradient d-inline">Habilidade dos Proficionais</span></h3>
                            </div>
                            <div class="row row-cols-0 row-cols-md-4 mb-4 grid gap-2">
                                @if( isset($skills[0]) )
                                    @forelse( $skills as $skill)
                                        <div class="d-flex align-items-center bg-light rounded-4 p-2 h-100 mt-2">{{ $skill }}</div>
                                    @empty
                                        <p> Nenhum evento cadastrado para mostrar algum habilidade.</p>
                                    @endforelse
                                @else
                                    <div class="card-body">
                                        Nenhum evento cadastrado para mostrar alguma habilidade.
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
</main>
@endsection
