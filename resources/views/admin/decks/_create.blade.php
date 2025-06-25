<x-base-layout>
    <!--begin::Card-->
    <div class="card mb-20">
        <div class="card-header">
            <h3 class="card-title">Add New Card</h3>
            <div class="card-toolbar btn-group">
                <a href="javascript:history.back();" class="btn btn-sm btn-light-dark" > Back</a>
                <button type="submit" class="btn btn-sm btn-bg-info text-white" form="deckForm" id="deckFormSubmit">
                    <span class="indicator-label">Save Card</span>
                    <span class="indicator-progress">Saving...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
        </div>
        <!--begin::Card body-->
        <div class="card-body pt-6">
            @include('admin.decks._store')
            <div class="overlay-layer card-rounded bg-dark bg-opacity-20 d-none">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->


</x-base-layout>
