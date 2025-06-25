<aside id="sidebar">
    <div class="sidebar-head d-flex align-items-center justify-content-between">
        <a href="/" class="brand external"><img src="{{ asset('assets/images/logos/logo1.webp') }}" alt="Nefes21"/></a>
        <a href="javascript:void(0);" role="button" class="sidebar-toggler" aria-label="Sidebar toggler">
            <div class="d-none d-lg-block">
                <i class="ri-menu-3-line sidebar-menu-1"></i>
                <i class="ri-menu-line sidebar-menu-2"></i>
            </div>
            <i class="ri-menu-fold-line d-lg-none"></i>
        </a>
    </div>
    <div class="sidebar-body" data-scroll="true">
        <nav class="navbar d-block p-0">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/" class="nav-link d-flex align-items-center {{ (request()->is('/')) ? 'active' : '' }}">
                        <i class="ri-home-4-line fs-5"></i>
                        <span class="ps-3">Başlangıç</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{route('front.discover.index')}}"
                       class="nav-link d-flex align-items-center {{ (request()->is('discover*')) ? 'active' : '' }}">
                        <i class="ri-collage-line  fs-5"></i>
                        <span class="ps-3">Keşfet</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('front.cards.index') }}"
                       class="nav-link d-flex align-items-center {{ (request()->is('cards*')) ? 'active' : '' }}">
                        <i class="ri-vip-crown-fill fs-5"></i>
                        <span class="ps-3">Kartlar</span></a>
                </li>
				<li class="nav-item">
					<a href="https://kisiselgelisim.tv/etkinlikler/video-etkinlikler"
					   class="nav-link d-flex align-items-center" onclick="window.location.href='https://kisiselgelisim.tv/etkinlikler/video-etkinlikler';">
						<i class="ri-movie-line fs-5"></i>
						<span class="ps-3">Programlar</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="https://kisiselgelisim.tv/canli-yayin"
					   class="nav-link d-flex align-items-center" onclick="window.location.href='https://kisiselgelisim.tv/canli-yayin';">
						<i class="ri-movie-line fs-5"></i>
						<span class="ps-3">Canlı Yayınlar</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="https://kisiselgelisim.tv/canli-yayin"
					   class="nav-link d-flex align-items-center" onclick="window.location.href='https://kisiselgelisim.tv/etkinlikler/canli-yayin-etkinlikler';">
						<i class="ri-movie-line fs-5"></i>
						<span class="ps-3">Etkinlik</span>
					</a>
				</li>
                <li class="nav-item">
                    <a href="{{ route('front.author.index') }}"
                       class="nav-link d-flex align-items-center {{ (request()->is('author*')) ? 'active' : '' }}">
                        <i class="ri-radio-2-line fs-5"></i>
                        <span class="ps-3">Yazarlar</span></a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="sidebar-foot">
        {{--        <a href="https://www.kisiselgelisim.tv/canli-yayin" target="_blank" class="btn btn-danger d-flex">--}}
        {{--            <div class="btn__wrap">--}}
        {{--                <i class="ri-broadcast-line"></i> <span>Canlı Yayın</span>--}}
        {{--            </div>--}}
        {{--        </a>--}}
    </div>
</aside>
