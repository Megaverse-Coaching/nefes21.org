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
<form method="POST" id="updForm" action="{{ route('admin.tracks.store') }}" enctype="multipart/form-data">
    @csrf @method('POST')
    <input type="hidden" name="volume" value="{{ old('volume') ?? 10 }}">
{{--    <input type="hidden" name="duration">--}}
    <input type="hidden" name="content_id" value="{{request()->get('id')}}">
    <div class="col-8 float-start px-3 border-end border-end-dotted">

        <!--begin::Input group-->
        <div class="row g-9">
            <!--begin::Col-->
            <div class="col-md-6 fv-row">
                <div class="form-floating mb-7 fv-row">
                    <input name="title" type="text" class="form-control form-control-solid" id="trackTitle" value="{{ old('title')}}" required />
                    <label class="required " for="trackTitle">Track Title</label>
                </div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-6 fv-row">
                <div class="form-floating mb-7 fv-row">
                    <input name="link" type="text" class="form-control form-control-solid" id="trackLink" value="{{ old('link') }}" required />
                    <label class="required " for="trackLink">Track Link</label>
                </div>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row g-9 ">
            <!--begin::Col-->
            <div class="col-md-6 fv-row">
                <select name="admin_id" class="form-select form-select-solid" data-control="select2" data-placeholder="Select Narrator" data-allow-clear="true">
                    @if(old('admin_id'))
                        <option value="{{ old('admin_id' ?? '') }}">Seçildi</option>
                    @else
                        <option></option>
                    @endif
                    @foreach ($narrators as $user)
                        <option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-6 fv-row">

                <!--begin::Input group-->
                <div class="form-floating mb-7">
                    <select name="soundscape_id" class="form-select form-select-solid" data-control="select2" data-placeholder="Select Soundscape" data-allow-clear="true">
                        <option></option>
                        @foreach($soundscapes as $item)
                            <option value="{{ $item->id }}" >{{ $item->id }} - {{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->


        <div class="row g-9">
            <!--begin::Col-->
            <div class="col-md-6 fv-row">
                <!--begin::Input group-->
                <div class="form-floating mb-7">

                </div>
                <!--end::Input group-->
            </div>

            <!--begin::Col-->
            <div class="col-md-6 fv-row">
                <div id="kt_slider_soft_limits"></div>
            </div>
        </div>



        <div class="row g-9 mb-8">

            <!--begin::Col-->
            <div class="col-md-3 fv-row">
                <label class="form-check form-switch form-check-custom form-check-solid">
                    <input name="isValid" class="form-check-input" type="checkbox" />
                    <span class="form-check-label isValid">Onaylanmadı</span>
                </label>
            </div>
            <!--begin::Col-->
            <div class="col-md-3 fv-row">
                <label class="form-check form-switch form-check-custom form-check-solid">
                    <input name="isFree" class="form-check-input" type="checkbox" />
                    <span class="form-check-label isFree">Free</span>
                </label>
            </div>


        </div>


    </div>




    <div class="col-4 float-end px-3 justify-content-center d-grid">

        <div class="d-flex d-none invisible">
            <!--begin::Col-->
            <div class="flex-start px-5">
                <!--begin::Input group-->
                <div class="form-floating mb-7">
                    <input name="id" type="number" class="form-control form-control-solid" id="trackID"  disabled/>
                    <label for="trackID">Track ID</label>
                </div>
                <!--end::Input group-->
            </div>
            <!--begin::Col-->
            <div class="flex-end px-5">
                <!--begin::Input group-->
                <div class="form-floating mb-7">
                    <input name="source_id" type="number" class="form-control form-control-solid" id="sourceID"  disabled/>
                    <label for="sourceID">Source ID</label>
                </div>
                <!--end::Input group-->
            </div>

        </div>

        <div class="d-flex">

            <div class="flex-start px-5 ">
                <!--begin::Input group-->
                <div class="form-floating mb-7">
                    <input id="trackDuration" type="text" class="form-control form-control-solid" name="duration" placeholder="Duration" required/>
                    <label for="trackDuration"> Duration</label>
                </div>
                <!--end::Input group-->
            </div>
            <!--begin::Col--><!--begin::Col-->
            <div class="flex-end px-5">
                <!--begin::Input group-->
                <div class="form-floating mb-7">
                    <input type="number" class="form-control form-control-solid w-150px" id="trackOrder" name="order" value="{{ old('admin_id') }}" min="1" max="250"/>
                    <label for="trackOrder"> Track Order </label>
                </div>
                <!--end::Input group-->
            </div>
            <!--begin::Col-->
        </div>

        <div class="d-flex px-5  d-none invisible">
            <!--begin::Input group-->
            <div class="fv-row">
                <input type="file" id="file" class="form-control" name="track" disabled/>
                <audio id="audio" data-name="track"></audio>
            </div>
            <!--end::Input group-->
        </div>
    </div>




</form>
