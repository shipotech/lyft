<header class="white-text night-fade-gradient">
    <!-- Jumbotron -->

    <div class="container pt-5">
        <a href="{{ route('home') }}">
            <img src="{{ asset('img/lyft-logo-90x64.png') }}" height="64" width="90" alt="logo"
                 class="img-fluid ml-md-n5 ml-0">
        </a>

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
                                            <input type="text"
                                                   class="form-control white-text border-bottom-0 border-0 pt-4 pb-3 mb-0 pl-3"
                                                   id="number" name="number" maxlength="10" chars="0-9" required/>

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
                                <button class="btn btn-light btn-lg btn-rounded ml-0 font-weight-bold" id="send_form1"
                                        type="submit">
                                    Siguiente
                                </button>
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