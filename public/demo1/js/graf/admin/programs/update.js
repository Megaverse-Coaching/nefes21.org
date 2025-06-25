"use strict";

// Class definition
var KTUpdateModal = function () {
    // Shared variables
    var table = document.getElementById('kt_table');
    const element = document.getElementById('kt_modal_update');
    const form = element.querySelector('#kt_modal_update_form');

    var dataID, baseURL;
    const modal = new bootstrap.Modal(element);

    $(form.querySelector('select[name="product_id"]')).select2();
    $(form.querySelector('select[name="discounted_product_id"]')).select2();
    $(form.querySelector('select[name="discountRate"]')).select2();
    $(form.querySelector('select[name="author_id"]')).select2();

    $('input[type=checkbox][name=isValid]').change(function () {
        ($(this).is(':checked')) ? $(this).val(1).attr('checked', true) : $(this).val(0).removeAttr('checked');
        ($(this).is(':checked')) ? $("span.isValid").html('Valid') : $("span.isValid").html('Invalid');
    });
    $('input[type=checkbox][name=isFree]').change(function () {
        ($(this).is(':checked')) ? $(this).val(1).attr('checked', true) : $(this).val(0).removeAttr('checked');
        ($(this).is(':checked')) ? $("span.isFree").html('Premium') : $("span.isFree").html('Free');
    });
    $('input[type=checkbox][name=isNew]').change(function() {
        ($(this).is(':checked')) ? $(this).val(1).attr('checked', true): $(this).val(0).removeAttr('checked');
        ($(this).is(':checked')) ? $("span.isNew").html('New'): $("span.isNew").html('Standard');
    });
    $('input[type=checkbox][name=isOnSale]').change(function() {
        ($(this).is(':checked')) ? $(this).val(1).attr('checked', true): $(this).val(0).removeAttr('checked');
        ($(this).is(':checked')) ? $("span.isOnSale").html('Yes'): $("span.isOnSale").html('No');
    });


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
        baseURL = $(form).attr("data-redirect-url");

        if(dataID){
            // Simulate ajax request
            axios.get(baseURL + 'admin/programs/'+dataID).then(function (response) {
                var result = response.data.result[0];
                var gains = response.data.gains[0];
                var sections = response.data.sections;
                var parts = response.data.parts;

                console.dir(parts);

                $.each(parts, (key, val) => tableFromJson(val.parts, val.section_id, val.section_title, val.section_id, baseURL));

                const gainsTitle = element.querySelector("input[name=gains_title]");
                $(gainsTitle).val(gains.title);

                const gainsDescription = element.querySelector("textarea[name=gains_description]");
                $(gainsDescription).val(gains.description);

                const title = element.querySelector('input[name=title]');
                $(title).val(result.title);

                const program_id = element.querySelector('input[name=program_id]');
                $(program_id).val(result.program_id);

                const version = element.querySelector('input[name=version]');
                $(version).val(result.version);

                const description = element.querySelector('textarea[name=description]');
                $(description).val(result.description);

                const information = element.querySelector('textarea[name=information]');
                $(information).val(result.information);


                const author_id = element.querySelector('select[name=author_id]');
                $(author_id).val(result.author_id).trigger('change').attr("data-placeholder", result.author_id);

                const isFree = element.querySelector('input[name=isFree]');
                (result.isFree === 1) ? $(isFree).val(1).attr('checked', true) : $(isFree).val(0).removeAttr('checked');
                (result.isFree === 1) ? $("span.isFree").html('Premium'): $("span.isFree").html('Free');

                const isValid = element.querySelector('input[name=isValid]');
                (result.isValid === 1) ? $("span.isValid").html('Valid'): $("span.isValid").html('InValid');
                (result.isValid === 1) ? $(isValid).val(1).attr('checked', true) : $(isValid).val(0).removeAttr('checked');


                const isOnSale = element.querySelector('input[name=isOnSale]');
                (result.isOnSale === 1) ? $(isOnSale).val(1).attr('checked', true) : $(isOnSale).val(0).removeAttr('checked');
                (result.isOnSale === 1) ? $("span.isOnSale").html('Yes'): $("span.isOnSale").html('No');

                const isNew = element.querySelector('input[name=isNew]');
                (result.isNew === 1) ? $("span.isNew").html('Valid'): $("span.isNew").html('isNew');
                (result.isNew === 1) ? $(isNew).val(1).attr('checked', true) : $(isNew).val(0).removeAttr('checked');

                const product_id = element.querySelector('select[name=product_id]');
                $(product_id).val(result.product[0].id).trigger('change').attr("data-placeholder", result.product[0].id);

                const discountRate = element.querySelector('select[name=discountRate]');
                $(discountRate).val(result.discountRate).trigger('change').attr("data-placeholder", result.discountRate);

                const discounted_product_id = element.querySelector('select[name=discounted_product_id]');
                $(discounted_product_id).val(result.product[1].id).trigger('change').attr("data-placeholder", result.product[1].id);

            }).catch(function (error) {
                    let dataMessage = error.message;
                    let dataErrors = error.errors;
                    let resErrors;

                    // if (typeof  error.response.data.message !== 'undefined') resErrors = error.response.data.message;

                    for (const errorsKey in dataErrors) {
                        if (!dataErrors.hasOwnProperty(errorsKey)) continue;
                        dataMessage += "\r\n" + dataErrors[errorsKey];
                    }
                    if (error) {
                        Swal.fire({
                            text: dataMessage,
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



    let tableFromJson = (dataObj, idNo, hdr, spn, baseUrl) => {

        if(dataObj){

            let col = [];
            for (let i = 0; i < dataObj.length; i++) for (let key in dataObj[i]) if (col.indexOf(key) === -1) col.push(key);

            // Create a table.
            const table = document.createElement("table");
            const header = table.createTHead();


            // Create table header row using the extracted headers above.
            let tHeadTR = table.insertRow(-1); // table row.
            let tr = table.insertRow(-1); // table row.
            for (let i = 0; i < col.length; i++) {
                let th = document.createElement("th");// table header.
                th.innerHTML = col[i];
                tHeadTR.appendChild(th);
            }
            header.appendChild(tHeadTR);

            $(tHeadTR).addClass("fw-bold fs-6 text-gray-800");


            // add json data to the table as rows.
            for (let i = 0; i < dataObj.length; i++) {
                tr = table.insertRow(-1);
                for (let j = 0; j < col.length; j++) {
                    let tabCell = tr.insertCell(-1);
                    tabCell.innerHTML = dataObj[i][col[j]];
                }
                var actionBtn = `
                    <td class="text-end">
                        <a data-id="{{ $item->program_id }}" data-redirect-url="{{ env('APP_URL') }}/"  id="updateButton"  class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                            <span class="svg-icon svg-icon-3">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
                            </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                        <a href="${baseUrl + 'admin/'}"  data-kt-table-filter="delete_row" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                            <span class="svg-icon svg-icon-3">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor" />
                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor" />
                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor" />
                            </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                    </td>`;
                $(tr).append(actionBtn);
            }


            // Now, add the newly created table with json data, to a container.

            const divShowData = document.getElementById('showData');
            const createdDiv = document.createElement('div');
            const headerH3 = document.createElement('h3');
            const span = document.createElement('span');

            divShowData.innerHTML += "";
            $(createdDiv).attr("id", idNo);
            $(headerH3).text(hdr);
            $(span).text(spn);

            createdDiv.appendChild(headerH3);
            createdDiv.appendChild(span);
            createdDiv.appendChild(table);

            divShowData.appendChild(createdDiv);

            $(table).addClass("gy-1 table table-hover table-row-dashed table-row-gray-300");
        }

    }

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
                        axios.post("showcase-pools/"+dataID, new FormData(form))
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
                                // $(table).DataTable().draw();

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

                form.reset();
                modal.hide();
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
            tableFromJson();
            initUpdateForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUpdateModal.init();
});
