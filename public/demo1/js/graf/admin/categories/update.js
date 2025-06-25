"use strict";

// Class definition
var KTCategoriesUpdateCategory = function () {
    // Shared variables
    const element = document.getElementById('kt_modal_update_category');
    const form = element.querySelector('#kt_modal_update_category_form');
    $(element.querySelector("select[name='dimension_id']")).select2();

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
    $('input[type=checkbox][name=status]').change(function() {
        ($(this).is(':checked')) ? $(this).val(1).attr('checked', true): $(this).val(0).removeAttr('checked');
        ($(this).is(':checked')) ? $("span.status").html('Aktif'): $("span.status").html('Pasif');
    });


    $(document).on('click', '#updateButton', function() {
        dataID = $(this).data('id');

        if(dataID){
            // Simulate ajax request
            axios.get('categories/'+dataID).then(function (response) {
                    var resultData = response.data.result[0];
                    // console.table(resultData);
                    const category = element.querySelector('input[name=category]');
                    const dimension_id = element.querySelector('select[name=dimension_id]');
                    const title = element.querySelector('input[name=title]');
                    const description = element.querySelector('input[name=description]');
                    const order = element.querySelector('input[name=order]');
                    const status = element.querySelector('input[name=status]');

                    $(category).val(resultData.category);
                    $(dimension_id).val(resultData.dimension_id).trigger('change').attr("data-placeholder", resultData.dimension_id);

                    $(title).val(resultData.title);
                    $(description).val(resultData.description);
                    $(order).val(resultData.order);

                    (resultData.status === 1) ? $("span.status").html('Aktif'): $("span.status").html('Pasif');
                    (resultData.status === 1) ? $(status).val(1).attr('checked', true) : $(status).val(0).removeAttr('checked');

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
    var initUpdateCategory = () => {


        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        var validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'title': {
                        validators: {
                            notEmpty: {
                                message: 'Category name is required'
                            }
                        }
                    },
                    'description': {
                        validators: {
                            notEmpty: {
                                message: 'Category Description is required'
                            }
                        }
                    },
                    'order': {
                        validators: {
                            notEmpty: {
                                message: 'Category Description is required'
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
        const submitButton = element.querySelector('[data-kt-category-modal-action="submit"]');
        submitButton.addEventListener('click', e => {
            e.preventDefault();

            // Validate form before submit
            if (validator) {
                validator.validate().then(function (status) {
                    console.log('validated!');

                    if (status == 'Valid') {


                        // Show loading indication
                        submitButton.setAttribute('data-kt-indicator', 'on');
                        submitButton.disabled = true;
                        $("div.card").addClass("overlay overlay-block");
                        $(".overlay-layer").toggleClass("d-none d-flex");
                        // Disable button to avoid multiple click

                        // Simulate ajax request
                        axios.post("categories/"+dataID, new FormData(form))
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
                                form.reset();
                                modal.hide();
                                window.location.reload();
                            });

                    } else {
                        // Show popup warning. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                });
            }
        });

        // Cancel button handler
        const cancelButton = element.querySelector('[data-kt-category-modal-action="cancel"]');
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
        const closeButton = element.querySelector('[data-kt-category-modal-action="close"]');
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
            initUpdateCategory();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTCategoriesUpdateCategory.init();
});
