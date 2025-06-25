"use strict";

// Class definition
var KTModalNewAddress = function () {
	var submitButton;
	var validator;
	var form;
    var objectUrl;

	// Init form inputs
	var initForm = function() {

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
					'imgCover': {
						validators: {
							notEmpty: {
								message: 'Lütfen görsel ekleyin.'
							}
						}
					},
					'soundscape': {
						validators: {
							notEmpty: {
								message: 'Lütfen ses dosyasını ekleyin.'
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
