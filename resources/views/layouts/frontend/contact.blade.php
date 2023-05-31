@extends('layouts.frontend.common')

@section('content')
<!-- Page content-->
<section class="py-5">
    <div class="container px-5">
        <!-- Contact form-->
        <div class="bg-light rounded-4 py-5 px-4 px-md-5">
            <div class="text-center mb-5">
                <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                <h1 class="fw-bolder">Entre em Contato</h1>
                <p class="lead fw-normal text-muted mb-0">Estamos anciosos para poder ajuda-lo!</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <div>
                        @if (session()->has('message'))
                            <div class="alert alert-warning">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>

                    <form action="{{ route('messages.store') }}" method="POST" id="contactForm" data-sb-form-api-token="API_TOKEN">
                        @csrf
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" name="full_name" id="name" type="text" placeholder="Enter your name..." required />
                            <label for="name">Nome Completo<span class="text-danger">*</span></label>
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" name="email" id="email" type="email" placeholder="name@example.com" required />
                            <label for="email">Email<span class="text-danger">*</span></label>
                        </div>
                        <!-- Phone number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" name="telefone" id="phone" type="tel" placeholder="(123) 456-7890" required />
                            <label for="phone">Telefone<span class="text-danger">*</span></label>
                        </div>
                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="message" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                            <label for="message">Mensagem<span class="text-danger">*</span></label>
                        </div>

                        <!-- Submit Button-->
                        <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" type="submit">Enviar</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</main>
@endsection
