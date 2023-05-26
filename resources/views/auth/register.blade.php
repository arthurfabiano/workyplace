@extends('layouts.frontend.common')

@section('content')
    <!-- Page content-->
    <section class="py-5">
        <div class="container px-5">


            <!-- Contact form-->
            <div class="bg-light rounded-4 py-5 px-4 px-md-5">
                <div class="text-center mb-5">
                    <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-person-circle"></i></div>
                    <h1 class="fw-bolder">Registrar</h1>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('register') }}" method="post" id="contactForm" data-sb-form-api-token="API_TOKEN">
                            @csrf
                            <!-- Nome input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="last_name" id="last_name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="last_name">Nome</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="first_name" id="first_name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="first_name">Sobrenome</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="email" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="password" id="password" type="password" placeholder="Digite sua senha" data-sb-validations="required" />
                                <label for="password">Senha</label>
                                <div class="invalid-feedback" data-sb-feedback="password:required">A phone number is required.</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="password_confirmation" id="password_confirmation" type="password" placeholder="Confirme a senha" data-sb-validations="required" />
                                <label for="password_confirmation">Confirmar Senha</label>
                                <div class="invalid-feedback" data-sb-feedback="password:required">A phone number is required.</div>
                            </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" type="submit">Registrar</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </main>
@endsection
