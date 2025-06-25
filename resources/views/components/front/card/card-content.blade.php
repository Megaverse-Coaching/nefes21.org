@props(['showcase'])
<div class="relating-content-container mt-50">
    <div class="img-content">
        <img src="{{ asset($showcase->imgCover) }}" alt="{{ $showcase->title }}">
    </div>
    <div class="detail-content">
        <div class="row align-items-center  iq-ltr-direction h-100 ">
            <div class="col-lg-7 col-md-12">
                @if($showcase->showcase_id == "live_stream")
                    <a href="javascript:void(0);" class="channel-logo-link">
                        <div @class(['channel-logo', $showcase->showcase_id]) data-iq-gsap="onStart" data-iq-position-x="-150" data-iq-position-y="0" data-iq-duration="1" data-iq-delay=".4">
                            Canlı Yayın
                        </div>
                    </a>
                @endif
                @isset($showcase->isFree)
                    @if($showcase->isValid == 1)
                        <a href="javascript:void(0);" class="channel-logo-link">
                            <div @class(['channel-logo', $showcase->showcase_id]) data-iq-gsap="onStart" data-iq-position-x="-150" data-iq-position-y="0" data-iq-duration="1" data-iq-delay=".4">
                                Bu Aya Özel
                            </div>
                        </a>
                    @endif
                @endisset
                @isset($showcase->isNew)
                    @if($showcase->isNew == 1)
                        <a href="javascript:void(0);" class="channel-logo-link">
                            <div @class(['channel-logo', $showcase->isNew ?? 'isNew']) data-iq-gsap="onStart" data-iq-position-x="-150" data-iq-position-y="0" data-iq-duration="1" data-iq-delay=".4">
                                Yeni
                            </div>
                        </a>
                    @endif
                @endisset
                @isset($showcase->isFree)
                    @if($showcase->isFree == 1)
                        <a href="javascript:void(0);" class="channel-logo-link">
                            <div @class(['channel-logo', 'isFree']) data-iq-gsap="onStart" data-iq-position-x="-150" data-iq-position-y="0" data-iq-duration="1" data-iq-delay=".4">
                                {!! ($showcase->isFree) ? '<i class="fa-solid fa-lock mr-2"></i>Premium' : 'Ücretsiz'  !!}
                            </div>
                        </a>
                    @endif
                @endisset
                <h2 class="slider-text big-title title text-uppercase"  data-iq-gsap="onStart" data-iq-position-x="-150" data-iq-position-y="0" data-iq-duration="1" data-iq-delay=".4">
                    {{ $showcase->title }}
                </h2>
                <div class="d-flex flex-wrap align-items-center relating-content-dnone r-mb-23" data-iq-gsap="onStart" data-iq-position-x="-150" data-iq-position-y="0" data-iq-duration="1" data-iq-delay=".4">
                    <div class="d-flex align-items-center mt-2 mt-md-3">
                        <span class="badge badge-secondary p-2 mr-1">Yaş Grubu: {{ $showcase->age }}</span>
                        <span class="badge badge-secondary p-2 mr-1">Cinsiyet: {{ $showcase->gender }}</span>
                        @isset($showcase->duration)
                            <span class="ml-3">{{ $showcase->duration }}</span>
                        @endisset

                    </div>
                </div>
                <div class="d-flex flex-wrap align-items-center relating-content-text r-mb-23 mt-10" data-iq-gsap="onStart" data-iq-position-x="-150" data-iq-position-y="0" data-iq-duration="1" data-iq-delay=".5">
                    <p>
                        {{ $showcase->description }}
                    </p>
                </div>

                @isset($showcase->admin)
                    <div class="author-info" data-iq-gsap="onStart" data-iq-position-x="0" data-iq-position-y="150" data-iq-duration="1" data-iq-delay=".5">
                        <div class="author-img">
                            @if(file_exists($showcase->admin->author))
                                <img src="{{ asset($showcase->admin->author->profilePicUrl) }}" class="img-fluid attachment-large size-large" alt="" loading="lazy">
                            @else
                                <img src="{{ asset('assets/images/author/blank.png') }}" class="img-fluid attachment-large size-large" alt="" loading="lazy">
                            @endif
                        </div>
                        <div class="author-name">
                            {{ $showcase->admin->authorInfo->label }}
                            <span>{{ $showcase->admin->authorInfo->title }}</span>
                        </div>
                    </div>
                @endisset
                <div class="content-type-info" data-iq-gsap="onStart" data-iq-position-x="0" data-iq-position-y="150" data-iq-duration="1" data-iq-delay=".5">
                    @isset($showcase->admin)
                        {!! \App\Models\Admin\Content::convertType($showcase->type) !!}
                    @endisset
                </div>
                <div class="d-flex align-items-center r-mb-23" data-iq-gsap="onStart" data-iq-position-x="0" data-iq-position-y="150" data-iq-duration="1" data-iq-delay=".6">
                    <a href="{{ route('front.albums.playlist', $showcase->id) }}" class="btn btn-hover iq-button"> <i class="fa fa-play mr-2" aria-hidden="true"></i>
                        Şimdi İzle
                    </a>
                </div>
            </div>
            <div class=" col-lg-5 col-md-12 trailor-video iq-slider d-none d-lg-block">
                <a href="{{ route('front.albums.playlist', $showcase->id) }}" class="playbtn" tabindex="0">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="80px" height="80px" viewBox="0 0 213.7 213.7" enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                                <polygon class="triangle" fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="73.5,62.5 148.5,105.8 73.5,149.1 "></polygon>
                        <circle class="circle" fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3"></circle>
                            </svg>
                    <span class="w-trailor">Şimdi İzle</span>
                </a>
            </div>
        </div>
    </div>
</div>
