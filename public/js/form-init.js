(function () {
    // Validacion de Formulario
    'use strict';
    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');

                $(document).on('submit', '#form-part1', function (e) {
                    if (form.checkValidity() === true) {
                        e.preventDefault();
                        e.stopImmediatePropagation();
                        let actualForm = $('#form-part1').serialize();
                        let token = $('meta[name="csrf-token"]').attr('content');

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': token
                            }
                        });
                        $.ajax({
                            url: '/form-1',
                            type: 'POST',
                            data: actualForm,
                            beforeSend: function () {
                                // Show the loader animation
                                $('#send_form1').prop('disabled', true).html('Enviando..');
                            },
                            /* remind that 'data' is the response of the AjaxController */
                            success: function (data) {
                                $('#send_form1').prop('disabled', false).html('Siguiente');
                                $('#form-part1').removeClass('was-validated');

                                if (data.status) {
                                    $('.form-part-1').addClass('d-none');
                                    $('.form-part-2').removeClass('d-none');
                                } else {
                                    $.each(data.errors, function(index, value) {
                                        //- extract target value
                                        let indx = value.split(' ')[1];
                                        $('#' + indx + '-invalid').addClass('d-block');
                                        $('input#' + indx).addClass('is-invalid');
                                    });
                                }
                            },
                            error :function( data ) {
                                if( data.status === 422 ) {
                                    var errors = $.parseJSON(data.responseText);
                                    $.each(errors, function (key, value) {
                                        // console.log(key+ " " +value);

                                        if($.isPlainObject(value)) {
                                            $.each(value, function (key, value) {
                                                console.log(key+ " " +value);
                                                alert('There was a problem with your request, please refresh and try again in a few seconds');
                                            });
                                        }
                                    });
                                }
                            }
                        });
                        return false;
                    }
                });

                $(document).on('submit', '#form-part2', function (e) {
                    if (form.checkValidity() === true) {
                        e.preventDefault();
                        e.stopImmediatePropagation();
                        let actualForm = $('#form-part2').serialize();
                        let token = $('meta[name="csrf-token"]').attr('content');

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': token
                            }
                        });
                        $.ajax({
                            url: '/form-2',
                            type: 'POST',
                            data: actualForm,
                            beforeSend: function () {
                                // Show the loader animation
                                $('#send_form2').prop('disabled', true).html('Enviando..');
                            },
                            /* remind that 'data' is the response of the AjaxController */
                            success: function (data) {
                                $('#send_form2').prop('disabled', false).html('Siguiente');
                                $('#form-part2').removeClass('was-validated');

                                if (data.status) {
                                    $('header').remove();
                                    $('body').prepend(data.view);
                                    toastr.success('Registrado correctamente.')
                                } else {
                                    $.each(data.errors, function(index, value) {
                                        //- extract target value
                                        let indx = value.split(' ')[1];
                                        $('#' + indx + '-invalid').addClass('d-block');
                                        $('input#' + indx).addClass('is-invalid');
                                    });
                                }
                            },
                            error :function( data ) {
                                if( data.status === 422 ) {
                                    var errors = $.parseJSON(data.responseText);
                                    $.each(errors, function (key, value) {
                                        if($.isPlainObject(value)) {
                                            $.each(value, function (key, value) {
                                                console.log(key+ " " +value);
                                            });
                                        }
                                    });
                                    alert('There was a problem with your request, please refresh and try again in a few seconds');
                                }
                            }
                        });
                        return false;
                    }
                });
            }, false);
        });
    }, false);
})();