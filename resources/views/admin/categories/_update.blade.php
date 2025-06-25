@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form id="categoryUpdateForm" action="{{ route('admin.categories.update', $data[0]->category) }}">
    @csrf @method('PATCH')
    <!--begin::Input group-->
    <div class="row mb-5">
        <!--begin::Col-->
        <div class="col-md-12 fv-row">
            <!--begin::Label-->
            <label class="required fs-5 fw-semibold mb-2">Category ID</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid" placeholder="" name="title" value="{{ $data[0]->category }}" disabled/>
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
            <label class="required fs-5 fw-semibold mb-2">Category Title</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid" placeholder="" name="title" value="{{ $data[0]->title }}"/>
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
            <label class="required fs-5 fw-semibold mb-2">Category Description</label>
            <!--end::Label-->
            <!--begin::Input-->
            <textarea name="description" class="form-control form-control-solid mb-3" rows="6" data-kt-element="input" placeholder="Type a description">{{ $data[0]->description }}</textarea>
            <!--end::Input-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->


    <!--begin::Input group-->
    <div class="d-flex flex-column mb-5 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
            <span class="required">Related Dimension</span>
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
               title="Bu kart seçeceğiniz içerikte görüntülenecektir"></i>
        </label>
        <!--end::Label-->
        <!--begin::Select-->
        <!--begin::Select-->

        <!--end::Select-->

        <select name="dimension_id" id="dimensionSelect" class="form-select form-select-solid form-select-lg" data-dropdown-parent="#categoryUpdateForm" data-control="select2" data-placeholder="Select a Dimension" data-allow-clear="true" tabindex="-1" >
            <option value="">Select Dimension...</option>
            @foreach ($dimensions as $item)
                <option value="{{ $item->dimension }}" @selected($item->dimension == $data[0]->dimension_id)>{{ $item->title }}</option>
            @endforeach
        </select>
        <!--end::Select-->
    </div>
    <!--end::Input group-->

</form>
