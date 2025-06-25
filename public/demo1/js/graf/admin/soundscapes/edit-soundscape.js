"use strict";

// Class definition
var KTModalNewAddress = function () {
	var submitButton;
	var validator;
	var form;

	// Init form inputs
	var initForm = function() {

		$('input[type=checkbox][name=status]').change(function() {
			($(this).is(':checked')) ? $(this).val(1).attr('checked', true): $(this).val(0).removeAttr('checked');
			($(this).is(':checked')) ? $("span.status").html('Aktif'): $("span.status").html('Pasif');
		});

		// Team assign. For more info, plase visit the official plugin site: https://select2.org/
        $(form.querySelector('[name="content"]')).select2().on('change', function() {
            // Revalidate the field when an option is chosen
            validator.revalidateField('content');
        });
	}

	// Handle form validation and submittion
	var handleForm = function() {
		// Toastr Defination
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


		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validator = FormValidation.formValidation(
			form,
			{
				fields: {
					'title': {
						validators: {
							notEmpty: {
								message: 'Başlığını girin.'
							}
						}
					},
					'description': {
						validators: {
							notEmpty: {
								message: 'Açıklama yazısı ekleyin.'
							}
						}
					},
					'content': {
						validators: {
							notEmpty: {
								message: 'Bağlı olduğu içeriği seçin.'
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

		// Action buttons
		submitButton.addEventListener('click', function (e) {
			e.preventDefault();

			// Validate form before submit
			if (validator) {
				validator.validate().then(function (status) {
					console.log('validated!');

					if (status === 'Valid') {
						submitButton.setAttribute('data-kt-indicator', 'on');

						// Disable button to avoid multiple click
						submitButton.disabled = true;
						$("div.card").addClass("overlay overlay-block");
						$(".overlay-layer").toggleClass("d-none d-flex");

						// Simulate ajax request
						axios.post(form.getAttribute('action'), new FormData(form))
							.then(function (response) {
								$("div.card").removeClass("overlay overlay-block");
								$(".overlay-layer").toggleClass("d-flex d-none");

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
								//setTimeout(function(){ form.reset(); window.location.reload(); }, 3050);
							});


					} else {
						// Show error message.
						Swal.fire({
							text: "Üzgünüz, sanırım bir sorunla karşılaştınız, lütfen tekrar deneyin.",
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
	}

	return {
		// Public functions
		init: function () {
			form = document.querySelector('#updateForm');
			submitButton = document.getElementById('formSubmit');

			initForm();
			handleForm();
		}
	};
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTModalNewAddress.init();
});
