<!--begin::Modals-->
<!--begin::Modal - Add Category-->
<div class="modal fade" id="kt_modal_add" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Add Content to Mood</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-modal-action="close">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                      transform="rotate(-45 6 17.3137)" fill="currentColor"/>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                      fill="currentColor"/>
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
                <form id="kt_modal_add_form" class="form" action="{{ route('admin.moods.store') }}">
                    @csrf @method('POST')
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y me-n7 pe-7"
                         id="kt_modal_add_scroll" data-kt-scroll="true"
                         data-kt-scroll-activate="{default: false, lg: true}"
                         data-kt-scroll-max-height="auto"
                         data-kt-scroll-dependencies="#kt_modal_add_header"
                         data-kt-scroll-wrappers="#kt_modal_add_scroll"
                         data-kt-scroll-offset="300px">

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Moods</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="mood_id" class="form-select form-select-solid form-select-lg"
                                    data-dropdown-parent="#kt_modal_add" data-control="select2"
                                    data-placeholder="Select a Mood" data-allow-clear="true">
                                <option value="">Select Mood...</option>
                                {{--                                @foreach ($moods as $item)--}}
                                {{--                                    <option value="{{ $item->mood_id }}">{{ $item->title }}</option>--}}
                                {{--                                @endforeach--}}
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
                            <select name="content_id" class="form-select form-select-solid form-select-lg"
                                    data-dropdown-parent="#kt_modal_add" data-control="select2"
                                    data-placeholder="Select a Content" data-allow-clear="true">
                                <option value="">Select Content...</option>
                                {{--                                @foreach ($contents as $item)--}}
                                {{--                                    <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->title }}</option>--}}
                                {{--                                @endforeach--}}
                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->


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
                <h2 class="fw-bold">Update Program</h2>
                <!--end::Modal title-->
                <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#programDetail">Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#programGains">Gain</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#programSections">Sections</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#programImages">Images</a>
                    </li>
                </ul>
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
                <form id="kt_modal_update_form" class="form" data-redirect-url="{{ env('APP_URL') }}/">
                    @csrf @method('POST')
                    <!--begin::Scroll-->
                    <div class="scroll-y me-n7 pe-7"
                         id="kt_modal_update_scroll" data-kt-scroll="true"
                         data-kt-scroll-activate="{default: false, lg: true}"
                         data-kt-scroll-max-height="auto"
                         data-kt-scroll-dependencies="#kt_modal_update_header"
                         data-kt-scroll-wrappers="#kt_modal_update_scroll"
                         data-kt-scroll-offset="300px">
                        <div class="tab-content " id="programTabContents">
                            <div class="tab-pane fade show active" id="programDetail" role="tabpanel">
                                <div class="d-flex col-12">
                                    <div class="col-4 pe-10">
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-col mb-7 pe-10">
                                            <div class="col-6 pe-5">
                                                <!--begin::Label-->
                                                <label class="fw-semibold fs-6 mb-2">Program ID</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="program_id"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="Program ID" disabled/>
                                                <!--end::Input-->
                                            </div>
                                            <div class="col-6 ">
                                                <!--begin::Label-->
                                                <label class="fw-semibold fs-6 mb-2">Program Version</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="version"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="Program Version" disabled/>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7 pe-10">
                                            <!--begin::Label-->
                                            <label class="fw-semibold fs-6 mb-2">Program Title</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="title"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="Program Title"/>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7 pe-10">
                                            <!--begin::Label-->
                                            <label class="fw-semibold fs-6 mb-2">Authors</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select name="author_id"
                                                    class="form-select form-select-solid form-select-lg"
                                                    data-dropdown-parent="#kt_modal_update" data-control="select2"
                                                    data-placeholder="Select a Author" data-allow-clear="true">
                                                <option value="">Select Authors...</option>
                                                @foreach ($authors as $person)
                                                    <option
                                                        value="{{ $person['id'] }}">{{ $person['fullname'] }}</option>
                                                @endforeach
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->


                                        <!--begin::Input group-->
                                        <div class="d-flex fv-row mb-7">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7 pe-10">
                                                <!--begin::Label-->
                                                <label class="fw-semibold fs-6 mb-5">Program isOnSale</label>
                                                <!--end::Label-->
                                                <label
                                                    class="form-check form-switch form-check-custom form-check-solid">
                                                    <input name="isOnSale" class="form-check-input"
                                                           type="checkbox" @checked(old('isOnSale') == 1)/>
                                                    <span class="form-check-label isOnSale">No</span>
                                                </label>
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Input group-->
                                            <div class=" fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fw-semibold fs-6 mb-5">Program isNew</label>
                                                <!--end::Label-->
                                                <label
                                                    class="form-check form-switch form-check-custom form-check-solid">
                                                    <input name="isNew" class="form-check-input"
                                                           type="checkbox" @checked(old('isNew') == 1)/>
                                                    <span class="form-check-label isNew">Standard</span>
                                                </label>
                                            </div>
                                            <!--end::Input group-->

                                        </div>
                                        <!--end::Input group-->

                                    </div>
                                    <div class="col-4 pe-10">

                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7 pe-10">
                                            <!--begin::Label-->
                                            <label class="fw-semibold fs-6 mb-2">Product</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select name="product_id"
                                                    class="form-select form-select-solid form-select-lg"
                                                    data-dropdown-parent="#kt_modal_update" data-control="select2"
                                                    data-placeholder="Select a Product" data-allow-clear="true">
                                                <option value="">Select Product...</option>
                                                @foreach ($products as $item)
                                                    <option
                                                        value="{{ $item['id'] }}">{{ $item['product_title'] }}</option>
                                                @endforeach
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7 pe-10">
                                            <!--begin::Label-->
                                            <label class="fw-semibold fs-6 mb-2">Discounted Products</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select name="discounted_product_id"
                                                    class="form-select form-select-solid form-select-lg"
                                                    data-dropdown-parent="#kt_modal_update" data-control="select2"
                                                    data-placeholder="Select a Discounted Product"
                                                    data-allow-clear="true">
                                                <option value="">Select Discounted Products...</option>
                                                @foreach ($discounted as $item)
                                                    <option
                                                        value="{{ $item['id'] }}">{{ $item['product_title'] }}</option>
                                                @endforeach
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7 pe-10">
                                            <!--begin::Label-->
                                            <label class="fw-semibold fs-6 mb-2">Discount Rate</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select name="discountRate"
                                                    class="form-select form-select-solid form-select-lg"
                                                    data-dropdown-parent="#kt_modal_update" data-control="select2"
                                                    data-placeholder="Select a Discount" data-allow-clear="true">
                                                <option value="">Select Discount Rate...</option>
                                                @foreach ($rate as $key => $val)
                                                    <option value="{{ $key }}">{{ $val }}%</option>
                                                @endforeach
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="d-flex fv-row mb-7">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7 pe-10">
                                                <!--begin::Label-->
                                                <label class="fw-semibold fs-6 mb-5">Program Validation</label>
                                                <!--end::Label-->
                                                <label
                                                    class="form-check form-switch form-check-custom form-check-solid">
                                                    <input name="isValid" class="form-check-input"
                                                           type="checkbox" @checked(old('isValid') == 1)/>
                                                    <span class="form-check-label isValid">Invalid</span>
                                                </label>
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7 pe-10">
                                                <!--begin::Label-->
                                                <label class="fw-semibold fs-6 mb-5">Program Free/Premium</label>
                                                <!--end::Label-->
                                                <label
                                                    class="form-check form-switch form-check-custom form-check-solid">
                                                    <input name="isFree" class="form-check-input"
                                                           type="checkbox" @checked(old('isFree') == 1)/>
                                                    <span class="form-check-label isFree">Free</span>
                                                </label>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <div class="col-4 pe-10">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="fw-semibold fs-6 mb-2">Program Description</label>
                                            <!--end::Label-->
                                            <textarea name="description"
                                                      class="form-control form-control-solid min-h-150px"
                                                      maxlength="500" data-kt-autosize="true"></textarea>
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="fw-semibold fs-6 mb-2">Program Information</label>
                                            <!--end::Label-->
                                            <textarea name="information"
                                                      class="form-control form-control-solid min-h-150px"
                                                      maxlength="600" data-kt-autosize="true"></textarea>
                                        </div>
                                        <!--end::Input group-->


                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="programGains" role="tabpanel">
                                <div class="col-4 pe-10 float-start">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7 pe-10 ">
                                        <!--begin::Label-->
                                        <label class="fw-semibold fs-6 mb-2">Gain Title</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="gains_title"
                                               class="form-control form-control-solid mb-3 mb-lg-0"
                                               placeholder="Gain Title"/>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fw-semibold fs-6 mb-2">Gain Description</label>
                                        <!--end::Label-->
                                        <textarea name="gains_description"
                                                  class="form-control form-control-solid min-h-150px" maxlength="500"
                                                  data-kt-autosize="true"></textarea>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            </div>
                            <div class="tab-pane fade" id="programSections" role="tabpanel">
                                <div class="table-responsive p-5">
                                    <div id="showData"></div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="programImages" role="tabpanel">
                                <div class="d-flex flex-column flex-row-fluid px-15 pb-15">
                                    <div class="d-flex flex-row h-75px">
                                        <div class="d-flex flex-column w-300px h-50px ps-5 flex-start">
                                            <span class="text-black">Cover Image</span>
                                            <span class="text-black">JPG - 1:1 </span>
                                            <span class="text-black">(1600x1600)</span>
                                        </div>
                                        <div class="d-flex flex-column w-300px h-50px ps-5 flex-start">
                                            <span class="text-black">Quest Background Image</span>
                                            <span class="text-black">JPG - 1:1</span>
                                            <span class="text-black">(1000x750)</span>
                                        </div>
                                        <div class="d-flex flex-column w-300px h-50px ps-5 flex-start">
                                            <span class="text-black">Trailer Cover Image</span>
                                            <span class="text-black">JPG - 1:1</span>
                                            <span class="text-black">(1600x900)</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row flex-column-fluid">
                                        <div class="d-flex flex-row-auto w-300px flex-start">
                                            <!--begin::Image input-->
                                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{ asset('storage/uploads/programs/301027/coverImage.webp' ?? 'storage/placeholder-program-cover.jpg') }})">
                                                <!--begin::Image preview wrapper-->
                                                <div class="image-input-wrapper h-200px w-200px bgi-position-center" style="background-image: url({{ asset('storage/uploads/programs/301027/coverImage.webp' ?? 'storage/placeholder-program-cover.jpg') }})">
                                                </div>
                                                <!--end::Image preview wrapper-->

                                                <!--begin::Edit button-->
                                                <label
                                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                                    title="Görseli Değiştir">
                                                    <i class="bi bi-pencil-fill fs-7"></i>

                                                    <!--begin::Inputs-->
                                                    <input type="file" name="coverImageUrl" accept=".png, .jpg, .jpeg, .webp" />
                                                    <input type="hidden" name="coverImageUrl_remove" />
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
                                        <div class="d-flex flex-row-auto w-300px flex-start">
                                            <!--begin::Image input-->
                                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{ asset('storage/uploads/programs/301027/bgImage.webp' ?? 'storage/placeholder-program-quest.jpg') }})">
                                                <!--begin::Image preview wrapper-->
                                                <div class="image-input-wrapper h-150px w-250px bgi-position-center" style="background-image: url({{ asset('storage/uploads/programs/301027/bgImage.webp' ?? 'storage/placeholder-program-quest.jpg') }})">
                                                </div>
                                                <!--end::Image preview wrapper-->

                                                <!--begin::Edit button-->
                                                <label
                                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                                    title="Görseli Değiştir">
                                                    <i class="bi bi-pencil-fill fs-7"></i>

                                                    <!--begin::Inputs-->
                                                    <input type="file" name="bgImageUrl" accept=".png, .jpg, .jpeg, .webp" />
                                                    <input type="hidden" name="bgImageUrl_remove" />
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
                                        <div class="d-flex flex-row-auto w-300px flex-start">
                                            <!--begin::Image input-->
                                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{ asset('storage/uploads/programs/301027/trailerCoverImage.webp' ?? 'storage/placeholder-program-trailer.jpg') }})">
                                                <!--begin::Image preview wrapper-->
                                                <div class="image-input-wrapper h-100px w-250px bgi-position-center" style="background-image: url({{ asset('storage/uploads/programs/301027/trailerCoverImage.webp' ?? 'storage/placeholder-program-trailer.jpg')}})">
                                                </div>
                                                <!--end::Image preview wrapper-->

                                                <!--begin::Edit button-->
                                                <label
                                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                                    title="Görseli Değiştir">
                                                    <i class="bi bi-pencil-fill fs-7"></i>

                                                    <!--begin::Inputs-->
                                                    <input type="file" name="trailerCoverImageUrl" accept=".png, .jpg, .jpeg, .webp" />
                                                    <input type="hidden" name="trailerCoverImageUrl_remove" />
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
