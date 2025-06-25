<!--begin::Action--->
<td class="text-end">

    <a href="{{ route('admin.tracks.show', $model->id) }}" class="d-none invisible btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
        {!! theme()->getSvgIcon("icons/duotune/general/gen019.svg", "svg-icon-3") !!}
    </a>

    <a href="{{ route('admin.tracks.edit', $model->id) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
        {!! theme()->getSvgIcon("icons/duotune/art/art005.svg", "svg-icon-3") !!}
    </a>

    <button data-destroy="{{ route('admin.tracks.destroy', $model->id) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
        {!! theme()->getSvgIcon("icons/duotune/general/gen027.svg", "svg-icon-3") !!}
    </button>


</td>
<!--end::Action--->
