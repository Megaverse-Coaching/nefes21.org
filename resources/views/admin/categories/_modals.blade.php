<!--begin::Modals-->

<!--begin::Modal - Add Category-->
<div class="modal fade" id="kt_modal_add_category" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_category_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Add Category</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                     data-kt-category-modal-action="close">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"/>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"/>
                            </svg>
                        </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="kt_modal_add_category_form" class="form" action="{{ route('admin.categories.store') }}">
                    @csrf @method('POST')
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y me-n7 pe-7"
                         id="kt_modal_add_category_scroll" data-kt-scroll="true"
                         data-kt-scroll-activate="{default: false, lg: true}"
                         data-kt-scroll-max-height="auto"
                         data-kt-scroll-dependencies="#kt_modal_add_category_header"
                         data-kt-scroll-wrappers="#kt_modal_add_category_scroll"
                         data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Dimensions</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="dimension_id" id="dimensionSelect"  class="form-select form-select-solid form-select-lg" data-dropdown-parent="#kt_modal_add_category_form" data-control="select2" data-placeholder="Select a Dimension" data-allow-clear="true" >
                                <option value="">Select Dimension...</option>
                                @foreach ($dimensions as $item)
                                    <option value="{{ $item->dimension }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Title</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="title" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter a Category Title" value=""/>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Description</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="description" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter a Category Description" value=""/>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <div class="row">

                            <div class="col-md-6 float-left">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fw-semibold fs-6 mb-2">Order</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" name="order" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Sıra numarası verin" min="1"/>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <div class="col-md-6 float-right">
                                <!--begin::Label-->
                                <label class="fw-semibold fs-6 mb-2">Status</label>
                                <!--end::Label-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <label class="form-check form-switch form-check-custom form-check-solid col-6">
                                        <input name="status" class="form-check-input" type="checkbox" value="{{ old('status')}}"/>
                                        <span class="form-check-label status">Pasif</span>
                                    </label>
                                </div>
                                <!--end::Input group-->
                            </div>
                        </div>
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-kt-category-modal-action="cancel">Discard
                        </button>
                        <button type="submit" class="btn btn-primary" data-kt-category-modal-action="submit">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Add Category-->


<!--begin::Modal - Update Category-->
<div class="modal fade" id="kt_modal_update_category" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_update_category_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Update Category</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                     data-kt-category-modal-action="close">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"/>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"/>
                            </svg>
                        </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="kt_modal_update_category_form" class="form">

                    @csrf @method('PATCH')
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y me-n7 pe-7"
                         id="kt_modal_update_category_scroll" data-kt-scroll="true"
                         data-kt-scroll-activate="{default: false, lg: true}"
                         data-kt-scroll-max-height="auto"
                         data-kt-scroll-dependencies="#kt_modal_update_category_header"
                         data-kt-scroll-wrappers="#kt_modal_update_category_scroll"
                         data-kt-scroll-offset="300px">

                        <!--begin::Input group-->
                        <div class="row mb-5">
                            <!--begin::Col-->
                            <div class="col-md-12 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-semibold mb-2">Category ID</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" name="category" disabled/>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Dimensions</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="dimension_id" id="dimensionSelect"  class="form-select form-select-solid form-select-lg" data-dropdown-parent="#kt_modal_update_category" data-control="select2" data-placeholder="Select a Dimension" data-allow-clear="true" >
                                <option value="">Select Dimension...</option>
                                @foreach ($dimensions as $item)
                                    <option value="{{ $item->dimension }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Title</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="title" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter a Category Title" value=""/>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Description</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="description" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter a Category Description" value=""/>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <div class="row">

                            <div class="col-md-6 float-left">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fw-semibold fs-6 mb-2">Order</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" name="order" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Sıra numarası verin" min="1"/>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <div class="col-md-6 float-right">
                                <!--begin::Label-->
                                <label class="fw-semibold fs-6 mb-2">Status</label>
                                <!--end::Label-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <label class="form-check form-switch form-check-custom form-check-solid col-6">
                                        <input name="status" class="form-check-input" type="checkbox" value="{{ old('status')}}"/>
                                        <span class="form-check-label status">Pasif</span>
                                    </label>
                                </div>
                                <!--end::Input group-->
                            </div>
                        </div>
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-kt-category-modal-action="cancel">Discard
                        </button>
                        <button type="submit" class="btn btn-primary" data-kt-category-modal-action="submit">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Add Category-->



<!--end::Modals-->
