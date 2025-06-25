<!--begin::Action--->
<td class="text-end">

    @can('read content')
    <a href="{{ route('admin.contents.show', $content->id) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
        {!! theme()->getSvgIcon("icons/duotune/general/gen019.svg", "svg-icon-3") !!}
    </a>
    @endcan

    @can('update content')
    <a href="{{ route('admin.contents.edit', $content->id) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
        {!! theme()->getSvgIcon("icons/duotune/art/art005.svg", "svg-icon-3") !!}
    </a>
    @endcan

    @can('delete content')
        <button data-destroy="{{ route('admin.contents.destroy', $content->id) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
            {!! theme()->getSvgIcon("icons/duotune/general/gen027.svg", "svg-icon-3") !!}
        </button>
    @endcan

</td>
<!--end::Action--->
