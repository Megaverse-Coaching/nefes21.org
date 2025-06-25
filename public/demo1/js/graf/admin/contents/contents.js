"use strict";

// Class definition
var GrafContentPages = function () {

    // Shared variables
    const element = document.getElementById('contentForm');
    // const form = element.querySelector('#contentForm'); //const modal = new bootstrap.Modal(element); // Init add schedule modal


    var initScripts = () => {

        if ($("input[name='status']").val() == 1) {
            $(':input:not(:button)').prop("disabled", true);
            $('[data-kt-image-input-action="change"]').hide();
            $('[data-kt-image-input-action="remove"]').hide();
        }

        $('input[type=checkbox][name=isNew]').change(function () {
            ($(this).is(':checked')) ? $(this).val(1).attr('checked', true) : $(this).val(0).removeAttr('checked');
            ($(this).is(':checked')) ? $("span.isNew").html('New') : $("span.isNew").html('Normal');
        });
        $('input[type=checkbox][name=isValid]').change(function () {
            ($(this).is(':checked')) ? $(this).val(1).attr('checked', true) : $(this).val(0).removeAttr('checked');
            ($(this).is(':checked')) ? $("span.isValid").html('Valid') : $("span.isValid").html('Invalid');
        });
        $('input[type=checkbox][name=isFree]').change(function () {
            ($(this).is(':checked')) ? $(this).val(1).attr('checked', true) : $(this).val(0).removeAttr('checked');
            ($(this).is(':checked')) ? $("span.isFree").html('Premium') : $("span.isFree").html('Free');
        });
        $('input[type=checkbox][name=status]').change(function () {
            ($(this).is(':checked')) ? $(this).val(1).attr('checked', true) : $(this).val(0).removeAttr('checked');
            ($(this).is(':checked')) ? $("span.status").html('Published') : $("span.status").html('Draft');
        });


        $("#move").click(function (e) {
            e.preventDefault();
            Swal.fire({
                text: "Taslaklara kaydetmek istediğinize emin misiniz?",
                icon: "question",
                buttonsStyling: true,
                confirmButtonText: "Evet, devam et!",
                customClass: {confirmButton: "btn btn-primary"}
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type: 'POST',
                        dataType: "json",
                        url: window.location.origin + "/admin/update/status",
                        data: {content_id: $(this).data('id')},
                        beforeSend: function() {
                            $("div.card").addClass("overlay overlay-block");
                            $(".overlay-layer").toggleClass("d-none d-flex");
                        },
                        success: function (data) {
                            $(':input:not(:button)').prop("disabled", false);
                            $('[data-kt-image-input-action="change"]').show();
                            $('[data-kt-image-input-action="remove"]').show();
                            $("input[type=checkbox][name=status]").val(0).removeAttr('checked');
                            $("span.status").html('Taslak');
                            //$("#move").removeAttr("type").attr("type", "submit").removeAttr("id").attr("form", "updForm").html('Save as a Draft');
                            $("#move").hide().toggleClass('d-block d-none');
                            $(":submit").toggleClass('d-none d-block');
                            $("a[id='editTracks']").toggleClass('d-none d-block');
                            // $(".alert-dismissible").toggleClass('d-none d-flex');
                        },
                        complete: function () {
                            $("div.card").removeClass("overlay overlay-block");
                            $(".overlay-layer").toggleClass("d-flex d-none");
                            location.reload();
                        }
                    });
                }
            });
        });

        $('#floatingContentDescription').maxlength({
            warningClass: "badge badge-primary",
            limitReachedClass: "badge badge-success"
        });

        var formElement = document.getElementById('contentForm');

        if(formElement){
            $(formElement.querySelector('select[name="age"]')).select2();
            $(formElement.querySelector('select[name="gender"]')).select2();
            $(formElement.querySelector('select[name="author_id"]')).select2();
            $(formElement.querySelector('select[name="admin_id"]')).select2();
            $(formElement.querySelector('select[name="type[]"]')).select2();
        }

        autosize($('.kt_autosize'));


    };

    var initContentForm = () => {

        const submitButton = document.getElementById('content-form-submit');
        if (submitButton !== null) {
            submitButton.addEventListener('click', function (e) {
                e.preventDefault();
                var formData = new FormData(element);
                var url = $('form').attr('action');
                // for(var item of formData.entries()) console.log(item[0]+" => "+item[1]);
                $.ajax({
                    url: url,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: 'POST',
                    cache: false,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    data: formData,
                    beforeSend: () => {
                        submitButton.setAttribute('data-kt-indicator', 'on');
                        submitButton.disabled = true;
                        $("div.card").addClass("overlay overlay-block");
                        $(".overlay-layer").toggleClass("d-none d-flex");
                    },
                    success: () => {
                        submitButton.removeAttribute('data-kt-indicator');
                        submitButton.disabled = false;
                        $('.card-track').toggle('d-block');
                    },
                    error: (err) => {
                        console.error(JSON.parse(err));
                    },
                    complete: function () {
                        Swal.fire({
                            text: "İçerik başarılı bir şekilde güncellendi!",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Tamam, anladım!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(function (result) {
                            if (result.isConfirmed) {
                                $("a[id='editTracks']").removeClass('d-none').addClass('d-block');
                                $("div.card").removeClass("overlay overlay-block");
                                $(".overlay-layer").toggleClass("d-flex d-none");
                                location.reload();
                                //window.location.href = window.location.origin + "/contents/";
                            }
                        });
                    }
                });
            });
        }
    };


    return {
        // Public functions
        init: function () {
            initScripts();
            initContentForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    GrafContentPages.init();
});
