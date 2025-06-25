@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form id="deckForm" action="{{ route('admin.decks.update', $deck->id) }}" enctype="multipart/form-data">
    @method('PATCH')
    <div class="d-flex flex-row h-600px">
        <div class="d-flex flex-column flex-row-auto w-300px me-20">
            <div class="d-flex flex-column flex-start">
                <!--begin::Col-->
                <div class="col-md-12 fv-row">
                    <div class="form-floating mb-7 fv-row">
                        <input name="id" type="text" class="form-control form-control-solid" id="id"
                               value="{{ $deck->id }}" disabled/>
                        <label class=" " for="id">Deck ID</label>
                    </div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-12 fv-row">
                    <div class="form-floating mb-7 fv-row">
                        <input name="title" type="text" class="form-control form-control-solid" id="title"
                               value="{{ old('title', $deck->title)}}" required/>
                        <label class="required " for="title">Deck Title</label>
                    </div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-12 fv-row">
                    <div class="form-floating mb-7 fv-row">
                        <input name="tag" type="text" class="form-control form-control-solid" id="tag"
                               value="{{ old('tag', $deck->tag)}}" required/>
                        <label class="required " for="tag">Daily Tag</label>
                    </div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-12 fv-row">
                    <div class="form-floating mb-7 fv-row">
                        <input name="order" type="number" class="form-control form-control-solid" id="order"
                               value="{{ old('order', $deck->order)}}" min="1" max="250"/>
                        <label class=" " for="order">Card Order</label>
                    </div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-12 fv-row">
                    <div class="form-floating mb-7 fv-row">
                        <input name="color" pattern="#[a-f0-9]{6}" type="color" class="form-control form-control-solid"
                               id="color" value="{{ old('color', $deck->color)}}"/>
                        <label class=" " for="color">Primary Color</label>
                    </div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-12 d-flex mb-10  fv fv-row">
                    <label class="form-check form-switch form-check-custom form-check-solid col-6">
                        <input name="status" class="form-check-input" type="checkbox"
                               value="{{ old('status', $deck->status) }}" @checked($deck->status === 1)/>
                        <span
                            class="form-check-label status">{{ ($deck->status === 1 || old('status') === 1) ? 'Aktif' : 'Pasif' }}</span>
                    </label>
                    <label class="form-check form-switch form-check-custom form-check-solid col-6">
                        <input name="isValid" class="form-check-input" type="checkbox"
                               value="{{ old('isValid', $deck->isValid) }}" @checked($deck->isValid === 1)/>
                        <span
                            class="form-check-label isValid">{{ ($deck->isValid === 1 || old('isValid') === 1) ? 'Valid' : 'Invalid' }}</span>
                    </label>
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-md-12 fv-row">
                    <!--begin::Image input-->
                    <div class="image-input image-input-outline" data-kt-image-input="true"
                         style="background-image: url({{ asset($deck->showcase ?? 'storage/placeholder-showcase.jpg') }})">
                        <!--begin::Image preview wrapper-->
                        <div class="image-input-wrapper h-150px w-300px bgi-position-center"
                             style="background-image: url({{ asset($deck->showcase ?? 'storage/placeholder-showcase.jpg') }})">
                        </div>
                        <!--end::Image preview wrapper-->

                        <!--begin::Edit button-->
                        <label
                            class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                            title="Görseli Değiştir">
                            <i class="bi bi-pencil-fill fs-7"></i>

                            <!--begin::Inputs-->
                            <input type="file" name="showcase" accept=".png, .jpg, .jpeg, .webp"/>
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
                <!--end::Col-->

            </div>
        </div>
        <div class="d-flex flex-column flex-row-fluid">
            <div class="d-flex flex-row h-75px">
                <div class="d-flex flex-column w-300px h-50px ps-5 flex-start">
                    <span class="text-black">Card Front Image</span>
                    <span class="text-black">JPG - 10:16</span>
                    <span class="text-black">(1000x1600px)</span>
                </div>
                <div class="d-flex flex-column w-300px h-50px ps-5 flex-start">
                    <span class="text-black">Card Back Image</span>
                    <span class="text-black">JPG - 10:16</span>
                    <span class="text-black">(1000x1600px)</span>
                </div>
                <div class="d-flex flex-column w-300px h-50px ps-5 flex-start">
                    <span class="text-black">Background Image</span>
                    <span class="text-black">PNG (transparent) - 10:18</span>
                    <span class="text-black">(1000x1800px)</span>
                </div>
            </div>
            <div class="d-flex flex-row flex-column-fluid">
                <div class="d-flex flex-row-auto w-300px flex-start">
                    <!--begin::Image input-->
                    <div class="image-input image-input-outline" data-kt-image-input="true"
                         style="border-radius: 25px; background-image: url({{ asset($deck->front ?? 'storage/placeholder-front.jpg') }})">
                        <!--begin::Image preview wrapper-->
                        <div class="image-input-wrapper h-400px w-250px bgi-position-center"
                             style="border-radius: 25px; background-image: url({{ asset($deck->front ?? 'storage/placeholder-front.jpg') }})">
                        </div>
                        <!--end::Image preview wrapper-->

                        <!--begin::Edit button-->
                        <label
                            class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                            title="Görseli Değiştir">
                            <i class="bi bi-pencil-fill fs-7"></i>

                            <!--begin::Inputs-->
                            <input type="file" name="front" accept=".png, .jpg, .jpeg, .webp"/>
                            <input type="hidden" name="front_remove"/>
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
                    <div class="image-input image-input-outline" data-kt-image-input="true"
                         style="border-radius: 25px;background-image: url({{ asset($deck->back ?? 'storage/placeholder-back.jpg') }})">
                        <!--begin::Image preview wrapper-->
                        <div class="image-input-wrapper h-400px w-250px bgi-position-center"
                             style="border-radius: 25px;background-image: url({{ asset($deck->back ?? 'storage/placeholder-back.jpg') }})">
                        </div>
                        <!--end::Image preview wrapper-->

                        <!--begin::Edit button-->
                        <label
                            class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                            title="Görseli Değiştir">
                            <i class="bi bi-pencil-fill fs-7"></i>

                            <!--begin::Inputs-->
                            <input type="file" name="back" accept=".png, .jpg, .jpeg, .webp"/>
                            <input type="hidden" name="back_remove"/>
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
                    <div class="image-input image-input-outline" data-kt-image-input="true"
                         style="border-radius: 25px;background-image: url({{ asset($deck->background ?? 'storage/placeholder-background.png') }})">
                        <!--begin::Image preview wrapper-->
                        <div class="image-input-wrapper h-400px w-250px bgi-position-center"
                             style="border-radius: 25px;background-image: url({{ asset($deck->background ?? 'storage/placeholder-background.png') }})">
                        </div>
                        <!--end::Image preview wrapper-->

                        <!--begin::Edit button-->
                        <label
                            class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                            title="Görseli Değiştir">
                            <i class="bi bi-pencil-fill fs-7"></i>

                            <!--begin::Inputs-->
                            <input type="file" name="background" accept=".png, .jpg, .jpeg, .webp"/>
                            <input type="hidden" name="background_remove"/>
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
</form>
