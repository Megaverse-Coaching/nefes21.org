<table class="table align-middle table-row-dashed fs-6 gy-1" id="kt_table_moods">
    <!--begin::Table head-->
    <thead>
    <!--begin::Table row-->
    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
        <th class="min-w-10 pe-2">
            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                <input class="form-check-input me-3" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_moods .form-check-input" value="1"/>
            </div>
        </th>
        <th class="min-w-35px pe-2">#</th>
        <th class="min-w-75px">Mood ID</th>
        <th class="min-w-75px">Content ID</th>
        <th class="min-w-125px">Content Title</th>
        <th class="min-w-125px">Free/Premium</th>
        <th class="min-w-125px">Validation</th>
        <th class="min-w-125px">Image</th>
        <th class="text-end min-w-100px">Actions</th>
    </tr>
    <!--end::Table row-->
    </thead>
    <!--end::Table head-->
    <!--begin::Table body-->
    <tbody class="text-gray-600 fw-semibold">
    <!--begin::Table row-->
    @foreach($result as $item)
        <tr>
            <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                    <input class="form-check-input me-3" type="checkbox" value="{{ $item->id }}">
                </div>
            </td>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->mood_id }}</td>
            <td><a href="{{ route('admin.contents.edit', $item->content_id) }}" class="text-gray-800 text-hover-primary mb-1">{{ $item->content_id }}</a></td>
            <td><a href="{{ route('admin.contents.edit', $item->content_id) }}" class="text-gray-800 text-hover-primary mb-1 text-decoration-underline">{{ $item->content->title }}</a></td>
            <td>
                <div @class(['badge', 'badge-light-warning' => !$item->content->isFree, 'badge-light-info' => $item->content->isFree,'fw-bolder'])>
                    {{ (!$item->content->isFree) ? 'Free' : 'Premium' }}
                </div>
            </td>
            <td>
                <div @class(['badge', 'badge-light-danger' => !$item->content->isValid, 'badge-light-success' => $item->content->isValid,'fw-bolder'])>
                    {{ (!$item->content->isValid) ? 'InValid' : 'Valid' }}
                </div>
            </td>
            <td>
                <img src="{{URL::to('/' . $item->content->imgShowcase )}}" class="h-100 w-125px rounded-4" />
            </td>
            <td class="text-end">
                <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                    <span class="svg-icon svg-icon-5 m-0">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"/>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a data-id="{{ $item->id }}" id="updateButton"  data-bs-toggle="modal" data-bs-target="#kt_modal_update" class="menu-link px-3">Edit</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="{{ route('admin.moods.destroy', $item->id) }}" class="menu-link px-3" data-kt-table-filter="delete_row">Delete</a>
                    </div>
                    <!--end::Menu item-->
                </div>
                <!--end::Menu-->
            </td>
        </tr>
    @endforeach
    <!--end::Table row-->
    </tbody>
    <!--end::Table body-->
</table>
