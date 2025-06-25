"use strict";

var KTCategoryList = function () {
    // Define shared variables
    var table = document.getElementById('kt_table_moods');

    var addForm = document.getElementById('kt_modal_add_form');

    var filterForm = document.getElementById('menuSub');

    var datatable;
    var toolbarBase;
    var toolbarSelected;
    var selectedCount;
    var deleteAction = document.getElementsByTagName('data-kt-table-filter');

    // Private functions
    var initCategoryTable = function () {

        $(filterForm.querySelector('select[name="mood_id"]')).select2();
        $(addForm.querySelector('select[name="mood_id"]')).select2();
        $(addForm.querySelector('select[name="content_id"]')).select2();



        // Init datatable --- more info on datatables: https://datatables.net/manual/
        datatable = $(table).DataTable({
            "info": false,
            'order': [[1, 'asc']],
            "pageLength": 10,
            "lengthChange": true,
            'columnDefs': [
                { orderable: false, targets: 0 }, // Disable ordering on column 0 (checkbox)
                { orderable: false, targets: 6 }, // Disable ordering on column 4 (actions)
            ],
            "language" : {
                url: "/vendor/datatables/lang/tr.json"
            },

        });

        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
        datatable.on('draw', function () {
            initToggleToolbar();
            handleDeleteRows();
            toggleToolbars();
        });

    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[data-kt-table-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    // Filter Datatable
    var handleFilterDatatable = () => {
        // Select filter options
        const filterForm = document.querySelector('[data-kt-table-filter="form"]');
        const filterButton = filterForm.querySelector('[data-kt-table-filter="filter"]');
        const selectOptions = filterForm.querySelectorAll('select');

        // Filter datatable on submit
        filterButton.addEventListener('click', function () {
            var filterString = '';

            // Get filter values
            selectOptions.forEach((item, index) => {
                if (item.value && item.value !== '') {
                    if (index !== 0) {
                        filterString += ' ';
                    }

                    // Build filter value options
                    filterString += item.value;
                }
            });

            // Filter datatable --- official docs reference: https://datatables.net/reference/api/search()
            datatable.search(filterString).draw();
        });
    }

    // Reset Filter
    var handleResetForm = () => {
        // Select reset button
        const resetButton = document.querySelector('[data-kt-table-filter="reset"]');

        // Reset datatable
        resetButton.addEventListener('click', function () {
            // Select filter options
            const filterForm = document.querySelector('[data-kt-table-filter="form"]');
            const selectOptions = filterForm.querySelectorAll('select');

            // Reset select2 values -- more info: https://select2.org/programmatic-control/add-select-clear-items
            selectOptions.forEach(select => {
                $(select).val('').trigger('change');
            });

            // Reset datatable --- official docs reference: https://datatables.net/reference/api/search()
            datatable.search('').draw();
        });
    }


    // Delete subscirption
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = table.querySelectorAll('[data-kt-table-filter="delete_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {

                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                // Get category name
                const recordName = parent.querySelectorAll('td')[1].querySelectorAll('a')[0].innerText;


                Swal.fire({
                    text: "Seçili " + recordName + " kayıtını silmek istediğinize emin misiniz?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Evet, silinsin!",
                    cancelButtonText: "Hayır, vazgeç!",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    if (result.value) {

                        // Simulate ajax request
                        axios.delete(d.getAttribute('href'), {mood_id:recordName})
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
                            .then(function () {});

                        Swal.fire({
                            text: "You have deleted " + categoryName + "!.",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        }).then(function () {
                            // Remove current row
                            datatable.row($(parent)).remove().draw();
                        }).then(function () {
                            // Detect checked checkboxes
                            toggleToolbars();
                        });
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: customerName + " was not deleted.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        });
                    }
                });
            })
        });
    }

    // Init toggle toolbar
    var initToggleToolbar = () => {
        // Toggle selected action toolbar
        // Select all checkboxes
        const checkboxes = table.querySelectorAll('[type="checkbox"]');

        // Select elements
        toolbarBase = document.querySelector('[data-kt-table-toolbar="base"]');
        toolbarSelected = document.querySelector('[data-kt-table-toolbar="selected"]');
        selectedCount = document.querySelector('[data-kt-table-select="selected_count"]');
        const deleteSelected = document.querySelector('[data-kt-table-select="delete_selected"]');

        // Toggle delete selected toolbar
        checkboxes.forEach(c => {
            // Checkbox on click event
            c.addEventListener('click', function () {
                setTimeout(function () {
                    toggleToolbars();
                }, 50);
            });
        });

        // Deleted selected rows
        deleteSelected.addEventListener('click', function () {

            Swal.fire({
                text: "Seçili kayıtların hepsini silmek istediğinize emin misiniz?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Evet, silinsin!",
                cancelButtonText: "Hayır, vazgeç!",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(function (result) {
                if (result.value) {

                    // Remove all selected customers
                    checkboxes.forEach(c => {
                        if (c.checked) {
                            var item = $(c).val();

                            axios.delete("moods/"+item, {mood_id:item})
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
                                    Swal.fire({
                                        text: "Seçili Kategorilerin hepsi kaldırıldı!.",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Tamam, anladım!",
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-primary",
                                        }
                                    }).then(function () {
                                        toggleToolbars(); // Detect checked checkboxes
                                        initToggleToolbar(); // Re-init toolbar to recalculate checkboxes
                                    });
                                });

                            datatable.row($(c.closest('tbody tr'))).remove().draw();
                        }
                    });

                    // Remove header checked box
                    const headerCheckbox = table.querySelectorAll('[type="checkbox"]')[0];
                    headerCheckbox.checked = false;

                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Selected customers was not deleted.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary",
                        }
                    });
                }
            });
        });
    }

    // Toggle toolbars
    const toggleToolbars = () => {
        // Select refreshed checkbox DOM elements
        const allCheckboxes = table.querySelectorAll('tbody [type="checkbox"]');

        // Detect checkboxes state & count
        let checkedState = false;
        let count = 0;

        // Count checked boxes
        allCheckboxes.forEach(c => {
            if (c.checked) {
                checkedState = true;
                count++;
            }
        });

        // Toggle toolbars
        if (checkedState) {
            selectedCount.innerHTML = count;
            toolbarBase.classList.add('d-none');
            toolbarSelected.classList.remove('d-none');
        } else {
            toolbarBase.classList.remove('d-none');
            toolbarSelected.classList.add('d-none');
        }
    }

    return {
        // Public functions
        init: function () {
            if (!table) return;

            initCategoryTable();
            initToggleToolbar();
            handleSearchDatatable();
            handleResetForm();
            handleDeleteRows();
            handleFilterDatatable();

        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTCategoryList.init();
});
