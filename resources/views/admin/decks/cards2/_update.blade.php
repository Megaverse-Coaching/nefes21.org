@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form id="cardUpdateForm" action="{{ route('admin.cards.update', $card->id) }}">
    @csrf @method('PATCH')
    <input type="hidden" name="deck_id" value="{{ $deck_id }}">
    <!--begin::Input group-->
    <div class="row mb-5">
        <!--begin::Col-->
        <div class="col-md-12 fv-row">
            <!--begin::Label-->
            <label class="required fs-5 fw-semibold mb-2">Card Title</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid" placeholder="" name="title" value="{{ $card->title }}"/>
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
            <textarea name="description" class="form-control form-control-solid mb-3" rows="6" data-kt-element="input" placeholder="Type a description">{{ $card->description }}</textarea>
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
                data-dropdown-parent="#cardUpdateForm"
                data-placeholder="Select a Content..." class="form-select form-select-solid">
            <option value="">Select a Content...</option>
            @foreach (\App\Models\Admin\Content::withoutTrashed()->get() as $item)
                <option value="{{ $item->id }}" @selected($item->id === $card->content_id)>{{ $item->id }} - {{ $item->title }}</option>
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
            <input name="order"  pattern="#[a-f0-9]{6}" type="number" class="form-control form-control-solid" id="order" value="{{ $card->order }}" min="1" max="90" />
            <!--end::Input-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-6 fv-row">
            <!--begin::Label-->
            <label class="fs-5 fw-semibold mb-2">Daily Available</label>
            <!--end::Label-->
            <!--begin::Input-->
            <label class="form-check form-switch form-check-custom form-check-solid col-6">
                <input name="status" class="form-check-input" type="checkbox" value="{{ $card->status }}" @checked($card->status)/>
                <span class="form-check-label status"></span>
            </label>
            <!--end::Input-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
</form>
