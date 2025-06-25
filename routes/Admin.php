<?php

use App\Http\Controllers\Admin\{
    Account\SettingsController,
    AuthorsController,
    CategoryController,
    ContentController,
    DeckController,
    DeckLayoutsController,
    DimensionController,
    Logs\AuditLogsController,
    Logs\SystemLogsController,
    MoodController,
    Permissions\PermissionController,
    Permissions\RoleController,
    SoundscapeController,
    StarterController,
    TodayPoolsController,
    TodayShowcasesController,
    TrackController,
    UsersController
};
use App\Http\Controllers\Admin\ProgramsController;
use App\Http\Controllers\Admin\ShowcasePoolsController;
use App\Http\Controllers\Auth\SocialiteLoginController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:admin')->group(callback: function () {


    Route::get('/', fn () => view('admin.dashboard'))->name('index');

    $menu = theme()->getMenu();
    array_walk($menu, function ($val) {
        if (isset($val['path'])) {
            //Route::get($val['path'], [PagesController::class, 'index']);
            // Custom page demo for 500 server error
            if (Str::contains($val['path'], 'error-500')) {
                Route::get($val['path'], function () {
                    abort(500, 'Something went wrong! Please try again later.');
                });
            }
        }
    });


    // Categories pages
    Route::controller(CategoryController::class)->name('categories.')->group(callback: function () {
        Route::get('categories/{category}/edit', 'edit')->name('edit')->middleware(['permission:update category']);
        Route::get('categories', 'index')->name('index')->middleware(['permission:read category']);
        Route::post('categories', 'store')->name('store')->middleware(['permission:create category']);
        Route::get('categories/create', 'create')->name('create')->middleware(['permission:create category']);
        Route::get('categories/{category}', 'show')->name('show')->middleware(['permission:read category']);
        Route::patch('categories/{category}', 'update')->name('update')->middleware(['permission:update category']);
        Route::delete('categories/{category}', 'destroy')->name('destroy')->middleware(['permission:delete category']);
    });

    // Program pages
    Route::controller(ProgramsController::class)->name('programs.')->group(callback: function () {


        Route::get('programs/{program}/edit', 'edit')->name('edit')->middleware(['permission:update program']);
        Route::get('programs', 'index')->name('index')->middleware(['permission:read program']);
        Route::post('programs', 'store')->name('store')->middleware(['permission:create program']);
        Route::get('programs/create', 'create')->name('create')->middleware(['permission:create program']);
        Route::get('programs/{program}', 'show')->name('show')->middleware(['permission:read program']);
        Route::patch('programs/{program}', 'update')->name('update')->middleware(['permission:update program']);
        Route::delete('programs/{program}', 'destroy')->name('destroy')->middleware(['permission:delete program']);
        Route::delete('programs/{program}', 'destroy')->name('destroy')->middleware(['permission:delete program']);

    });

    // Soundscape pages
    Route::controller(SoundscapeController::class)->name('soundscape.')->group(callback: function () {
        Route::get('soundscape/{soundscape}/cards', 'card')->name('cards')->middleware(['permission:update soundscape']);
        Route::get('soundscape', 'index')->name('index')->middleware(['permission:read soundscape']);
        Route::post('soundscape', 'store')->name('store')->middleware(['permission:create soundscape']);
        Route::get('soundscape/create', 'create')->name('create')->middleware(['permission:create soundscape']);
        Route::get('soundscape/{soundscape}', 'show')->name('show')->middleware(['permission:read soundscape']);
        Route::patch('soundscape/{soundscape}', 'update')->name('update')->middleware(['permission:update soundscape']);
        Route::delete('soundscape/{soundscape}', 'destroy')->name('destroy')->middleware(['permission:delete soundscape']);
        Route::get('soundscape/{soundscape}/edit', 'edit')->name('edit')->middleware(['permission:update soundscape']);
    });

    // Decks pages
    Route::controller(DeckController::class)->name('decks.')->group(callback: function () {
        Route::get('decks/{deck}/cards', 'card')->name('cards')->middleware(['permission:update deck|update card']);
        Route::get('decks', 'index')->name('index')->middleware(['permission:read deck']);
        Route::post('decks', 'store')->name('store')->middleware(['permission:create deck']);
        Route::get('decks/create', 'create')->name('create')->middleware(['permission:create deck']);
        Route::get('decks/{deck}', 'show')->name('show')->middleware(['permission:read deck']);
        Route::patch('decks/{deck}', 'update')->name('update')->middleware(['permission:update deck']);
        Route::delete('decks/{deck}', 'destroy')->name('destroy')->middleware(['permission:delete deck']);
        Route::get('decks/{deck}/edit', 'edit')->name('edit')->middleware(['permission:update deck']);
    });

    // Decks pages
    Route::controller(DimensionController::class)->name('dimensions.')->group(callback: function () {
        Route::get('dimensions', 'index')->name('index')->middleware(['permission:read dimension']);
        Route::post('dimensions', 'store')->name('store')->middleware(['permission:create dimension']);
        Route::get('dimensions/create', 'create')->name('create')->middleware(['permission:create dimension']);
        Route::get('dimensions/{id}', 'show')->name('show')->middleware(['permission:read dimension']);
        Route::patch('dimensions/{id}', 'update')->name('update')->middleware(['permission:update dimension']);
        Route::delete('dimensions/{id}', 'destroy')->name('destroy')->middleware(['permission:delete dimension']);
        Route::get('dimensions/{id}/edit', 'edit')->name('edit')->middleware(['permission:update dimension']);
    });

    // Card pages
    Route::controller(DeckLayoutsController::class)->name('cards.')->group(callback: function () {
        Route::get('cards/{deck}/{card}/edit', 'edit')->name('edit')->middleware(['permission:update card']);
        Route::get('cards', 'index')->name('index')->middleware(['permission:read card']);
        Route::post('cards', 'store')->name('store')->middleware(['permission:create card']);
        Route::get('cards/create', 'create')->name('create')->middleware(['permission:create card']);
        Route::get('cards/{card}', 'show')->name('show')->middleware(['permission:read card']);
        Route::patch('cards/{card}', 'update')->name('update')->middleware(['permission:update card']);
        Route::delete('cards/{card}', 'destroy')->name('destroy')->middleware(['permission:delete card']);
    });

    Route::prefix('user-management')->group(function () {
        // Users pages
        Route::controller(UsersController::class)->name('users.')->group(function () {

            Route::group(['middleware' =>  ['permission:create user']], function () {
                Route::post('users', 'store')->name('store');
                Route::get('users/create', 'create')->name('create');
            });

            Route::group(['middleware' =>  ['permission:read user']], function () {
                Route::get('users', fn () => view('admin.users.overview'))->name('index');
                Route::get('users/experience', fn () => view('admin.users.experience'))->name('experience');
                Route::get('users/transaction', fn () => view('admin.users.transaction'))->name('transaction');
                Route::get('users/event', fn () => view('admin.users.event'))->name('event');
                Route::get('users/session', fn () => view('admin.users.session'))->name('session');
                Route::get('users/credential', fn () => view('admin.users.credential'))->name('credential');

                Route::get('users/settings', fn () => view('admin.users.ydk.settings'))->name('settings');
                Route::get('users/security', fn () => view('admin.users.ydk.security'))->name('security');
                Route::get('users/billing', fn () => view('admin.users.ydk.billing'))->name('billing');
                Route::get('users/statements', fn () => view('admin.users.ydk.statements'))->name('statements');
                Route::get('users/referrals', fn () => view('admin.users.ydk.referrals'))->name('referrals');
                Route::get('users/api', fn () => view('admin.users.ydk.api'))->name('api');
                Route::get('users/logs', fn () => view('admin.users.ydk.logs'))->name('logs');
                Route::get('users/{user}', 'show')->name('show');
            });

            Route::group(['middleware' =>  ['permission:update user']], function () {
                Route::put('users/{user}', 'update')->name('update');
                Route::get('users/{user}/edit', 'edit')->name('edit');
            });

            Route::group(['middleware' =>  ['permission:delete user']], function () {
                Route::delete('users/{user}', 'destroy')->name('destroy');
            });
        });
        // Roles pages
        Route::controller(RoleController::class)->name('roles.')->group(function () {

            Route::group(['middleware' =>  ['permission:create role']], function () {
                Route::post('roles', 'store')->name('store');
                Route::get('roles/create', 'create')->name('create');
            });

            Route::group(['middleware' =>  ['permission:read role']], function () {
                Route::get('roles', 'index')->name('index');
                Route::get('roles/{role}', 'show')->name('show');
            });

            Route::group(['middleware' =>  ['permission:update role']], function () {
                Route::put('roles/{role}', 'update')->name('update');
                Route::get('roles/{role}/edit', 'edit')->name('edit');
            });

            Route::group(['middleware' =>  ['permission:delete role']], function () {
                Route::delete('roles/{role}', 'destroy')->name('destroy');
            });

        });
        // Permissions pages
        Route::controller(PermissionController::class)->name('permissions.')->group(function () {

            Route::group(['middleware' =>  ['permission:create role']], function () {
                Route::get('permissions', 'index')->name('index');
                Route::get('permissions/{permission}', 'show')->name('show');
            });

            Route::group(['middleware' =>  ['permission:read role']], function () {
                Route::post('permissions', 'store')->name('store');
                Route::get('permissions/create', 'create')->name('create');
            });

            Route::group(['middleware' =>  ['permission:update role']], function () {
                Route::put('permissions/{permission}', 'update')->name('update');
                Route::get('permissions/{permission}/edit', 'edit')->name('edit');
            });

            Route::group(['middleware' =>  ['permission:delete role']], function () {
                Route::delete('permissions/{permission}', 'destroy')->name('destroy');
            });

        });
    });

    // Account pages
    Route::prefix('account')->group(function () {
        Route::get('overview', fn () => view('pages.account.overview.overview'))->name('overview');
        Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
        Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');
        Route::put('settings/email', [SettingsController::class, 'changeEmail'])->name('settings.changeEmail');
        Route::put('settings/password', [SettingsController::class, 'changePassword'])->name('settings.changePassword');
    });

    // Logs pages
    Route::prefix('log')->name('log.')->group(function () {
        Route::resource('system', SystemLogsController::class)->only(['index', 'destroy']);
        Route::resource('audit', AuditLogsController::class)->only(['index', 'destroy']);
    });

    // Contents pages
    Route::group(['middleware' => ['permission:read content']], function () {
        Route::controller(ContentController::class)->name('contents.')->group(static function () {
            Route::get('drafts/{status}', 'getContents')->name('drafts');
            Route::get('published/{status}', 'getPublished')->name('published');
            Route::get('trashed', 'getTrashed')->name('trashed');
            Route::post('update/status', 'updStatus')->name('status');
        });
    });


    Route::resources([
        'authors' => AuthorsController::class,
        'contents' => ContentController::class,
        'tracks' => TrackController::class,
        'moods' => MoodController::class,
        'today-starters' => StarterController::class,
        'today-showcases' => TodayShowcasesController::class,
        'today-pools' => TodayPoolsController::class,
        'showcase-pools' => ShowcasePoolsController::class,
    ]);

    Route::get('/auth/redirect/{provider}', [SocialiteLoginController::class, 'redirect']);

    Route::group(['middleware' => ['role:root']], function () {
        Route::get('/narrators', fn()=> redirect('admin'))->name('narrators');
        Route::get('/users', fn()=> redirect('admin'))->name('users');
        Route::get('/transaction', fn()=> redirect('admin'))->name('transaction');
        Route::get('/quick', fn()=> redirect('admin'))->name('quick');
        Route::get('/programs-layout', fn()=> redirect('admin'))->name('programs-layout');
        Route::get('/prepaid-codes', fn()=> redirect('admin'))->name('prepaid-codes');
        Route::get('/promo-codes', fn()=> redirect('admin'))->name('promo-codes');
        Route::get('/products', fn()=> redirect('admin'))->name('products');
        Route::get('/suppliers', fn()=> redirect('admin'))->name('suppliers');
    });
});

require __DIR__.'/auth.php';

Route::middleware('auth:admin')->name('commands.')->group(fn () => require __DIR__.'/commands.php');
