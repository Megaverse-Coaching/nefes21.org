@props(['items'])
<div id="player">
    <div class="container">
        <div class="player-container">
            <div class="player-progress">
                <progress class="amplitude-buffered-progress player-progress__bar" value="0"></progress>
                <progress class="amplitude-song-played-progress player-progress__bar"></progress>
                <input type="range" class="amplitude-song-slider player-progress__slider" aria-label="Progress slider"/>
            </div>
            <div class="cover d-flex align-items-center">
                <div class="cover__image">
                    <img data-amplitude-song-info="cover_art_url" src="{{ asset('assets/images/cover/small/1.jpg') }}"
                         alt=""/>
                </div>
                <div class="cover__content ps-3 d-none d-sm-block">
                    <a href="#" class="cover__title text-truncate" data-amplitude-song-info="name"></a>
                    <a href="#" class="cover__subtitle text-truncate" data-amplitude-song-info="artist"></a>
                </div>
            </div>
            <div class="player-control justify-content-evenly">
                <button type="button" class="amplitude-repeat btn btn-icon me-4 d-none d-md-block" aria-label="Repeat">
                    <i class="ri-repeat-2-fill fs-5"></i>
                </button>
                <button type="button" class="amplitude-prev btn btn-icon" aria-label="Backward">
                    <i class="ri-skip-back-mini-fill"></i>
                </button>
                <button type="button" class="amplitude-play-pause btn btn-icon btn-default rounded-pill"
                        aria-label="Play pause">
                    <i class="ri-play-fill icon-play"></i>
                    <i class="ri-pause-fill icon-pause"></i>
                </button>
                <button type="button" class="amplitude-next btn btn-icon" aria-label="Forward">
                    <i class="ri-skip-forward-mini-fill"></i>
                </button>
                <button type="button"
                        class="amplitude-shuffle amplitude-shuffle-off btn btn-icon ms-4 d-none d-md-block"
                        aria-label="Shuffle">
                    <i class="ri-shuffle-fill fs-5"></i>
                </button>
            </div>
            <div class="player-info">
                <div class="me-4 d-none d-xl-block">
                    <span class="amplitude-current-minutes"></span>:<span class="amplitude-current-seconds"></span>
                    / <span class="amplitude-duration-minutes"></span>:<span class="amplitude-duration-seconds"></span>
                </div>
                <div class="player-volume dropdown d-md-block">
                    <button class="btn btn-icon" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                            aria-label="Volume" aria-expanded="false">
                        <i class="ri-volume-mute-fill fs-5 d-none"></i>
                        <i class="ri-volume-down-fill fs-5"></i>
                        <i class="ri-volume-up-fill fs-5 d-none"></i>
                    </button>
                    <div class="dropdown-menu prevent-click">
                        <input type="range" class="amplitude-volume-slider" value="50" min="0" max="100"
                               aria-label="Volume slider"/>
                    </div>
                </div>

                <div class="player-speed dropdown d-md-block">
                    <button class="btn btn-icon" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-label="Speed" aria-expanded="false">
                        <i class="ri-timer-fill fs-5"></i>
                    </button>
                    <div class="dropdown-menu p-2">
                        <a href="javascript:void(0);" class="dropdown-item" data-speed="0.75">0.75x</a>
                        <a href="javascript:void(0);" class="dropdown-item" data-speed="1">1x</a>
                        <a href="javascript:void(0);" class="dropdown-item" data-speed="1.25">1.25x</a>
                        <a href="javascript:void(0);" class="dropdown-item" data-speed="1.5">1.5x</a>
                        <a href="javascript:void(0);" class="dropdown-item" data-speed="2">2x</a>
                    </div>
                </div>



                <div class="playlist dropstart me-3 d-none">
                    <button class="btn btn-icon" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                            aria-label="Playlist" aria-expanded="false">
                        <i class="ri-play-list-fill fs-5"></i>
                    </button>
                    <div class="dropdown-menu playlist__dropdown">
                        <div class="playlist__head d-flex align-items-center justify-content-between">
                            <h6 class="mb-0">Sıradaki İçerikler</h6>
                            <a href="javascript:void(0);" role="button" id="clear_playlist"
                               class="btn btn-link">Temizle</a>
                        </div>
                        <div id="playlist" class="list playlist__body" data-scroll="true">
                            <div class="col-sm-8 col-10 mx-auto mt-5 text-center">
                                <i class="ri-music-2-line mb-3"></i>
                                <p>Çalma listesine eklenmiş bir içerik yok.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
