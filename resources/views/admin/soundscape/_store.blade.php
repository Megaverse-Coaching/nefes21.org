@section('styles')
    <style>
        .form-floating .form-select {
            padding-top: 15px !important;
        }

        .select2-container--bootstrap5 .select2-selection {
            height: 55px !important;
        }
        audio {
            display: none;
        }
    </style>
@endsection
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" id="updForm" action="{{ route('admin.soundscape.store') }}" enctype="multipart/form-data">
    @csrf @method('POST')
    <input type="hidden" name="duration">
    <div class="col-4 float-start px-3 border-end border-end-dotted">

        <!--begin::Input group-->
        <div class="row g-9">
            <!--begin::Col-->
            <div class="col-md-6 fv-row">
                <div class="form-floating mb-7 fv-row">
                    <input name="title" type="text" class="form-control form-control-solid" id="title" value="{{ old('title')}}"  />
                    <label class="required " for="title">Soundscape Title</label>
                </div>
            </div>
            <!--end::Col-->

        </div>
        <!--end::Input group-->



        <div class="row g-9 mb-8 d-block">

            <!--begin::Col-->
            <div class="col-md-3 fv-row">
                <label class="form-check form-switch form-check-custom form-check-solid">
                    <input name="isValid" class="form-check-input" type="checkbox" value="{{ old('isValid')}}"/>
                    <span class="form-check-label isValid">Onaylanmadı</span>
                </label>
            </div>
            <!--begin::Col-->
            <div class="col-md-3 fv-row">
                <label class="form-check form-switch form-check-custom form-check-solid">
                    <input name="isFree" class="form-check-input" type="checkbox" value="{{ old('isFree')}}"/>
                    <span class="form-check-label isFree">Free</span>
                </label>
            </div>
            <!--begin::Col-->
            <div class="col-md-3 fv-row">
                <label class="form-check form-switch form-check-custom form-check-solid">
                    <input name="status" class="form-check-input" type="checkbox" value="{{ old('status')}}"/>
                    <span class="form-check-label status">Pasif</span>
                </label>
            </div>


        </div>


    </div>

    <div class="col-4 float-start px-3 border-end border-end-dotted">
        <!--begin::Image input-->
        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{ asset('storage/placeholder.jpg') }})">
            <!--begin::Image preview wrapper-->
            <div class="image-input-wrapper h-200px w-300px" style="background-image: url({{ asset('storage/placeholder.jpg') }})">
            </div>
            <!--end::Image preview wrapper-->

            <!--begin::Edit button-->
            <label
                class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                title="Görseli Değiştir">
                <i class="bi bi-pencil-fill fs-7"></i>

                <!--begin::Inputs-->
                <input type="file" name="imgCover" accept=".png, .jpg, .jpeg, .webp" />
                <input type="hidden" name="imgCover_remove" />
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


    <div class="col-4 float-end px-3 justify-content-center d-grid border-start border-start-dotted">

        <div class="d-flex">
            <!--begin::Col-->
            <div class="flex-start px-5">
                <!--begin::Input group-->
                <div class="form-floating mb-7">
                    <input name="id" type="number" class="form-control form-control-solid" id="soundscape_id" value="{{ old('id')}}" />
                    <label for="soundscape_id">Soundscape ID</label>
                </div>
                <!--end::Input group-->
            </div>


        </div>

        <div class="d-flex">

            <div class="flex-start px-5">
                <!--begin::Input group-->
                <div class="form-floating mb-7">
                    <input type="text" class="form-control form-control-solid" id="trackDuration" disabled value="{{ old('track')}}"/>
                    <label for="trackDuration"> Duration </label>
                </div>
                <!--end::Input group-->
            </div>
            <!--begin::Col--><!--begin::Col-->

        </div>

        <div class="d-flex px-5">
            <!--begin::Input group-->
            <div class="fv-row">
                <input type="file" id="file" class="form-control" name="soundscape" value="{{ old('soundscape')}}"/>
                <audio id="audio" data-name="soundscape"></audio>
            </div>
            <!--end::Input group-->
        </div>
    </div>
</form>
