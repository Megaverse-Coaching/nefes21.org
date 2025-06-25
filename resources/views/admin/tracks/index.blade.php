<x-base-layout>
    @section('styles')
        <style>
            .dataTables_filter > label{
                float: left !important;
            }
            .dt-buttons {
                margin-right: 1.25rem !important;
                margin-top: 1.25rem !important;
                float: right !important;
            }
        </style>
    @endsection
    <!--begin::Card-->
    <div class="card">
        <!--begin::Card body-->
        <div class="card-body pt-6">
            @include('admin.tracks._table')
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->

</x-base-layout>
