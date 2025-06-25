<x-base-layout>
    <!--begin::Card-->
    <div class="card mb-20">
        <div class="card-header">
            <h3 class="card-title">Add New Soundscape</h3>
            <div class="card-toolbar btn-group">
                <a href="javascript:history.back();" class="btn btn-sm btn-light-dark" > Back</a>
                <button type="submit" class="btn btn-sm btn-bg-info text-white" form="updForm" id="soundscape-form-submit"> Save Soundscape</button>
            </div>
        </div>
        <!--begin::Card body-->
        <div class="card-body pt-6">
            @include('admin.soundscape._store')
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->


</x-base-layout>
