@section('styles')
    <style>
        .form-floating .form-select {
            padding-top: 15px !important;
        }

        .select2-container--bootstrap5 .select2-selection {
            height: 55px !important;
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
<form method="POST" id="contentForm" action="{{ route('admin.contents.store') }}" enctype="multipart/form-data">
    @csrf @method('POST')
    <div class="col-8 float-start px-3 border-end border-end-dotted">

        <!--begin::Input group-->
        <div class="row g-9">
            <!--begin::Col-->
            <div class="col-md-6 fv-row">
                <div class="form-floating mb-7 fv-row">
                    <input name="title" type="text" class="form-control form-control-solid" id="contentTitle"
                           value="{{ old('title') }}" />
                    <label class=" " for="contentTitle">Content Title</label>
                </div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-6 fv-row">
                <div class="row g-9">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Input group-->
                        <div class="form-floating mb-7">
                            <input name="id" type="number" class="form-control form-control-solid" id="contentID"
                                   value="{{ old('id') }}" />
                            <label for="contentID">Content ID</label>
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Input group-->
                        <div class="form-floating mb-7">
                            <input name="version" type="number" class="form-control form-control-solid" id="contentVersion" value="{{ old('version') }}" />
                            <label for="contentVersion">Content Version</label>
                        </div>
                        <!--end::Input group-->
                    </div>
                </div>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row g-9 ">
            <!--begin::Col-->
            <div class="col-md-6 fv-row">
                <select name="admin_id" class="form-select form-select-solid" data-control="select2" data-placeholder="Author Select" data-allow-clear="true" >
                    <option></option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->admin_id }}" @selected(old('admin_id') == $author->admin_id)>{{ $author->author_id }} - {{ $author->label }}</option>
                    @endforeach
                </select>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-6 fv-row">
                @php $tags = ['Course', 'Audio Book', 'Single', 'Podcast', 'Story', 'Meditation', 'Breath', 'ASMR', 'Music']; @endphp
                    <!--begin::Input group-->
                <div class="form-floating mb-7">
                    <select name="type[]" class="form-select form-select-solid" data-control="select2"
                            data-placeholder="Content Type" data-allow-clear="true" multiple="multiple" >
                        <option></option>
                        @foreach ($tags as $tag)
                            <option
                                value="{{ $tag }}" @selected((collect(old('type'))->contains($tag)))>{{ $tag }} </option>
                        @endforeach
                    </select>
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->


        <!--begin::Input group-->
        <div class="row g-9 mb-8">
            <!--begin::Col-->
            <div class="col-md-6 fv-row">
                @php $ages = ['General','12-18','19-26','27-35' ,'36-45' ,'45+' ]; @endphp
                <select name="age" class="form-select form-select-solid" data-control="select2"
                        data-placeholder="Age Select" data-allow-clear="true" >
                    <option></option>
                    @foreach ($ages as $age)
                        <option value="{{ $age }}" @selected(old('age') == $age)>{{ $age }}</option>
                    @endforeach
                </select>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-6 fv-row">
                @php $genders = ['General','Male','Female','Private']; @endphp
                <select name="gender" class="form-select form-select-solid" data-control="select2"
                        data-placeholder="Gender Select" data-allow-clear="true" >
                    <option></option>
                    @foreach ($genders as $gender)
                        <option value="{{ $gender }}" @selected(old('gender') == $gender)> {{ $gender }}</option>
                    @endforeach
                </select>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->


        <!--begin::Input group-->
        <div class="d-flex flex-column mb-8">
            <!--begin::Input group-->
            <div class="form-floating">
                <textarea name="description" class="form-control form-control-solid kt_autosize min-h-100px" maxlength="500"
                          data-kt-autosize="true" id="floatingContentDescription">{{ old('description') }}</textarea>
                <label for="floatingContentDescription">Content Description</label>
            </div>
            <!--end::Input group-->
        </div>
        <!--end::Input group-->


        <div class="row g-9">
            <!--begin::Col-->
            <div class="col-md-3 fv-row">
                <!--begin::Input group-->
                <div class="form-floating mb-7">
                    <input type="text" class="form-control form-control-solid" id="contentDuration" disabled/>
                    <label for="contentDuration"> Duration </label>
                </div>
                <!--end::Input group-->
            </div>
            <!--begin::Col-->
            <div class="col-md-3 fv-row">
                <!--begin::Input group-->
                <div class="form-floating mb-7">
                    <input type="text" class="form-control form-control-solid" id="isMulti" disabled/>
                    <label for="isMulti">isMulti</label>
                </div>
                <!--end::Input group-->
            </div>
            <!--begin::Col-->
            <div class="col-md-3 fv-row">
                <!--begin::Input group-->
                <div class="form-floating mb-7">
                    <input type="text" class="form-control form-control-solid" id="created_at" disabled/>
                    <label for="created_at">Created At</label>
                </div>
                <!--end::Input group-->
            </div>
            <!--begin::Col-->
            <div class="col-md-3 fv-row">
                <!--begin::Input group-->
                <div class="form-floating mb-7">
                    <input type="text" class="form-control form-control-solid" id="published_at" disabled/>
                    <label for="published_at">Published At</label>
                </div>
                <!--end::Input group-->
            </div>
        </div>


        <div class="row g-9 mb-8">
            <!--begin::Col-->
            <div class="col-md-3 fv-row">
                <label class="form-check form-switch form-check-custom form-check-solid">
                    <input name="isNew" class="form-check-input" type="checkbox" @checked(old('isNew') == 1)/>
                    <span class="form-check-label isNew">Normal</span>
                </label>
            </div>
            <!--begin::Col-->
            <div class="col-md-3 fv-row">
                <label class="form-check form-switch form-check-custom form-check-solid">
                    <input name="isValid" class="form-check-input" type="checkbox" @checked(old('isValid') == 1)/>
                    <span class="form-check-label isValid">Invalid</span>
                </label>
            </div>
            <!--begin::Col-->
            <div class="col-md-3 fv-row">
                <label class="form-check form-switch form-check-custom form-check-solid">
                    <input name="isFree" class="form-check-input" type="checkbox" @checked(old('isFree') == 1)/>
                    <span class="form-check-label isFree">Free</span>
                </label>
            </div>
            <!--begin::Col-->
            <div class="col-md-3 fv-row">
                <label class="form-check form-switch form-check-custom form-check-solid form-check-danger ">
                    <input name="status" class="form-check-input" type="checkbox" @checked(old('status') == 1) disabled/>
                    <span class="form-check-label status">Draft</span>
                </label>
            </div>

        </div>


    </div>
    <div class="col-4 float-end px-3 justify-content-center d-grid">

        <div class="col mb-20">
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
                    title="Görseli Seçin">
                    <i class="bi bi-pencil-fill fs-7"></i>

                    <!--begin::Inputs-->
                    <input type="file" name="imgCover" accept=".png, .jpg, .jpeg, .webp" />
                    <input type="hidden" name="cover_remove"/>
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

        <div class="col">
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
                    <input type="file" name="imgShowcase" accept=".png, .jpg, .jpeg, .webp" />
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
</form>
