<?php

use App\Mail\NewUser;
use App\Http\Controllers\Auth\{
    EmailVerificationNotificationController,
    EmailVerificationPromptController,
    VerifyEmailController
};
use App\Http\Controllers\Front\{
    Author\AuthorController,
    Cards\CardController,
    Discover\DiscoverController,
    Home\HomeController,
    Profile\ProfileController,
    Program\ProgramController,
    Video\PlaylistController,
    Payment\PaytrController,
};

use App\Http\Controllers\SocialShareButtonsController;
use App\Mail\NewUserWelcomeMail;
use Illuminate\Support\Facades\Route;

/* middleware(['auth:web'])-> */
Route::name('front.')->group(callback: function () {
    Route::controller(HomeController::class)->name('home.')->group(callback: function () {
//        Route::get('/', 'index')->name('index');

        Route::get('/', 'pro')->name('index');
        Route::get('/category/{id}/detail', 'category')->name('detail');
    });

    Route::controller(DiscoverController::class)->name('discover.')->group(callback: function () {
        Route::get('/discover', 'index')->name('index');
        Route::get('/discover/{id}', 'detail')->name('detail');
    });
    Route::controller(CardController::class)->name('cards.')->group(callback: function () {
       Route::get('/cards', 'index')->name('index');
       Route::get('/cards/{id}/list', 'list')->name('list');
       Route::get('/cards/{id}/detail', 'detail')->name('detail');
    });
    Route::controller(ProgramController::class)->name('programs.')->group(callback: function () {
       Route::get('/programs', 'index')->name('index');
       Route::get('/programs/{id}/detail', 'category')->name('detail');
    });
    Route::controller(AuthorController::class)->name('author.')->group(callback: function () {
       Route::get('/author', 'index')->name('index');
       Route::get('/author/{id}/detail', 'detail')->name('detail');
    });
    Route::controller(PlaylistController::class)->name('albums.')->group(callback: function () {
        Route::get('/detail/{id?}', 'index')->name('playlist');
        Route::get('/play/{videoID}', 'play')->name('play');
    });
    Route::controller(ProfileController::class)->name('profile.')->group(callback: function () {
        Route::get('/profile', 'index')->name('index');
    });

    Route::controller(PaytrController::class)->name('payment.')->prefix('payment/')->group(callback: function () {
        Route::get('/callback', 'payment_callback')->name('callback');
    });



    Route::get('/new-user', fn () => new NewUser(\App\Models\Front\User::find(1)))->name('new-user');
    Route::get('/narrators', fn () => view('front.narrators.index'))->name('narrators.index');
    Route::get('/analytics', fn () => view('front.analytics.index'))->name('analytics.index');
    Route::get('/favorites', fn () => view('front.favorites.index'))->name('favorites.index');
    Route::get('/history', fn () => view('front.history.index'))->name('history.index');
    Route::get('/events', fn () => view('front.events.index'))->name('events.index');
    Route::get('/events/{id}', fn () => view('front.events.detail'))->name('events.detail');
    Route::get('/old-events', fn () => view('front.old-events.index'))->name('old.events.index');
    Route::get('/settings', fn () => view('front.settings.index'))->name('settings.index');
    Route::get('/my-plan', fn () => view('front.my-plan.index'))->name('my-plan.index');
});


Route::get('/social-media-share', [SocialShareButtonsController::class,'ShareWidget']);

Route::name('front.')->group(fn () => require __DIR__.'/auth.php');


Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])->middleware('auth')->name('verification.notice');
Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['auth', 'signed', 'throttle:6,1'])->name('verification.verify');
Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');
