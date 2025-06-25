<x-base-layout>
    <!--begin::Card-->
    <div class="card mb-20">
        <div class="card-header">
            <h3 class="card-title">New Content</h3>
            <div class="card-toolbar">
                <a href="{{ route('admin.contents.index') }}" class="btn btn-sm btn-light-dark mx-5">Discard</a>
                <button type="submit" class="btn btn-sm btn-bg-info text-white" form="contentForm"> Save Content</button>
            </div>
        </div>
        <!--begin::Card body-->
        <div class="card-body pt-6">
            @include('admin.contents._store')
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->



    <!--begin::Card-->
    <div class="card card-track invisible d-none">
        <div class="card-header">
            <h3 class="card-title">Track List</h3>
            @can('create track|update track')
                <div class="card-toolbar">
                    <a href="{{ route('admin.tracks.show', 1) }}" class="btn btn-sm btn-bg-info text-white" id="addTracks">
                        Edit Track
                    </a>
                </div>
            @endcan
        </div>
        <!--begin::Card body-->
        <div class="card-body pt-6">
            @include('admin.contents._track-list')
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->


</x-base-layout>
