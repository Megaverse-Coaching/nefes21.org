"use strict";

// Class definition
var GrafSoundscapePages = function () {

    // Shared variables
    const element = document.getElementById('updForm');
    // const form = element.querySelector('#updateContentForm'); //const modal = new bootstrap.Modal(element); // Init add schedule modal


    var initScripts = () => {

        $('input[type=checkbox][name=isValid]').change(function() {
            ($(this).is(':checked')) ? $(this).val(1).attr('checked', true): $(this).val(0).removeAttr('checked');
            ($(this).is(':checked')) ? $("span.isValid").html('Onaylı'): $("span.isValid").html('Onaylanmadı');
        });
        $('input[type=checkbox][name=isFree]').change(function() {
            ($(this).is(':checked')) ? $(this).val(1).attr('checked', true): $(this).val(0).removeAttr('checked');
            ($(this).is(':checked')) ? $("span.isFree").html('Premium'): $("span.isFree").html('Free');
        });
        $('input[type=checkbox][name=status]').change(function() {
            ($(this).is(':checked')) ? $(this).val(1).attr('checked', true): $(this).val(0).removeAttr('checked');
            ($(this).is(':checked')) ? $("span.status").html('Aktif'): $("span.status").html('Pasif');
        });


        var objectUrl;
        $("#audio").on("canplaythrough", function(e){
            var seconds = e.currentTarget.duration;
            var duration = moment.duration(seconds, "seconds");

            var time = "";
            var hours = duration.hours();
            if (hours > 0) { time = hours + ":" ; }

            time = time + duration.minutes() + ":" + duration.seconds();
            $("#trackDuration").attr("value", `${time}`);
            $("input[name='duration']").attr("value", `${seconds}`);

            URL.revokeObjectURL(objectUrl);
        });
        $("#file").change(function(e){
            var file = e.currentTarget.files[0];

            $("#filename").text(file.name);
            $("#filetype").text(file.type);
            $("#filesize").text(file.size);

            objectUrl = URL.createObjectURL(file);
            $("#audio").prop("src", objectUrl);
        });

    };

    var initContentForm = () => {

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        var validator = FormValidation.formValidation(
            element,
            {
                fields: {
                    'contentTitle': {
                        validators: {
                            notEmpty: {
                                message: 'İçerik adı zorunludur!'
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
        // const submitButton = element.querySelector('[data-kt-content-form-action="submit"]');
        const submitButton = document.getElementById('soundscape-form-submit');
        submitButton.addEventListener('click', function (e) {
            // Prevent default button action
            e.preventDefault();

            // Validate form before submit
            if (validator) {
                validator.validate().then(function (status) {
                    console.log('validated!');

                    if (status == 'Valid') {

                        var formData = new FormData(element);
                        var url= $('form').attr('action');

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
                            beforeSend:() => {
                                // Show loading indication
                                submitButton.setAttribute('data-kt-indicator', 'on');
                                // Disable button to avoid multiple click
                                submitButton.disabled = true;
                            },
                            success: () => {
                                // Remove loading indication
                                submitButton.removeAttribute('data-kt-indicator');

                                // Enable button
                                submitButton.disabled = false;

                            },
                            error: () => {},
                            complete: function () {
                                // Show popup confirmation
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
                                        //location.reload();
                                    }
                                });
                            }
                        });


                    } else {
                        // Show popup warning. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                        Swal.fire({
                            text: "Hata, görünen o ki, bir açığımızı buldunuz. Bu durumu bize bildirin ve daha sonra tekrar deneyin!",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Tamam, anladım!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                });
            }
        });
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
    GrafSoundscapePages.init();
});
