
<!--begin::Modals-->
<!--begin::Modal - Add Author-->
<div class="modal fade" id="kt_modal_add" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-75">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Add Author</h2>
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
                <form id="kt_modal_add_form" class="form" action="{{ route('admin.authors.store') }}">
                    @csrf @method('POST')
                    <!--begin::Scroll-->
                    <div class="d-flex flex-row scroll-y me-n7 pe-7 p-3"
                         id="kt_modal_add_scroll" data-kt-scroll="true"
                         data-kt-scroll-activate="{default: false, lg: true}"
                         data-kt-scroll-max-height="auto"
                         data-kt-scroll-dependencies="#kt_modal_add_header"
                         data-kt-scroll-wrappers="#kt_modal_add_scroll"
                         data-kt-scroll-offset="300px">

                        <div class="col-4 pe-10 float-start">

                           <div class="col-12 d-flex justify-content-center">
                               <div class="col-6 me-2">
                                   <!--begin::Input group-->
                                   <div class="fv-row mb-7">
                                       <!--begin::Label-->
                                       <label class="fw-semibold fs-6 mb-2">Author Name</label>
                                       <!--end::Label-->
                                       <!--begin::Input-->
                                       <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Author Name"/>
                                       <!--end::Input-->
                                   </div>
                                   <!--end::Input group-->
                               </div>
                               <div class="col-6">
                                   <!--begin::Input group-->
                                   <div class="fv-row mb-7">
                                       <!--begin::Label-->
                                       <label class="fw-semibold fs-6 mb-2">Author Surname</label>
                                       <!--end::Label-->
                                       <!--begin::Input-->
                                       <input type="text" name="surname" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Author Surname"/>
                                       <!--end::Input-->
                                   </div>
                                   <!--end::Input group-->
                               </div>
                           </div>

                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fw-semibold fs-6 mb-2">Author Label</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="label" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Author Label"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fw-semibold fs-6 mb-2">Author Info</label>
                                <!--end::Label-->
                                <!--begin::Input group-->
                                <div class="form-floating">
                                    <textarea
                                            name="info"
                                            class="form-control form-control-solid kt_autosize min-h-200px"
                                            maxlength="1500"
                                            data-kt-autosize="true"
                                            id="floatingInfo"></textarea>
                                    <label for="floatingInfo">Author Info</label>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="col-4 pe-10 float-start">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fw-semibold fs-6 mb-2">Authors</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="admin_id" class="form-select form-select-solid form-select-lg" data-dropdown-parent="#kt_modal_add" data-control="select2" data-placeholder="Select a Admin" data-allow-clear="true" >
                                    <option value="">Select Admin...</option>
                                    @foreach ($admins as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fw-semibold fs-6 mb-2">Author Title</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="title" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Author Title"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fw-semibold fs-6 mb-2">Author Position</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="position" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Author Position"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <div class="col-12 d-flex justify-center">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7 me-10">
                                    <!--begin::Label-->
                                    <label class="fw-semibold fs-6 mb-5">isConsulting</label>
                                    <!--end::Label-->
                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                        <input name="isConsulting" class="form-check-input" type="checkbox" @checked(old('isConsulting') == 1)/>
                                        <span class="form-check-label isConsulting">Hayır</span>
                                    </label>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7 me-10">
                                    <!--begin::Label-->
                                    <label class="fw-semibold fs-6 mb-5">isShowing</label>
                                    <!--end::Label-->
                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                        <input name="status" class="form-check-input" type="checkbox" @checked(old('status') == 1)/>
                                        <span class="form-check-label isShowing">Hayır</span>
                                    </label>
                                </div>
                                <!--end::Input group-->
                            </div>
                        </div>
                        <div class="col-4 float-end px-3 justify-content-center d-grid">
                                <div class="col">
                                    <h4>Profile Image</h4>
                                    <span>Genişlik (w): 1000px / Yükseklik (h): 750px</span>
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-position-x: center; background-image: url({{ asset('storage/placeholder.jpg')}})">
                                        <!--begin::Image preview wrapper-->
                                        <div class="image-input-wrapper h-200px w-150px"
                                             style="background-position-x: center; background-image: url({{ asset( 'storage/placeholder.jpg') }})">
                                        </div>
                                        <!--end::Image preview wrapper-->

                                        <!--begin::Edit button-->
                                        <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"  title="Görseli Değiştir">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="profilePicUrl" accept=".webp, .png, .jpg, .jpeg" />
                                            <input type="hidden" name="profilePicUrl_remove"/>
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Edit button-->

                                        <!--begin::Cancel button-->
                                        <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                              data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click" title="İptal Et">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <!--end::Cancel button-->

                                        <!--begin::Remove button-->
                                        <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                              data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Görseli Kaldır">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <!--end::Remove button-->
                                    </div>
                                    <!--end::Image input-->

                                </div>
                                <div class="col">
                                    <h4>Cover Image</h4>
                                    <span>Genişlik (w): 2000px / Yükseklik (h): 1500px</span>
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-position-y: center; background-image: url({{asset('storage/placeholder.jpg') }})">
                                        <!--begin::Image preview wrapper-->
                                        <div class="image-input-wrapper h-100px w-300px" style="background-position-y: center; background-image: url({{asset('storage/placeholder.jpg')}});"></div>
                                        <!--end::Image preview wrapper-->

                                        <!--begin::Edit button-->
                                        <label
                                            class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                            title="Görseli Değiştir">
                                            <i class="bi bi-pencil-fill fs-7"></i>

                                            <!--begin::Inputs-->
                                            <input type="file" name="headerImageUrl" accept=".webp, .png, .jpg, .jpeg" />
                                            <input type="hidden" name="headerImageUrl_remove" />
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Edit button-->

                                        <!--begin::Cancel button-->
                                        <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                              data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click" title="İptal Et">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <!--end::Cancel button-->

                                        <!--begin::Remove button-->
                                        <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                              data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Görseli Kaldır">
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
<!--end::Modal - Add Author-->

<!--begin::Modal - Update Author-->
<div class="modal fade" id="kt_modal_update" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-75">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_update_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Update Author Infos</h2>
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

                        <div class="col-4 pe-10 float-start">

                            <div class="col-12 d-flex justify-content-center">
                                <div class="col-6 me-2">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fw-semibold fs-6 mb-2">Author Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Author Name"/>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <div class="col-6">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fw-semibold fs-6 mb-2">Author Surname</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="surname" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Author Surname"/>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            </div>

                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fw-semibold fs-6 mb-2">Author Label</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="label" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Author Label"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fw-semibold fs-6 mb-2">Author Info</label>
                                <!--end::Label-->
                                <!--begin::Input group-->
                                <div class="form-floating">
                                    <textarea
                                        name="info"
                                        class="form-control form-control-solid kt_autosize min-h-200px"
                                        maxlength="1500"
                                        data-kt-autosize="true"
                                        id="floatingInfo"></textarea>
                                    <label for="floatingInfo">Author Info</label>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="col-4 pe-10 float-start">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fw-semibold fs-6 mb-2">Authors</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="admin_id" class="form-select form-select-solid form-select-lg" data-dropdown-parent="#kt_modal_add" data-control="select2" data-placeholder="Select a Admin" data-allow-clear="true" >
                                    <option value="">Select Admin...</option>
                                    @foreach ($admins as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fw-semibold fs-6 mb-2">Author Title</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="title" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Author Title"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fw-semibold fs-6 mb-2">Author Position</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="position" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Author Position"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <div class="col-12 d-flex justify-center">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7 me-10">
                                    <!--begin::Label-->
                                    <label class="fw-semibold fs-6 mb-5">isConsulting</label>
                                    <!--end::Label-->
                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                        <input name="isConsulting" class="form-check-input" type="checkbox" @checked(old('isConsulting') == 1)/>
                                        <span class="form-check-label isConsulting">Hayır</span>
                                    </label>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-7 me-10">
                                    <!--begin::Label-->
                                    <label class="fw-semibold fs-6 mb-5">isShowing</label>
                                    <!--end::Label-->
                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                        <input name="status" class="form-check-input" type="checkbox" @checked(old('status') == 1)/>
                                        <span class="form-check-label isShowing">Hayır</span>
                                    </label>
                                </div>
                                <!--end::Input group-->

                            </div>
                        </div>
                        <div class="col-4 float-end px-3 justify-content-center d-grid">
                            <div class="col">
                                <h4>Profile Image</h4>
                                <span>Genişlik (w): 1000px / Yükseklik (h): 750px</span>
                                <!--begin::Image input-->
                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-position-x: center; background-image: url({{ asset('storage/placeholder.jpg')}})">
                                    <!--begin::Image preview wrapper-->
                                    <div class="image-input-wrapper h-250px w-150px profileImage"
                                         style="background-position-x: center; background-image: url({{ asset( 'storage/placeholder.jpg') }})">
                                    </div>
                                    <!--end::Image preview wrapper-->

                                    <!--begin::Edit button-->
                                    <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"  title="Görseli Değiştir">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" name="profilePicUrl" accept=".webp, .png, .jpg, .jpeg" />
                                        <input type="hidden" name="profilePicUrl_remove"/>
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Edit button-->

                                    <!--begin::Cancel button-->
                                    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                          data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click" title="İptal Et">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                    <!--end::Cancel button-->

                                    <!--begin::Remove button-->
                                    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                          data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Görseli Kaldır">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                    <!--end::Remove button-->
                                </div>
                                <!--end::Image input-->

                            </div>
                            <div class="col">
                                <h4>Cover Image</h4>
                                <span>Genişlik (w): 2000px / Yükseklik (h): 1500px</span>
                                <!--begin::Image input-->
                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-position-y: center; background-image: url({{asset('storage/placeholder.jpg') }})">
                                    <!--begin::Image preview wrapper-->
                                    <div class="image-input-wrapper h-150px w-300px coverImage" style="background-position-y: center; background-image: url({{asset('storage/placeholder.jpg')}});"></div>
                                    <!--end::Image preview wrapper-->

                                    <!--begin::Edit button-->
                                    <label
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                        title="Görseli Değiştir">
                                        <i class="bi bi-pencil-fill fs-7"></i>

                                        <!--begin::Inputs-->
                                        <input type="file" name="headerImageUrl" accept=".webp, .png, .jpg, .jpeg" />
                                        <input type="hidden" name="headerImageUrl_remove" />
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Edit button-->

                                    <!--begin::Cancel button-->
                                    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                          data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click" title="İptal Et">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                    <!--end::Cancel button-->

                                    <!--begin::Remove button-->
                                    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                          data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Görseli Kaldır">
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
<!--end::Modal - Add Author-->
<!--end::Modals-->
