<x-base-layout>
    <!--begin::Card-->
    <div class="card mb-20">
        <div class="card-header">
            <h3 class="card-title">{{ $content->title }}</h3>
            <div class="card-toolbar">
                <a href="{{ route('admin.contents.index') }}" class="btn btn-sm btn-light-dark mx-5">Discard</a>

                <button type="button" class="{{ ($content->status === 1) ? 'd-block':'d-none' }} btn btn-sm btn-bg-info text-white btn-active-color-warning" id="move" data-id="{{ $content->id }}"> Move Content to Draft</button>
                <button type="submit" class="{{ ($content->status === 0) ? 'd-block':'d-none' }} btn btn-sm btn-bg-info text-white" id="content-form-submit">
                    <span class="indicator-label">Save Content</span>
                    <span class="indicator-progress">Gönderiliyor...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
        </div>
        <!--begin::Card body-->
        <div class="card-body pt-6">
            @include('admin.contents._card')
        </div>
        <!--end::Card body-->
        <div class="overlay-layer card-rounded bg-dark bg-opacity-20 d-none">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    <!--end::Card-->

    <!--begin::Card-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Track List</h3>
            <div class="card-toolbar">
                <a href="{{ route('admin.tracks.show', $content->id) }}" class="{{ ($content->status === 0) ? 'd-block':'d-none' }} btn btn-sm btn-bg-info text-white" id="editTracks">
                    Edit Track
                </a>
            </div>
        </div>
        <!--begin::Card body-->
        <div class="card-body pt-6">
            @include('admin.contents._track-list')
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->

</x-base-layout>
