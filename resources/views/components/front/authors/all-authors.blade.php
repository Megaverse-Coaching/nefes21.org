@props(['authors'])

<div class="col-6 col-xl-2 col-md-3 col-sm-4">
    <a href="{{ route('front.author.detail', $authors->author_id) }}" class="cover cover--round">
        <div class="cover__image">
            <img src="{{ asset($authors->profilePicUrl) }}" alt="{{ $authors->label }}">
        </div>
        <div class="cover__foot">
            <span class="cover__title text-truncate">{{ $authors->label }}</span>
            <span class="cover__title text-truncate text-black-50">{{ $authors->title }}</span>
        </div>
    </a>
</div>
