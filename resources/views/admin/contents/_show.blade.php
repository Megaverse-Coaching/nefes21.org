<x-base-layout>
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Layout-->
        <div class="d-flex flex-column flex-lg-row">
            <!--begin::Content-->
            <div class="flex-lg-row-fluid me-lg-15 order-2 order-lg-1 mb-10 mb-lg-0">
                <!--begin::Card-->
                <div class="card card-flush pt-3 mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>{{ $content->title }}</h2>
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <a href="{{ route('admin.contents.edit', $content->id) }}" class="btn btn-light-info">Update</a>
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table wrapper-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 text-gray-600 fw-semibold gy-5"
                                id="kt_table_customers_events">
                                <!--begin::Table body-->
                                <tbody>
                                    <!--begin::Table row-->
                                    <tr>
                                        <!--begin::Event=-->
                                        <td class="min-w-400px">
                                            <a href="{{ route('admin.contents.edit', $content->id) }}" class="fw-bold text-gray-800 text-hover-primary me-1">Content ID:</a>
                                        </td>
                                        <!--end::Event=-->
                                        <!--begin::Timestamp=-->
                                        <td class="pe-0 text-gray-600 text-end min-w-200px">{{ $content->id }}</td>
                                        <!--end::Timestamp=-->
                                    </tr>
                                    <!--end::Table row-->
                                    <!--begin::Table row-->
                                    <tr>
                                        <!--begin::Event=-->
                                        <td class="min-w-400px">
                                            <a href="#"
                                                class="fw-bold text-gray-800 text-hover-primary me-1">Content Version:</a>
                                        </td>
                                        <!--end::Event=-->
                                        <!--begin::Timestamp=-->
                                        <td class="pe-0 text-gray-600 text-end min-w-200px">{{ $content->version }}</td>
                                        <!--end::Timestamp=-->
                                    </tr>
                                    <!--end::Table row-->
                                    <!--begin::Table row-->
                                    <tr>
                                        <!--begin::Event=-->
                                        <td class="min-w-400px">
                                            <a href="#" class="fw-bold text-gray-800 text-hover-primary me-1">Content Type:</a>

                                        </td>
                                        <!--end::Event=-->


                                        @php
                                            $styles = ['Course' => 'warning','Single' => 'dark','Podcast'  => 'primary','Story' => 'danger','Meditation' => 'info','Breath' => 'success','ASMR' => 'success','Music' => 'primary'];
//                                            $types = json_decode($content->type, JSON_THROW_ON_ERROR | false, 512, JSON_THROW_ON_ERROR);
                                            $value = "";
                                            foreach ($content->type as $type){
                                                $style = $styles[$type] ?? "info";
                                                $value .=  '<div class="badge badge-light-'.$style.' fw-bolder mx-2">'.$type.'</div>';
                                            }
                                        @endphp
                                        <!--begin::Timestamp=-->
                                        <td class="pe-0 text-gray-600 text-end min-w-200px">{!! $value !!}</td>
                                        <!--end::Timestamp=-->
                                    </tr>
                                    <!--end::Table row-->
                                    <!--begin::Table row-->
                                    <tr>
                                        <!--begin::Event=-->
                                        <td class="min-w-400px">
                                            <a href="#" class="fw-bold text-gray-800 text-hover-primary me-1">User</a>
                                        </td>
                                        <!--end::Event=-->
                                        <!--begin::Timestamp=-->
                                        <td class="pe-0 text-gray-600 text-end min-w-200px">{{ $user->getNameAttribute()}}</td>
                                        <!--end::Timestamp=-->
                                    </tr>
                                    <!--end::Table row-->
                                    <!--begin::Table row-->
                                    <tr>
                                        <!--begin::Event=-->
                                        <td class="min-w-400px">
                                            <a href="#" class="fw-bold text-gray-800 text-hover-primary me-1">Age Segment</a>
                                        </td>
                                        <!--end::Event=-->
                                        <!--begin::Timestamp=-->
                                        <td class="pe-0 text-gray-600 text-end min-w-200px">{{ $content->age }}</td>
                                        <!--end::Timestamp=-->
                                    </tr>
                                    <!--end::Table row-->
                                     <!--begin::Table row-->
                                     <tr>
                                        <!--begin::Event=-->
                                        <td class="min-w-400px">
                                            <a href="#" class="fw-bold text-gray-800 text-hover-primary me-1">Gender Segment</a>
                                        </td>
                                        <!--end::Event=-->
                                        <!--begin::Timestamp=-->
                                        <td class="pe-0 text-gray-600 text-end min-w-200px">{{ $content->gender }}</td>
                                        <!--end::Timestamp=-->
                                    </tr>
                                    <!--end::Table row-->
                                     <!--begin::Table row-->
                                     <tr>
                                        <!--begin::Event=-->
                                        <td class="min-w-400px">
                                            <a href="#" class="fw-bold text-gray-800 text-hover-primary me-1">Description</a>
                                        </td>
                                        <!--end::Event=-->
                                        <!--begin::Timestamp=-->
                                        <td class="pe-0 text-gray-600 text-end min-w-200px">{{ $content->description }}</td>
                                        <!--end::Timestamp=-->
                                    </tr>
                                    <!--end::Table row-->
                                     <!--begin::Table row-->
                                     <tr>
                                        <!--begin::Event=-->
                                        <td class="min-w-400px">
                                            <a href="#" class="fw-bold text-gray-800 text-hover-primary me-1">Duration</a>
                                        </td>
                                        <!--end::Event=-->
                                        <!--begin::Timestamp=-->
                                        <td class="pe-0 text-gray-600 text-end min-w-200px">{{ $content->duration }}</td>
                                        <!--end::Timestamp=-->
                                    </tr>
                                    <!--end::Table row-->
                                     <!--begin::Table row-->
                                     <tr>
                                        <!--begin::Event=-->
                                        <td class="min-w-400px">
                                            <a href="#" class="fw-bold text-gray-800 text-hover-primary me-1">Playlist</a>
                                        </td>
                                        <!--end::Event=-->
                                        <!--begin::Timestamp=-->
                                        <td class="pe-0 text-gray-600 text-end min-w-200px">{{ $content->isMulti }}</td>
                                        <!--end::Timestamp=-->
                                    </tr>
                                    <!--end::Table row-->

                                     <!--begin::Table row-->
                                     <tr>
                                        <!--begin::Event=-->
                                        <td class="min-w-400px">
                                            <a href="#" class="fw-bold text-gray-800 text-hover-primary me-1">New</a>
                                        </td>
                                        <!--end::Event=-->
                                        <!--begin::Timestamp=-->
                                        <td class="pe-0 text-gray-600 text-end min-w-200px">{!! $content->isNew ? '<div class="badge badge-light-success fw-bolder"> New </div>' : '<div class="badge badge-light-dark fw-bolder"> No </div>'  !!}</td>
                                        <!--end::Timestamp=-->
                                    </tr>
                                    <!--end::Table row-->
                                     <!--begin::Table row-->
                                     <tr>
                                        <!--begin::Event=-->
                                        <td class="min-w-400px">
                                            <a href="#" class="fw-bold text-gray-800 text-hover-primary me-1">is Free</a>
                                        </td>
                                        <!--end::Event=-->
                                        <!--begin::Timestamp=-->
                                        <td class="pe-0 text-gray-600 text-end min-w-200px">{!! $content->isFree ? '<div class="badge badge-light-info fw-bolder"> Premium </div>' : '<div class="badge badge-light-dark fw-bolder"> Free </div>'  !!}</td>
                                        <!--end::Timestamp=-->
                                    </tr>
                                    <!--end::Table row-->
                                     <!--begin::Table row-->
                                     <tr>
                                        <!--begin::Event=-->
                                        <td class="min-w-400px">
                                            <a href="#" class="fw-bold text-gray-800 text-hover-primary me-1">is Valid</a>
                                        </td>
                                        <!--end::Event=-->
                                        <!--begin::Timestamp=-->
                                        <td class="pe-0 text-gray-600 text-end min-w-200px">{!! $content->isValid ? '<div class="badge badge-light-success fw-bolder"> Valid </div>' : '<div class="badge badge-light-dark fw-bolder"> inValid </div>'  !!}</td>
                                        <!--end::Timestamp=-->
                                    </tr>
                                    <!--end::Table row-->
                                     <!--begin::Table row-->
                                     <tr>
                                        <!--begin::Event=-->
                                        <td class="min-w-400px">
                                            <a href="#" class="fw-bold text-gray-800 text-hover-primary me-1">Created_at</a>
                                        </td>
                                        <!--end::Event=-->
                                        <!--begin::Timestamp=-->
                                        <td class="pe-0 text-gray-600 text-end min-w-200px">{{ \Carbon\Carbon::parse($content->created_at)->translatedFormat('j M Y, l H:i:s');  }}</td>
                                        <!--end::Timestamp=-->
                                    </tr>
                                    <!--end::Table row-->
                                     <!--begin::Table row-->
                                     <tr>
                                        <!--begin::Event=-->
                                        <td class="min-w-400px">
                                            <a href="#" class="fw-bold text-gray-800 text-hover-primary me-1">Published_at</a>
                                        </td>
                                        <!--end::Event=-->
                                        <!--begin::Timestamp=-->
                                        <td class="pe-0 text-gray-600 text-end min-w-200px">{{ \Carbon\Carbon::parse($content->published_at)->translatedFormat('j M Y, l H:i:s');  }}</td>
                                        <!--end::Timestamp=-->
                                    </tr>
                                    <!--end::Table row-->
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table wrapper-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->

            </div>
            <!--end::Content-->
            <!--begin::Sidebar-->
            <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-300px mb-10 order-1 order-lg-2">
                <!--begin::Card-->
                <div class="card card-flush mb-10">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>Kişi</h2>
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::More options-->
                            <a href="#" class="btn btn-sm btn-light btn-icon" data-kt-menu-trigger="click"
                                data-kt-menu-placement="bottom-end">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen052.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="10" y="10" width="4" height="4" rx="2"
                                            fill="currentColor" />
                                        <rect x="17" y="10" width="4" height="4" rx="2"
                                            fill="currentColor" />
                                        <rect x="3" y="10" width="4" height="4" rx="2"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-6 w-200px py-4"
                                data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Takibi Durdur</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-subscriptions-view-action="edit">Takibi Düzenle</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3 text-danger " data-kt-subscriptions-view-action="delete">Takibi Bırak</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                            <!--end::More options-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0 fs-6">
                        <!--begin::Section-->
                        <div class="mb-7">
                            <!--begin::Details-->
                            <div class="d-flex align-items-center">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-60px symbol-circle me-3">
                                    <img src="{{ asset($user->getAvatarUrlAttribute()) }}" alt="{{ $user->getNameAttribute() }}" class="w-100" />
{{--                                    <img alt="Pic" src="{{ asset($user->avatar ?? 'demo1/media/placeholder.jpg') }}" />--}}
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Info-->
                                <div class="d-flex flex-column">
                                    <!--begin::Name-->
                                    <a href="#" class="fs-4 fw-bold text-gray-900 text-hover-primary me-2 text-wrap">{{ $user->getNameAttribute() }}</a>
                                    <!--end::Name-->
                                    <!--begin::Email-->
                                    <a href="#" class="fw-semibold text-gray-600 text-hover-primary text-wrap">{{ $user->email }}</a>
                                    <!--end::Email-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Details-->
                        </div>
                        <!--end::Section-->

                        <!--begin::Actions-->
                        <div class="mb-0">
                            <a href="#" class="btn btn-primary" id="kt_subscriptions_create_button">Edit Subscription</a>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
                <!--begin::Card-->
                <div class="card card-flush mb-10">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>Cover Görseli</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0 fs-6">
                        <!--begin::Section-->
                        <div class="mb-5">
                            <!--begin::Details-->
                            <div class="d-flex align-items-center">
                                <!--begin::Image preview wrapper-->
                                <div class="image-input-wrapper h-200px w-300px img-thumbnail"
                                     style="background-image: url({{asset($content->imgCover ?? 'storage/placeholder.jpg')}});
                                            background-repeat: no-repeat;
                                            background-size: cover;
                                            background-position: bottom;
                                        ">
                                </div>
                                <!--end::Image preview wrapper-->
                            </div>
                            <!--end::Details-->
                        </div>
                        <!--end::Section-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
                <!--begin::Card-->
                <div class="card card-flush mb-10" >
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>Showcase Görseli</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0 fs-6">
                        <!--begin::Section-->
                        <div class="mb-5">
                            <!--begin::Details-->
                            <div class="d-flex align-items-center">
                                <!--begin::Image preview wrapper-->
                                <div class="image-input-wrapper h-200px w-300px img-thumbnail"
                                     style="background-image: url({{asset($content->imgShowcase ?? 'storage/placeholder.jpg')}});
                                            background-repeat: no-repeat;
                                            background-size: cover;
                                            background-position: bottom;
                                        ">
                                </div>
                                <!--end::Image preview wrapper-->
                            </div>
                            <!--end::Details-->
                        </div>
                        <!--end::Section-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Sidebar-->
        </div>
        <!--end::Layout-->
    </div>
    <!--end::Content container-->
</x-base-layout>
