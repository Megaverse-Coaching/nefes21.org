"use strict";

var KTUpdateModal = (function () {
    // Değişkenler
    let baseURL;
    let dataID;
    const element = document.getElementById('kt_modal_update');
    const form = element.querySelector('#kt_modal_update_form');
    const modal = new bootstrap.Modal(element);

    // Toastr ayarları
    toastr.options = {
        closeButton: true,
        debug: true,
        newestOnTop: true,
        progressBar: true,
        positionClass: "toastr-top-center",
        preventDuplicates: true,
        showDuration: "300",
        hideDuration: "1000",
        timeOut: "3000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut"
    };

    // Select2 init (tekrarları azaltmak için döngüyle)
    ['action','showcase_id','content_id'].forEach(name => {
        $(form.querySelector(`select[name="${name}"]`)).select2();
    });

    // Checkbox değişimlerini tek fonksiyonla yönet
    function handleCheckboxChange(checkboxName, checkedLabel, uncheckedLabel, labelSelector) {
        $(`input[type="checkbox"][name="${checkboxName}"]`).change(function () {
            const isChecked = $(this).is(':checked');
            $(this).val(isChecked ? 1 : 0).prop('checked', isChecked);
            $(labelSelector).html(isChecked ? checkedLabel : uncheckedLabel);
        });
    }

    // Checkbox fonksiyonlarını ata
    handleCheckboxChange('isValid', 'Valid', 'Invalid', 'span.isValid');
    handleCheckboxChange('isFree',  'Premium', 'Free',   'span.isFree');

    // Modal açılırken veriyi çek
    $(document).on('click', '#updateButton', function() {
        dataID  = $(this).data('id');
        baseURL = $(this).data('redirect-url');

        if(dataID) {
            // Simulate ajax request
            axios.get(`${baseURL}/admin/today-showcases/${dataID}`)
                .then(function (response) {
                    // Artık 'result' bir obje, dizi değil
                    const result = response.data.result;

                    const priority   = element.querySelector('input[name="priority"]');
                    const actionUrl  = element.querySelector('input[name="actionUrl"]');
                    const action     = element.querySelector('select[name="action"]');
                    const showcaseID = element.querySelector('select[name="showcase_id"]');
                    const contentID  = element.querySelector('select[name="content_id"]');
                    const isFree     = element.querySelector('input[name="isFree"]');
                    const isValid    = element.querySelector('input[name="isValid"]');

                    // Nesne olarak gelen result üstünden verileri doldur
                    $(priority).val(result.priority);
                    $(actionUrl).val(result.actionUrl);
                    $(action).val(result.action).trigger('change');
                    $(showcaseID).val(result.showcase_id).trigger('change');
                    $(contentID).val(result.content_id).trigger('change');

                    // Checkbox alanları
                    if (result.isFree === 1) {
                        $(isFree).val(1).prop('checked', true);
                        $('span.isFree').html('Premium');
                    } else {
                        $(isFree).val(0).prop('checked', false);
                        $('span.isFree').html('Free');
                    }

                    if (result.isValid === 1) {
                        $(isValid).val(1).prop('checked', true);
                        $('span.isValid').html('Valid');
                    } else {
                        $(isValid).val(0).prop('checked', false);
                        $('span.isValid').html('InValid');
                    }
                })
                .catch(function (error) {
                    const resErrors = error?.response?.data?.message || error.message;
                    Swal.fire({
                        text: resErrors,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Tamamdır!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                });
        }
    });

    // Form validation ve submit
    var initUpdateForm = () => {
        var validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'action': {
                        validators: {
                            notEmpty: { message: 'Action türü seçmelisiniz!' }
                        }
                    },
                    'showcase_id': {
                        validators: {
                            notEmpty: { message: 'Bir showcase türü seçmelisiniz!' }
                        }
                    },
                    'content_id': {
                        validators: {
                            callback: {
                                message: 'Bir içerik seçmelisiniz!',
                                callback: function (input) {
                                    const actionValue = form.querySelector('[name="action"]').value;
                                    // actionValue 'open_content' ise content_id zorunlu
                                    return (actionValue === 'open_content')
                                        ? input.value.trim() !== ''
                                        : true;
                                }
                            }
                        }
                    },
                    'priority': {
                        validators: {
                            notEmpty: { message: 'Öncelik sırası için bir sayı girin!' }
                        }
                    }
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

        // Kaydet butonu
        const submitButton = element.querySelector('[data-kt-modal-action="submit"]');
        submitButton.addEventListener('click', e => {
            e.preventDefault();
            if (validator) {
                validator.validate().then(function (status) {
                    if (status === 'Valid') {
                        submitButton.setAttribute('data-kt-indicator', 'on');
                        submitButton.disabled = true;
                        $("div.card").addClass("overlay overlay-block");
                        $(".overlay-layer").toggleClass("d-none d-flex");

                        // Simulate ajax request
                        axios.post(`${baseURL}/admin/today-showcases/${dataID}`, new FormData(form))
                            .then(function (response) {
                                $("div.card").removeClass("overlay overlay-block");
                                $(".overlay-layer").toggleClass("d-flex d-none");
                                const respClass = response.data.class || "success";
                                toastr[respClass](response.data.message);
                            })
                            .catch(function (error) {
                                const resErrors = error?.response?.data?.message || error.message;
                                Swal.fire({
                                    text: resErrors,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Tamamdır!",
                                    customClass: { confirmButton: "btn btn-primary" }
                                });
                            })
                            .then(function () {
                                // Her koşulda
                                submitButton.removeAttribute('data-kt-indicator');
                                submitButton.disabled = false;
                                form.reset();
                                modal.hide();
                                window.location.reload();
                            });
                    } else {
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

        // Cancel butonu
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
                    form.reset();
                    modal.hide();
                }
            });
        });

        // Close butonu
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
                    form.reset();
                    modal.hide();
                }
            });
        });
    };

    // Dışarıya açık fonksiyon
    return {
        init: function () {
            initUpdateForm();
        }
    };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUpdateModal.init();
});
