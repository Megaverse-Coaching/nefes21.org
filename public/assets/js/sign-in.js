"use strict";

// Class definition
var NefesSigninGeneral = function () {
    // Elements
    var form;
    var submitButton;

    // Handle form
    var handleForm = function (e) {

        // Handle form submit
        submitButton.addEventListener('click', function (e) {
            // Prevent button default action
            e.preventDefault();
            submitButton.disabled = true;

            // Simulate ajax request
            axios.post(submitButton.closest('form').getAttribute('action'), new FormData(form))
                .then(function (response) {
                    document.location.href="/";
                })
                .catch(function (error) {
                    let dataMessage = "";
                    let dataErrors = error.response.data.errors;
                    for (const errorsKey in dataErrors) {
                        if (!dataErrors.hasOwnProperty(errorsKey)) continue;
                        dataMessage += "\r\n" + dataErrors[errorsKey];
                    }
                    if (error.response) alert(dataMessage);
                })
                .then(function () {
                    submitButton.disabled = false;
                });
        });
    }

    // Public functions
    return {
        // Initialization
        init: function () {
            form = document.querySelector('#nefes_sign_in_form');
            submitButton = document.querySelector('#nefes_sign_in_submit');
            handleForm();
        }
    };
}();

// On document ready
NefesSigninGeneral.init();
