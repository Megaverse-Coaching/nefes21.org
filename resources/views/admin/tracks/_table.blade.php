<!--begin::Table-->
{{ $dataTable->table() }}
<!--end::Table-->

{{-- Inject Scripts --}}
@section('scripts')
    {{ $dataTable->scripts() }}
    <script>
        $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
    </script>
@endsection
