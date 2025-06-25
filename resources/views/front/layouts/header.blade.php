<header id="header" class="">
    <div class="container ">
        <div class="header-container ">
            <div class="d-flex align-items-center">
                <a href="javascript:void(0);" role="button" class="header-text sidebar-toggler d-lg-none me-3" aria-label="Sidebar toggler"><i class="ri-menu-3-line"></i></a>
                @livewire('search-all')
                <div class="d-flex align-items-center">
                    <div class="dropdown ms-3 ms-sm-4">
                        @if(Auth::check())
                            <a href="javascript:void(0);" class="avatar header-text" role="button" id="user_menu" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="avatar__image">
                                    <img src="{{ asset(Auth::user()->avatar_url)}}" alt="user" />
                                </div>
                                <span class="ps-2 ">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-md dropdown-menu-end"
                                aria-labelledby="user_menu">
                                <li>
                                    <div class="py-2 px-3 avatar avatar--lg">
                                        <div class="avatar__image">
                                            <img src="{{ asset(Auth::user()->avatar_url)}}" alt="user" />
                                        </div>
                                        <div class="avatar__content">
                                            <span class="avatar__title">{{ Auth::user()->name ?? 'Misafir' }}</span>
                                            <span class="avatar__subtitle">Premium Üye</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('front.profile.index') }}">
                                        <i class="ri-user-3-line fs-5"></i>
                                        <span class="ps-2">Profil</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <i class="ri-money-dollar-circle-line fs-5"></i>
                                        <span class="ps-2">Plan</span>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="{{ route('front.logout') }}" class="dropdown-item d-flex align-items-center external text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="ri-logout-circle-line fs-5"></i>
                                        <span class="ps-2">Çıkış</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('front.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        @else

                            {{--<a href="{{ route('front.login') }}" class="text-white me-3">Giriş</a>
                            <a href="{{ route('front.register') }}" class="text-white">Kayıt</a>--}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
