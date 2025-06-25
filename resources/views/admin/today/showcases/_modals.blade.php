
<!--begin::Modals-->
<!--begin::Modal - Add Category-->
<div class="modal fade" id="kt_modal_add" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-75">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Add Content to Today Showcase</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-modal-action="close">
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
                <form id="kt_modal_add_form" class="form" action="{{ route('admin.today-showcases.store') }}">
                    @csrf @method('POST')
                    <!--begin::Scroll-->
                    <div class="d-flex flex-row scroll-y me-n7 pe-7"
                         id="kt_modal_add_scroll" data-kt-scroll="true"
                         data-kt-scroll-activate="{default: false, lg: true}"
                         data-kt-scroll-max-height="auto"
                         data-kt-scroll-dependencies="#kt_modal_add_header"
                         data-kt-scroll-wrappers="#kt_modal_add_scroll"
                         data-kt-scroll-offset="300px">
                        <div class="col-6 pe-10 float-start">

                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fw-semibold fs-6 mb-2">Priority</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" name="priority" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Öncelik sırası verin" min="1" value="0"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fw-semibold fs-6 mb-2">Section</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="showcase_id" class="form-select form-select-solid form-select-lg" data-dropdown-parent="#kt_modal_add" data-control="select2" data-placeholder="Select a Showcase" data-allow-clear="true" >
                                    <option value="">Select Showcase...</option>
                                    @foreach ($showcases as $id => $title)
                                        <option value="{{ $id }}">{{ $title }}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Content</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="content_id" class="form-select form-select-solid form-select-lg" data-dropdown-parent="#kt_modal_add" data-control="select2" data-placeholder="Select a Content" data-allow-clear="true" >
                                    <option value="">Select Content...</option>
                                    @foreach ($contents as $id => $title)
                                        <option value="{{ $id }}">{{ $id }} - {{ $title }}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->


                            <div class="fv-flex mb-7">

                                <!--begin::Input group-->
                                <div class="fv-row mb-7 me-10">
                                    <!--begin::Label-->
                                    <label class="fw-semibold fs-6 mb-5">Showcase Free/Premium</label>
                                    <!--end::Label-->
                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                        <input name="isFree" class="form-check-input" type="checkbox" @checked(old('isFree') == 1)/>
                                        <span class="form-check-label isFree">Free</span>
                                    </label>
                                </div>
                                <!--end::Input group-->


                                <!--begin::Input group-->
                                <div class=" fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fw-semibold fs-6 mb-5">Showcase Validation</label>
                                    <!--end::Label-->
                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                        <input name="isValid" class="form-check-input" type="checkbox" @checked(old('isValid') == 1)/>
                                        <span class="form-check-label isValid">Invalid</span>
                                    </label>
                                </div>
                                <!--end::Input group-->
                            </div>

                        </div>
                        <div class="col-6 pe-10 float-end">


                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fw-semibold fs-6 mb-2">Action Type</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="action" class="form-select form-select-solid form-select-lg" data-dropdown-parent="#kt_modal_add" data-control="select2" data-placeholder="Action Type" data-allow-clear="true" >
                                    <option value="">Select Action Type...</option>
                                    <option value="open_content">Open Content</option>
                                    <option value="open_url">Open URL</option>
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fw-semibold fs-6 mb-2">Showcase Action URL</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="url" name="actionUrl" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Action Url"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->


                            <!--begin::Label-->
                            <label class="fw-semibold fs-6 mb-2">Showcase Action Image</label>
                            <!--end::Label-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Image input-->
                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                     style="background-image: url({{ asset('storage/placeholder.jpg') }})">
                                    <!--begin::Image preview wrapper-->
                                    <div class="image-input-wrapper h-200px w-300px"
                                         style="background-image: url({{ asset('storage/placeholder.jpg') }})">
                                    </div>
                                    <!--end::Image preview wrapper-->

                                    <!--begin::Edit button-->
                                    <label
                                            class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                            title="Görsel Seçin">
                                        <i class="bi bi-pencil-fill fs-7"></i>

                                        <!--begin::Inputs-->
                                        <input type="file" name="imgShowcase" accept=".png, .jpg, .jpeg, .webp" required/>
                                        <input type="hidden" name="showcase_remove"/>
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Edit button-->

                                    <!--begin::Cancel button-->
                                    <span
                                            class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                            title="İptal Et">
                    <i class="bi bi-x fs-2"></i>
                </span>
                                    <!--end::Cancel button-->

                                    <!--begin::Remove button-->
                                    <span
                                            class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                            title="Görseli Kaldır">
                    <i class="bi bi-x fs-2"></i>
                </span>
                                    <!--end::Remove button-->
                                </div>
                                <!--end::Image input-->
                            </div>

                        </div>
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-kt-modal-action="cancel">Discard
                        </button>
                        <button type="submit" class="btn btn-primary" data-kt-modal-action="submit">
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
<div class="modal fade" id="kt_modal_update" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-75">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_update_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Update Showcase Item</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-modal-action="close">
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
                <form id="kt_modal_update_form" class="form">

                    @csrf @method('PATCH')
                    <!--begin::Scroll-->
                    <div class="d-flex flex-row scroll-y me-n7 pe-7"
                         id="kt_modal_update_scroll" data-kt-scroll="true"
                         data-kt-scroll-activate="{default: false, lg: true}"
                         data-kt-scroll-max-height="auto"
                         data-kt-scroll-dependencies="#kt_modal_update_header"
                         data-kt-scroll-wrappers="#kt_modal_update_scroll"
                         data-kt-scroll-offset="300px">
                        <div class="col-6 pe-10 float-start">

                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fw-semibold fs-6 mb-2">Priority</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" name="priority" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Öncelik sırası verin" min="1" value="0"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fw-semibold fs-6 mb-2">Showcase Type</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="showcase_id" class="form-select form-select-solid form-select-lg" data-dropdown-parent="#kt_modal_update" data-control="select2" data-placeholder="Select a Showcase" data-allow-clear="true" >
                                    <option value="">Select Showcase...</option>
                                    @foreach ($showcases as $id => $title)
                                        <option value="{{ $id }}">{{ $title }}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Content</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="content_id" class="form-select form-select-solid form-select-lg" data-dropdown-parent="#kt_modal_update" data-control="select2" data-placeholder="Select a Content" data-allow-clear="true" >
                                    <option value="">Select Content...</option>
                                    @foreach ($contents as $id => $title)
                                        <option value="{{ $id }}">{{ $id }} - {{ $title }}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                        </div>
                        <div class="col-6 pe-10 float-end">


                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fw-semibold fs-6 mb-2">Action Type</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="action" class="form-select form-select-solid form-select-lg" data-dropdown-parent="#kt_modal_update" data-control="select2" data-placeholder="Action Type" data-allow-clear="true" >
                                    <option value="">Select Action Type...</option>
                                    <option value="open_content">Open Content</option>
                                    <option value="open_url">Open URL</option>
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fw-semibold fs-6 mb-2">Showcase Action URL</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="url" name="actionUrl" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Action Url"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <div class="col-12 d-flex justify-center">

                                <!--begin::Input group-->
                                <div class="fv-row mb-7 me-10">
                                    <!--begin::Label-->
                                    <label class="fw-semibold fs-6 mb-5">Showcase Free/Premium</label>
                                    <!--end::Label-->
                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                        <input name="isFree" class="form-check-input" type="checkbox" @checked(old('isFree') == 1)/>
                                        <span class="form-check-label isFree">Free</span>
                                    </label>
                                </div>
                                <!--end::Input group-->


                                <!--begin::Input group-->
                                <div class=" fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fw-semibold fs-6 mb-5">Showcase Validation</label>
                                    <!--end::Label-->
                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                        <input name="isValid" class="form-check-input" type="checkbox" @checked(old('isValid') == 1)/>
                                        <span class="form-check-label isValid">Invalid</span>
                                    </label>
                                </div>
                                <!--end::Input group-->
                            </div>


                        </div>
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-kt-modal-action="cancel">Discard
                        </button>
                        <button type="submit" class="btn btn-primary" data-kt-modal-action="submit">
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
