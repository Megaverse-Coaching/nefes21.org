@foreach($categories as $category)
    @foreach($category->categories as $category)
        @php $select = $category->category @endphp
        <!--begin::Card-->
        <div class="card mb-20">

            <div class="card-header border-0 pt-6">
                <div class="col-3">
                    <div class="fs-3 fw-bold text-info">{{$category->title}}</div>
                    <p class="text-gray-400 fw-semibold fs-5 mt-1">{{$category->category}}</p>
                </div>
            </div>

            <!--begin::Card body-->
            <div class="card-body py-4">
                <!--begin::Block-->
                <div class="py-5">

                    <div class="table-responsive">
                        <table class="table table-hover table-row-dashed table-row-gray-300 gy-1">
                            <thead>
                            <tr class="fw-bold fs-6 text-gray-800">
                                <th class="min-w-35px pe-2">#</th>
                                <th class="min-w-75px">Content ID</th>
                                <th class="min-w-75px">Title</th>
                                <th class="min-w-75px">Status</th>
                                <th class="min-w-75px">Free/Premium</th>
                                <th class="min-w-75px">Validation</th>
                                <th class="text-end min-w-100px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $a=1; @endphp
                            @foreach($category->layouts as $item )
                                @isset($item->contents[0])
                                <tr @class('align-baseline')>
                                    @foreach($item->contents as $content)
                                        <td>{{ $a++ }}</td>
                                        <td>
                                            <a href="{{ route('admin.contents.edit', $content->pivot->content_id) }}"
                                               class="text-gray-800 text-hover-primary mb-1">{{ $content->pivot->content_id }}</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.contents.edit', $content->pivot->content_id) }}"
                                               class="text-gray-800 text-hover-primary mb-1 text-decoration-underline">{{ $content->title }}</a>
                                        </td>
                                        <td>
                                            <div @class(['badge', 'badge-light-secondary' => !$content->isNew, 'badge-light-primary' => $content->isNew,'fw-bolder'])>
                                                {{ (!$content->isNew) ? 'Standart' : 'New' }}
                                            </div>
                                        </td>
                                        <td>
                                            <div @class(['badge', 'badge-light-warning' => !$content->isFree, 'badge-light-info' => $content->isFree,'fw-bolder'])>
                                                {{ (!$content->isFree) ? 'Free' : 'Premium' }}
                                            </div>
                                        </td>
                                        <td>
                                            <div @class(['badge', 'badge-light-danger' => !$content->isValid, 'badge-light-success' => $content->isValid,'fw-bolder'])>
                                                {{ (!$content->isValid) ? 'InValid' : 'Valid' }}
                                            </div>
                                        </td>
                                        @include("admin.dimensions._action-menu")
                                    @endforeach
                                </tr>
                                @endisset
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <!--end::Block-->


                <div class="overlay-layer card-rounded bg-dark bg-opacity-20 d-none">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>


            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->

    @endforeach
@endforeach
