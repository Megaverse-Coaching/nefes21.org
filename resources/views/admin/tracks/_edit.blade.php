<x-base-layout>
    <!--begin::Card-->
    <div class="card mb-20">
        <div class="card-header">
            <h3 class="card-title">{{ $content->title }}</h3>
            <div class="card-toolbar btn-group">
                <a href="{{ route('admin.tracks.show', $content->id) }}" class="btn btn-sm btn-light-dark">Discard</a>

                <button type="button" class="{{ ($content->status === 1) ? 'd-block':'d-none' }} btn btn-sm btn-bg-info text-white btn-active-color-warning" id="move" data-id="{{ $content->id }}"> Move Content to Draft</button>
                <button type="submit" class="{{ ($content->status === 0) ? 'd-block':'d-none' }} btn btn-sm btn-bg-info text-white" form="updForm"> Save Content</button>

            </div>
        </div>
        <!--begin::Card body-->
        <div class="card-body pt-6">
            @include('admin.tracks._card')
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->


</x-base-layout>
