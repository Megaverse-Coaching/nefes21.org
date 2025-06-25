@props(['genres'])
<div class="col-xl-3 col-sm-6">
    <div class="cover cover--round">
        <a href="genre-details.html" class="cover__image">
            <img src="{{ asset($genres['image']) }}" alt="Business">
            <div class="cover__image__content">
                <span class="cover__title mb-1 fs-6 text-truncate">{{ $genres['title'] }}</span>
            </div>
        </a>
    </div>
</div>
