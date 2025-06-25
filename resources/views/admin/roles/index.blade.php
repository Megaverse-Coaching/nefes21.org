<x-base-layout>
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card card-reset">
                <div class="card-header card-header-stretch">
                    <h3 class="card-title">Rol Grubları</h3>
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#tab_role_panel">Panel</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab_role_web">Web</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab_role_panel" role="tabpanel">
                            <!--begin::Row-->
                            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
                                @foreach ($panelRoles as $rol)
                                    <!--begin::Col-->
                                    <div class="col-md-4">
                                        <!--begin::Card-->
                                        <div class="card card-flush h-md-100">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <!--begin::Card title-->
                                                <div class="card-title">
                                                    <h2>{{ $rol->name }}</h2>
                                                </div>
                                                <!--end::Card title-->
                                            </div>
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="card-body pt-1">
                                                <!--begin::Users-->
                                                <div class="fw-bold text-gray-600 mb-5">Bu role sahip toplam
                                                    kullanıcı: {{ $rol->users_count }}</div>
                                                <!--end::Users-->
                                                <!--begin::Permissions-->
                                                <div class="d-flex flex-column text-gray-600">
                                                    @foreach($rol->permissions as $permission)
                                                        <div class="d-flex align-items-center py-2">
                                                            <span
                                                                class="bullet bg-primary me-3"></span>{{ $permission->name }}
                                                        </div>
                                                        @break($loop->index >= 4)
                                                    @endforeach
                                                    @if(count($rol->permissions) > 5)
                                                        <div class="d-flex align-items-center py-2">
                                                            <span class='bullet bg-primary me-3'></span>
                                                            <em>ve {{count($rol->permissions) - 5 }} daha...</em>
                                                        </div>
                                                    @endif
                                                </div>
                                                <!--end::Permissions-->
                                            </div>
                                            <!--end::Card body-->
                                            <!--begin::Card footer-->
                                            <div class="card-footer flex-wrap pt-0">
                                                <a href="{{ route('admin.roles.edit', ['role' => $rol->id])  }}"
                                                   class="btn btn-light btn-active-primary my-1 me-2">Göster</a>

                                            </div>
                                            <!--end::Card footer-->
                                        </div>
                                        <!--end::Card-->
                                    </div>
                                    <!--end::Col-->
                                @endforeach
                                <!--begin::Add new card-->
                                <div class="ol-md-4">
                                    <!--begin::Card-->
                                    <div class="card h-md-100">
                                        <!--begin::Card body-->
                                        <div class="card-body d-flex flex-center">
                                            <!--begin::Button-->
                                            <button type="button" class="btn btn-clear d-flex flex-column flex-center"
                                                    data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">
                                                <!--begin::Illustration-->
                                                <img src="{{ asset('demo1/media/illustrations/sketchy-1/4.png') }}"
                                                     alt=""
                                                     class="mw-100 mh-150px mb-7"/>
                                                <!--end::Illustration-->
                                                <!--begin::Label-->
                                                <div
                                                    class="fw-bold fs-3 text-gray-600 text-hover-primary">{{ __('Yeni Role Ekle') }}</div>
                                                <!--end::Label-->
                                            </button>
                                            <!--begin::Button-->
                                        </div>
                                        <!--begin::Card body-->
                                    </div>
                                    <!--begin::Card-->
                                </div>
                                <!--begin::Add new card-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <div class="tab-pane fade" id="tab_role_web" role="tabpanel">
                            <!--begin::Row-->
                            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
                                @foreach ($webRoles as $role)
                                    <!--begin::Col-->
                                    <div class="col-md-4">
                                        <!--begin::Card-->
                                        <div class="card card-flush h-md-100">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <!--begin::Card title-->
                                                <div class="card-title">
                                                    <h2>{{ $role->name }}</h2>
                                                </div>
                                                <!--end::Card title-->
                                            </div>
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="card-body pt-1">
                                                <!--begin::Users-->
                                                <div class="fw-bold text-gray-600 mb-5">Bu role sahip toplam
                                                    kullanıcı: {{ $role->users_count }}</div>
                                                <!--end::Users-->
                                                <!--begin::Permissions-->
                                                <div class="d-flex flex-column text-gray-600">
                                                    @foreach($role->permissions as $permission)
                                                        <div class="d-flex align-items-center py-2">
                                                            <span
                                                                class="bullet bg-primary me-3"></span>{{ $permission->name }}
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <!--end::Permissions-->
                                            </div>
                                            <!--end::Card body-->
                                            <!--begin::Card footer-->
                                            <div class="card-footer flex-wrap pt-0">
                                                <a href="{{ route('admin.roles.edit', ['role' => $role->id])  }}"
                                                   class="btn btn-light btn-active-primary my-1 me-2">Göster</a>

                                            </div>
                                            <!--end::Card footer-->
                                        </div>
                                        <!--end::Card-->
                                    </div>
                                    <!--end::Col-->
                                @endforeach



                                <!--begin::Add new card-->
                                <div class="ol-md-4">
                                    <!--begin::Card-->
                                    <div class="card h-md-100">
                                        <!--begin::Card body-->
                                        <div class="card-body d-flex flex-center">
                                            <!--begin::Button-->
                                            <button type="button" class="btn btn-clear d-flex flex-column flex-center"
                                                    data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">
                                                <!--begin::Illustration-->
                                                <img src="{{ asset('demo1/media/illustrations/sketchy-1/4.png') }}"
                                                     alt=""
                                                     class="mw-100 mh-150px mb-7"/>
                                                <!--end::Illustration-->
                                                <!--begin::Label-->
                                                <div
                                                    class="fw-bold fs-3 text-gray-600 text-hover-primary">{{ __('Yeni Role Ekle') }}</div>
                                                <!--end::Label-->
                                            </button>
                                            <!--begin::Button-->
                                        </div>
                                        <!--begin::Card body-->
                                    </div>
                                    <!--begin::Card-->
                                </div>
                                <!--begin::Add new card-->
                            </div>
                            <!--end::Row-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
    @include('admin.roles.modals.index_modals')

</x-base-layout>
