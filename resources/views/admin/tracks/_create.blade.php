<x-base-layout>
    <!--begin::Card-->
    <div class="card mb-20">
        <div class="card-header">
            <h3 class="card-title">Add New Track</h3>
            <div class="card-toolbar btn-group">
                <a href="javascript:history.back();" class="btn btn-sm btn-light-dark" > Back to Content</a>
                <button type="submit" class="btn btn-sm btn-bg-info text-white" form="updForm"> Save Track</button>
            </div>
        </div>
        <!--begin::Card body-->
        <div class="card-body pt-6">
            @include('admin.tracks._store')
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->


</x-base-layout>
