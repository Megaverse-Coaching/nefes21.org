<?php

namespace App\Providers;

use App\Models\Front\{Home, User};
use App\Policies\Front\{HomePolicy, UserPolicy};
use App\Models\Admin\{Admin, Category, Content, Deck, Dimension, Showcase, Soundscape, Track};
use App\Policies\Admin\{
    AdminPolicy,CategoryPolicy,ContentPolicy,DeckPolicy,DimensionPolicy,ShowcasePolicy,
    SoundscapePolicy,TrackPolicy,
};
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Admin::class => AdminPolicy::class,
        User::class => UserPolicy::class,
        Content::class => ContentPolicy::class,
        Soundscape::class => SoundscapePolicy::class,
        Track::class => TrackPolicy::class,
        Deck::class => DeckPolicy::class,
        Category::class => CategoryPolicy::class,
        Dimension::class => DimensionPolicy::class,
        Showcase::class => ShowcasePolicy::class,
        Home::class => HomePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::before(function ($user, $ability) {
            return $user->hasRole('root') ? true : null;
        });
    }
}
