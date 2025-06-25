"use strict";

// Class definition
var DeckPages = function () {

    // Shared variables
    const element = document.getElementById('deckForm');

    var initScripts = () => {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toastr-bottom-center",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "swing",
            "showMethod": "slideUp",
            "hideMethod": "fadeOut"
        };

        $('input[type=checkbox][name=status]').change(function() {
            ($(this).is(':checked')) ? $(this).val(1).attr('checked', true): $(this).val(0).removeAttr('checked');
            ($(this).is(':checked')) ? $("span.status").html('Aktif'): $("span.status").html('Pasif');
        });
        $('input[type=checkbox][name=isValid]').change(function () {
            ($(this).is(':checked')) ? $(this).val(1).attr('checked', true) : $(this).val(0).removeAttr('checked');
            ($(this).is(':checked')) ? $("span.isValid").html('Valid') : $("span.isValid").html('Invalid');
        });

    };

    var initContentForm = () => {

        const submitButton = document.getElementById('deck-form-submit');
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
                    beforeSend: function() {
                        submitButton.setAttribute('data-kt-indicator', 'on');
                        submitButton.disabled = true;
                        $("div.card").addClass("overlay overlay-block");
                        $(".overlay-layer").toggleClass("d-none d-flex");
                    },
                    success: function (response) {
                        submitButton.removeAttribute('data-kt-indicator');
                        submitButton.disabled = false;
                        $("div.card").removeClass("overlay overlay-block");
                        $(".overlay-layer").toggleClass("d-flex d-none");
                        toastr.success(response.message);
                    },
                    error: function(response) {
                        submitButton.removeAttribute('data-kt-indicator');
                        submitButton.disabled = false;
                        toastr.success(response.responseJSON.message);
                    },
                    complete: function () {
                        //location.reload();
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
    DeckPages.init();
});
