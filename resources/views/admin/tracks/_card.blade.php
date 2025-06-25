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
<form method="POST" id="updForm" action="{{ route('admin.tracks.update', $track->id) }}" enctype="multipart/form-data">
    @csrf @method('PUT')
    <input type="hidden" name="volume" value="{{ old('volume', ($track->volume !== null) ? $track->volume : 10) }}">
{{--    <input type="hidden" name="duration" value="{{ old('duration', ($track->duration !== null) ? $track->duration : '')  }}">--}}
    <input type="hidden" name="content_id" value="{{ old('content_id',$track->content_id) }}">
    <input type="hidden" name="has_file" value="{{ old('track',$track->track) }}">
    <div class="col-8 float-start px-3 border-end border-end-dotted">

        <!--begin::Input group-->
        <div class="row g-9">
            <!--begin::Col-->
            <div class="col-md-6 fv-row">
                <div class="form-floating mb-7 fv-row">
                    <input name="title" type="text" class="form-control form-control-solid" id="trackTitle"
                           value="{{ old('title',$track->title) }}" required/>
                    <label class="required " for="trackTitle">Track Title</label>
                </div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-6 fv-row">
                <div class="form-floating mb-7 fv-row">
                    <input name="link" type="text" class="form-control form-control-solid" id="trackLink"
                           value="{{ old('label',$track->link) }}" required/>
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
                <select name="admin_id" class="form-select form-select-solid" data-control="select2"
                        data-placeholder="Narrator Select" data-allow-clear="true">
                    <option value="{{ $track->admin_id }}">{{ $user->name }}</option>
                    @foreach ($narrators as $user)
                        <option value="{{ $user->id }}" {{ $user->id === $track->admin_id ? 'selected' : '' }}>
                            {{ $user->id }} - {{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-6 fv-row">
                <!--begin::Input group-->
                <div class="form-floating mb-7">
                    <select name="soundscape_id" class="form-select form-select-solid" data-control="select2"
                            data-placeholder="Select Soundscape" data-allow-clear="true">
                        <option></option>
                        @foreach($soundscapes as $item)
                            <option
                                value="{{ $item->id }}" @selected($item->id == $track->soundscape->id)>{{ $item->id }}
                                - {{ $item->title }}</option>
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
                    <input name="isValid" class="form-check-input" type="checkbox" value="{{ $track->isValid }}"
                        {{ $track->isValid === 1 ? 'checked' : '' }} />
                    <span class="form-check-label isValid">Onaylı</span>
                </label>
            </div>
            <!--begin::Col-->
            <div class="col-md-3 fv-row">
                <label class="form-check form-switch form-check-custom form-check-solid">
                    <input name="isFree" class="form-check-input" type="checkbox" value="{{ $track->isFree }}"
                        {{ $track->isFree === 1 ? 'checked' : '' }} />
                    <span class="form-check-label isFree">{{ $track->isFree === 1 ? 'Premium' : 'Free' }}</span>
                </label>
            </div>


        </div>


    </div>


    <div class="col-4 float-end px-3 justify-content-center d-grid">

        <div class="d-flex">
            <!--begin::Col-->
            <div class="flex-start px-5">
                <!--begin::Input group-->
                <div class="form-floating mb-7">
                    <input type="number" class="form-control form-control-solid" id="trackID" name="id"
                           value="{{ old('id',$track->id) }}" disabled/>
                    <label for="trackID">Track ID</label>
                </div>
                <!--end::Input group-->
            </div>
            <!--begin::Col-->
            <div class="flex-end px-5 d-none invisible">
                <!--begin::Input group-->
                <div class="form-floating mb-7">
                    <input type="number" class="form-control form-control-solid" id="source_id" name="source_id"
                           value="{{ old('source_id',$track->source_id)  }}" disabled/>
                    <label for="source_id">Source ID</label>
                </div>
                <!--end::Input group-->
            </div>

        </div>

        <div class="d-flex">

            <div class="flex-start px-5">
                <!--begin::Input group-->
                <div class="form-floating mb-7">
                    <input id="trackDuration" type="text" name="duration" class="form-control form-control-solid" value="{{  old('duration',$track->duration)  }}" required/>
                    <label for="trackDuration"> Duration </label>
                    @if($errors->has('duration'))
                        <p class="alert alert-warning">{{ $errors->first('duration') }}</p>
                    @endif
                </div>
                <!--end::Input group-->
            </div>
            <!--begin::Col--><!--begin::Col-->
            <div class="flex-end px-5">
                <!--begin::Input group-->
                <div class="form-floating mb-7">
                    <input type="number"
                           class="form-control form-control-solid w-150px @error('order') is-invalid @enderror"
                           id="trackOrder" value="{{ old('order',$track->order)  }}" name="order" min="1" max="250"/>
                    @if($errors->has('order'))
                        <p class="alert alert-warning">{{ $errors->first('order') }}</p>
                    @endif
                    <label for="trackOrder"> Track Order </label>
                </div>
                <!--end::Input group-->
            </div>
            <!--begin::Col-->
        </div>

        <div class="d-flex px-5 ">
            <!--begin::Input group-->
            <div class="fv-row">
                <input type="file" id="file" class="form-control" name="track" value="{{old('track', "storage/".$track->track) }}" disabled/>
{{--                <audio id="audio" data-name="track" style="display: {{ "storage/".$track->track ? 'block':'none' }} " controls>--}}
{{--                    <source src="{{ $track->link }}" type="audio/mpeg"/>--}}
{{--                    <a href="{{ $track->link }}">{{ $track->title }}</a>--}}
{{--                </audio>--}}
            </div>
            <!--end::Input group-->
        </div>
    </div>

</form>
