<!--begin::Modal - New Card-->
<div class="modal fade" id="kt_modal_new_card" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content card">
            <div class="overlay-layer card-rounded bg-dark bg-opacity-20 d-none">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <!--begin::Form-->
            <form class="form" action="{{ route('admin.cards.store') }}" id="kt_modal_new_card_form">
                @csrf @method('POST')
                <input type="hidden" name="deck_id" value="{{ request()->deck }}">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_new_card_header">
                    <!--begin::Modal title-->
                    <h2>Add New Card</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
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
                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_new_card_scroll" data-kt-scroll="true"
                         data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                         data-kt-scroll-dependencies="#kt_modal_new_card_header"
                         data-kt-scroll-wrappers="#kt_modal_new_card_scroll" data-kt-scroll-offset="300px">

                        <!--begin::Input group-->
                        <div class="row mb-5">
                            <!--begin::Col-->
                            <div class="col-md-12 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-semibold mb-2">Card Title</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="Card Title" name="title"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row mb-5">
                            <!--begin::Col-->
                            <div class="col-md-12 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-semibold mb-2">Card Description</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <textarea name="description" class="form-control form-control-solid mb-3" rows="6" data-kt-element="input" placeholder="Type a description"></textarea>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->


                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span class="required">Related Content</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                   title="Bu kart seçeceğiniz içerikte görüntülenecektir"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Select-->
                            <!--begin::Select-->

                            <!--end::Select-->

                            <select name="content_id" data-control="select2" id="contentSelect"
                                    data-dropdown-parent="#kt_modal_new_card"
{{--                                    data-dropdown-parent="body"--}}
                                    data-placeholder="Select a Content..." class="form-select form-select-solid">
                                <option value="">Select a Content...</option>
                                @foreach (\App\Models\Admin\Content::withoutTrashed()->get() as $item)
                                    <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->title }}</option>
                                @endforeach
                            </select>
                            <!--end::Select-->
                        </div>
                        <!--end::Input group-->


                        <!--begin::Input group-->
                        <div class="row mb-5">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="fs-5 fw-semibold mb-2">Card Order</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input name="order"  pattern="#[a-f0-9]{6}" type="number" class="form-control form-control-solid" id="order" placeholder="Card Order" value="{{ old('order')}}" min="1" max="90" />
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="fs-5 fw-semibold mb-2">Daily Available</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <label class="form-check form-switch form-check-custom form-check-solid col-6 my-2">
                                    <input name="status" class="form-check-input" type="checkbox" value="1"/>
                                    <span class="form-check-label status"></span>
                                </label>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->


                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->

                    <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-light me-3">Discard</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" class="btn btn-sm btn-bg-info text-white" form="kt_modal_new_card_modal" id="kt_modal_new_card_submit">
                        <span class="indicator-label">Save Card</span>
                        <span class="indicator-progress">Saving...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
<!--end::Modal - New Card-->
