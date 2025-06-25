<div class="flex-fill">
    <form id="search_form" class="me-3" autocomplete="off">
        <label for="search_input"><i class="ri-search-2-line"></i></label>
        <input wire:model.live="search" id="search_input" type="text" class="form-control form-control-sm"
               placeholder="Aramak istediğiniz içeriği yazınız..." autocomplete="off"/>
    </form>
    <div id="search_results" class="search pb-3">
        <div class="search__body" data-scroll="true">
            <div class="mb-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <span class="search__title">İçerikler</span>
                    <a href="{{ route('front.discover.index') }}" class="btn btn-link">Tümünü Gör</a>
                </div>
                <div class="row g-4 list">
                    @foreach($searchContents as $item)
                        <div class="col-xl-3 col-md-4 col-sm-6">
                            <div class="list__item">
                                <a href="{{ route('front.albums.playlist', $item->id) }}" class="list__cover">
                                    <img src="{{ asset($item->imgCover) }}" alt="{{ $item->title }}">
                                </a>
                                <div class="list__content">
                                    <a href="{{ route('front.albums.playlist', $item->id) }}" class="list__title text-truncate">{{ $item->title }}</a>
                                    <p class="list__subtitle text-truncate">
                                        <a href="{{ route('front.author.detail', ['id' => 901000]) }}">{{ $item->author }}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
