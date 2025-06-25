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
    <!--begin::Main column-->
    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
        <!--begin:::Tabs-->
        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
            <!--begin:::Tab item-->
            <li class="nav-item">
                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                    href="#published_contents">Yayında</a>
            </li>
            <!--end:::Tab item-->
            <!--begin:::Tab item-->
            <li class="nav-item">
                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#drafted_contents">Draft</a>
            </li>
            @hasanyrole('root|admin')
            <!--begin:::Tab item-->
            <li class="nav-item">
                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#deleted_contents">Archive</a>
            </li>
            @endhasanyrole
        </ul>
        <!--end:::Tabs-->
        <!--begin::Tab content-->
        <div class="tab-content">
            <!--begin::Tab pane-->
            <div class="tab-pane fade show active" id="published_contents" role="tab-panel">
                <div class="d-flex flex-column gap-7 gap-lg-10">
                    <!--begin::General options-->
                    <div class="card card-flush card-dashed">
                        @can('create content')
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                            <div class="card-toolbar">
                                <a href="{{ route('admin.contents.create') }}" class="btn btn-outline btn-outline-dashed btn-outline-info btn-active-light-info">
                                    <i class="las la-plus-circle fs-2x"></i> New
                                </a>
                            </div>
                        </div>
                        @endcan
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            {{ $publishedContents->table() }}
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::General options-->
                </div>
            </div>
            <!--end::Tab pane-->
            <!--begin::Tab pane-->
            <div class="tab-pane fade" id="drafted_contents" role="tab-panel">
                <div class="d-flex flex-column gap-7 gap-lg-10">

                    <div class="card card-flush card-dashed">
                        @can('create content')
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                                <div class="card-toolbar">
                                    <a href="{{ route('admin.contents.create') }}" class="btn btn-outline btn-outline-dashed btn-outline-info btn-active-light-info">
                                        New
                                    </a>
                                </div>
                            </div>
                        @endcan
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                           <!--begin::Table-->
                            {{ $draftedContents->table() }}
                            <!--end::Table-->
                        </div>
                        <!--end::Card header-->
                    </div>

                </div>
            </div>
            <!--begin::Tab pane-->

            @hasanyrole('root|admin')
            <div class="tab-pane fade" id="deleted_contents" role="tab-panel">
                <div class="d-flex flex-column gap-7 gap-lg-10">

                    <div class="card card-flush card-dashed">
                        @can('create content')
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                                <div class="card-toolbar">
                                    <a href="{{ route('admin.contents.create') }}" class="btn btn-outline btn-outline-dashed btn-outline-info btn-active-light-info">
                                        New
                                    </a>
                                </div>
                            </div>
                        @endcan
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Table-->
                            {{ $deletedContents->table() }}
                            <!--end::Table-->
                        </div>
                        <!--end::Card header-->
                    </div>

                </div>
            </div>
            @endhasanyrole
        </div>

    </div>
    <!--end::Main column-->
@section('scripts')
    {{ $publishedContents->scripts() }}
    {{ $draftedContents->scripts() }}
    {{ $deletedContents->scripts() }}
        <script>
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e){
                $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
            });
        </script>
@endsection

</x-base-layout>
