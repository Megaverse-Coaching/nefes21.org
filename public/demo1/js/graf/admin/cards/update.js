"use strict";

// Class definition
var KTUpdateModal = function () {
    // Shared variables
    var table = document.getElementById('kt_table');
    const element = document.getElementById('kt_modal_update');
    const form = element.querySelector('#kt_modal_update_form');

    var baseURL = $(form).attr("data-redirect-url");

    $(form.querySelector('select[name="deck_id"]')).select2();
    $(form.querySelector('select[name="content_id"]')).select2();

    var dataID;
    const modal = new bootstrap.Modal(element);
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


    $(document).on('click', '#updateButton', function() {
        dataID = $(this).data('id');
        baseURL = $(this).attr("data-redirect-url");

        autosize($('.kt_autosize'));
        if(dataID){
            // Simulate ajax request
            axios.get(baseURL +"admin/cards/"+dataID).then(function (response) {
                    var result = response.data.result;


                    const title = element.querySelector('input[name=title]');

                    const daily = element.querySelector('input[name=daily]');
                    const card_id = element.querySelector('input[name=card_id]');

                    const deck_id = element.querySelector('select[name=deck_id]');
                    const content_id = element.querySelector('select[name=content_id]');

                    $(title).val(result.title);
                    $(card_id).val(result.card_id);
                    // CKEditor üzerinden description alanını güncelle
                    if (descriptionEditor) {
                        descriptionEditor.setData(result.description); // CKEditor içeriği güncelleniyor
                    }
                    $(deck_id)
                        .val(result.deck_id)
                        .trigger('change')
                        .attr("data-placeholder", result.deck_id);
                    $(content_id)
                        .val(result.content_id)
                        .trigger('change')
                        .attr("data-placeholder", result.content_id);

                    (result.daily === 1) ? $("span.status").html('Yes'): $("span.status").html('No');
                    (result.daily === 1) ? $(daily).val(1).attr('checked', true) : $(daily).val(0).removeAttr('checked');

                }).catch(function (error) {
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
                });
        }

    });



    // Init add schedule modal
    var initUpdateForm = () => {


        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        var validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'mood_id': {
                        validators: {
                            notEmpty: {
                                message: 'Bir mod seçmelisiniz!'
                            }
                        }
                    },
                    'content_id': {
                        validators: {
                            notEmpty: {
                                message: 'Bir içerik seçmelisiniz!'
                            }
                        }
                    },
                },

                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );




        // Submit button handler
        const submitButton = element.querySelector('[data-kt-modal-action="submit"]');
        submitButton.addEventListener('click', e => {
            e.preventDefault();

            // Validate form before submit
            if (validator) {
                validator.validate().then(function (status) {

                    if (status == 'Valid') {


                        // Show loading indication
                        submitButton.setAttribute('data-kt-indicator', 'on');
                        submitButton.disabled = true;
                        $("div.card").addClass("overlay overlay-block");
                        $(".overlay-layer").toggleClass("d-none d-flex");
                        // Disable button to avoid multiple click

                        // Simulate ajax request
                        axios.patch(baseURL +"admin/cards/"+dataID, {
                            title: element.querySelector('input[name=title]').value, // Başlık
                            description: descriptionEditor ? descriptionEditor.getData() : '', // CKEditor içeriği
                            daily: element.querySelector('input[name=daily]').value, // Günlük seçimi
                            card_id: element.querySelector('input[name=card_id]').value, // Kart ID
                            deck_id: element.querySelector('select[name=deck_id]').value, // Deck seçimi
                            content_id: element.querySelector('select[name=content_id]').value // İçerik seçimi
                        })
                            .then(function (response) {
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
                                console.dir(error);
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
                                    }).then(function () {
                                        $("div.card").removeClass("overlay overlay-block");
                                        $(".overlay-layer").toggleClass("d-flex d-none");
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
                                 form.reset();
                                 modal.hide();


                                $("div.card").removeClass("overlay overlay-block");
                                $(".overlay-layer").toggleClass("d-flex d-none");

                                window.location.reload();
                            });

                    } else {
                        // Show popup warning. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                        Swal.fire({
                            text: "Dikkat: Boş bıraktığınız alanlar var, lütfen alanları doldurup kaydetmeyi tekrar deneyin.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Tamam, anlaşıldı!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                });
            }
        });

        // Cancel button handler
        const cancelButton = element.querySelector('[data-kt-modal-action="cancel"]');
        cancelButton.addEventListener('click', e => {
            e.preventDefault();

            Swal.fire({
                text: "İptal etmek istediğinize emin misiniz?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Evet, iptal edilsin!",
                cancelButtonText: "Hayır, vazgeç!",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form
                    modal.hide();
                }
            });
        });

        // Close button handler
        const closeButton = element.querySelector('[data-kt-modal-action="close"]');
        closeButton.addEventListener('click', e => {
            e.preventDefault();

            Swal.fire({
                text: "Kapatmak istediğinize emin misiniz?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Evet, kapatılsın!",
                cancelButtonText: "Hayır, vazgeç!",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form
                    modal.hide();
                }
            });
        });
    }

    return {
        // Public functions
        init: function () {
            initUpdateForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUpdateModal.init();
});
