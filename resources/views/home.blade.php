@extends('layout')

@section('title', 'Lyft')

@section('header')
<header class="white-text blue-gradient">
    <!-- Jumbotron -->

    <div class="container pt-5">
        <img src="{{ asset('img/lyft-logo-90x64.png') }}" height="64" width="90" alt="logo"
             class="img-fluid ml-md-n5 ml-0">

        <!-- Grid row -->
        <div class="row">
            <div class="col-12">
                <h1 class="h1-responsive font-weight-bold pt-5 h1-title">Maneja por lo importante.</h1>
            </div>

            <div id="form-container" class="col-12">


                <div class="form-part-1 @if(session('current_user_id')) d-none @endif ">
                    <div class="col-12 pt-4 px-0">
                        <h5 class="mb-3">Regístrate para manejar</h5>
                        <p>Comencemos con tu número de teléfono. Te enviaremos un texto con un código para verificar el
                            teléfono.</p>
                    </div>

                    <div class="container-fluid pt-2 white-text px-0">
                        <form id="form-part1" class="needs-validation" novalidate>
                            @csrf
                            <div class="form-row">
                                <!-- Material inline 1 -->
                                <div class="form-check form-check-inline white-text">
                                    <input type="radio" class="form-check-input" id="materialInline1"
                                           name="car" value="si" checked>
                                    <label class="form-check-label" for="materialInline1">Tengo auto</label>
                                </div>

                                <!-- Material inline 2 -->
                                <div class="form-check form-check-inline white-text">
                                    <input type="radio" class="form-check-input" id="materialInline2"
                                           name="car" value="no">
                                    <label class="form-check-label" for="materialInline2">Necesito un auto</label>
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="col-md-4 md-form mb-5">
                                    <div class="rounded light-blue darken-4 overflow-hidden">
                                        <div class="row p-0 m-0">
                                            <label for="number" class="white-text color-input pl-2">Número de teléfono
                                                movil</label>
                                            <input type="text" class="form-control white-text border-bottom-0 border-0 pt-4 pb-3 mb-0 pl-3" id="number" name="number" maxlength="10" chars="0-9" required/>

                                            <div class="invalid-tooltip ml-3" id="number-invalid">
                                                <i class="fas fa-exclamation-circle"></i> Por favor, ingrese un número
                                                valido.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8 md-form mt-md-4 mt-0 px-0 mb-5">
                                    <div class="form-check pl-0 pl-md-3">
                                        <input class="form-check-input" type="checkbox" name="terms" value="yes"
                                               id="terms" required/>
                                        <label class="form-check-label white-text mt-md-2 mt-0" for="terms">
                                            Acepto los <a href="https://www.google.com"
                                                          class="font-weight-bolder text-dark"
                                                          target="_blank">Términos de servicio</a> de Lyft
                                        </label>

                                        <div class="invalid-tooltip mt-3 ml-4" id="terms-invalid">
                                            <i class="fas fa-exclamation-circle"></i> Tienes que aceptar los términos
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row mb-5">
                                <button class="btn btn-light btn-lg btn-rounded ml-0 font-weight-bold" id="send_form1" type="submit">
                                    Siguiente
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="form-part-2 container-fluid px-0 animated fadeInRight @if(session('current_user_id'))d-block @else d-none @endif">
                    <div class="col-12 px-0 pt-4">
                        <h5 class="mb-3">Regístrate para manejar</h5>
                        <p>¡Perfecto! Necesitamos un poco más de información para poder empezar.</p>
                    </div>

                    <div class="container-fluid pt-2 white-text px-0">
                        <form id="form-part2" class="needs-validation form-checked" novalidate>
                            @csrf
                            <div class="form-row">
                                <div class="col-md-4 md-form">
                                    <div class="rounded light-blue darken-4 overflow-hidden">
                                        <div class="row p-0 m-0">
                                            <label for="name" class="white-text color-input pl-2">Nombre</label>
                                            <input type="text" class="form-control white-text border-bottom-0 border-0 pt-4 pb-3 mb-0 pl-3"
                                                   maxlength="25" id="name" name="name" chars="A-Za-zñÑ\s" required/>
                                            <div class="invalid-tooltip ml-3">
                                                <i class="fas fa-exclamation-circle"></i> Tienes que ingresar un nombre.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 md-form">
                                    <div class="rounded light-blue darken-4 overflow-hidden">
                                        <div class="row p-0 m-0">
                                            <label for="last" class="white-text color-input pl-2">Apellido</label>
                                            <input type="text" class="form-control white-text border-bottom-0 border-0 pt-4 pb-3 mb-0 pl-3" maxlength="50" id="last" name="last_name" chars="A-Za-zñÑ\s" required/>

                                            <div class="invalid-tooltip ml-3">
                                                <i class="fas fa-exclamation-circle"></i> Tienes que ingresar un apellido.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 md-form">
                                    <div class="rounded light-blue darken-4 overflow-hidden">
                                        <div class="row p-0 m-0">
                                            <label for="email" class="white-text color-input pl-2">E-mail</label>
                                            <input type="email" class="form-control white-text border-bottom-0 border-0 pt-4 pb-3 mb-0 pl-3" id="email" name="email" required/>

                                            <div class="invalid-tooltip ml-3">
                                                <i class="fas fa-exclamation-circle"></i> Tiene que ser un e-mail válido.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4 md-form">
                                    <div class="rounded light-blue darken-4 overflow-hidden">
                                        <div class="row p-0 m-0">
                                            <label for="city" class="white-text color-input pl-2">Ciudad en la que manejarás</label>
                                            <input type="text" class="form-control white-text border-bottom-0 border-0 pt-4 pb-3 mb-0 pl-3" id="city" name="city" chars="A-Za-zñÑ\s" required/>

                                            <div class="invalid-tooltip ml-3">
                                                <i class="fas fa-exclamation-circle"></i> Tiene que ser una ciudad.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 md-form">
                                    <div class="rounded light-blue darken-4 overflow-hidden">
                                        <div class="row p-0 m-0">
                                            <label for="code" class="white-text color-input pl-2">Codigo de promoción (opcional)</label>
                                            <input type="text" class="form-control white-text border-bottom-0 border-0 pt-4 pb-3 mb-0 pl-3" id="code" name="code"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row mt-5 mb-5">
                                <button class="btn btn-light btn-lg btn-rounded ml-0 font-weight-bold" type="submit" id="send_form2">Siguiente</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- Grid row -->
    </div>

    <!-- Jumbotron -->
</header>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/form-init.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/input-filter.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/check-form.js') }}" defer></script>
@endsection