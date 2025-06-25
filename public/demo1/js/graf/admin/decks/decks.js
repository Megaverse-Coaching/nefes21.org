"use strict";

// Class definition
var DeckPages = function () {
    // Elements
    var form;
    var submitButton;
    var validator;


    var initScripts = () => {
        $('input[type=checkbox][name=status]').change(function() {
            ($(this).is(':checked')) ? $(this).val(1).attr('checked', true): $(this).val(0).removeAttr('checked');
            ($(this).is(':checked')) ? $("span.status").html('Aktif'): $("span.status").html('Pasif');
        });
        $('input[type=checkbox][name=isValid]').change(function () {
            ($(this).is(':checked')) ? $(this).val(1).attr('checked', true) : $(this).val(0).removeAttr('checked');
            ($(this).is(':checked')) ? $("span.isValid").html('Valid') : $("span.isValid").html('Invalid');
        });
    };

    // Handle form
    var handleForm = function (e) {
        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'title': {
                        validators: {
                            notEmpty: {
                                message: 'Başlık alanı zorunludur!'
                            }
                        }
                    },
                    'tag': {
                        validators: {
                            notEmpty: {
                                message: 'Daily Tag alanı zorunludur.'
                            }
                        }
                    },
                    'order': {
                        validators: {
                            notEmpty: {
                                message: 'Order alanı zorunludur!'
                            },
                        }
                    },
                    'color': {
                        validators: {
                            notEmpty: {
                                message: 'Primary Color alanı zorunludur!'
                            }
                        }
                    }
                },
                plugins: {
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );
        toastr.options = {
            "closeButton": true,
            "debug": true,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toastr-top-center",
            "preventDuplicates": true,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        // Handle form submit
        submitButton.addEventListener('click', function (e) {
            // Prevent button default action
            e.preventDefault();
            // Validate form
            validator.validate().then(function (status) {
                if (status === 'Valid') {
                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');
                    submitButton.disabled = true;
                    $("div.card").addClass("overlay overlay-block");
                    $(".overlay-layer").toggleClass("d-none d-flex");
                    // Disable button to avoid multiple click

                    // Simulate ajax request
                    axios.post(form.getAttribute('action'), new FormData(form))
                        .then(function (response) {
                            $("div.card").removeClass("overlay overlay-block");
                            $(".overlay-layer").toggleClass("d-flex d-none");
                            // console.log(response);
                            switch (response.data.class) {
                                case "info" : toastr.info(response.data.message); break;
                                case "error" : toastr.error(response.data.message); break;
                                case "success" : toastr.success(response.data.message); break;
                                case "warning" : toastr.warning(response.data.message); break;
                                default:toastr.success(response.data.message); break;
                            }
                        })
                        .catch(function (error) {
                            let dataMessage = error.message;
                            let dataErrors = error.errors;
                            let resErrors = error.response.data.message;

                            for (const errorsKey in dataErrors) {
                                if (!dataErrors.hasOwnProperty(errorsKey)) continue;
                                dataMessage += "\r\n" + dataErrors[errorsKey];
                            }

                            if (error) {
                                Swal.fire({
                                    text: resErrors,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Tamamdır!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                                //toastr.error(dataMessage);
                            }
                        })
                        .then(function () {
                            // always executed
                            // Hide loading indication
                            submitButton.removeAttribute('data-kt-indicator');
                            // Enable button
                            submitButton.disabled = false;
                        });

                } else {
                    // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                    Swal.fire({
                        text: "Üzgünüz, sanırım bir sorunla karşılaştınız, lütfen tekrar deneyin.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Tamamdır!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
            });

        });

    }

    return {
        // Public functions
        init: function () {
            form = document.querySelector('#deckForm');
            submitButton = document.querySelector('#deckFormSubmit');

            if(!form) return;
            if(!submitButton) return;

            initScripts();
            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    DeckPages.init();
});
