<?php

declare(strict_types=1);

use App\Orchid\Screens\Article\ArticleEditScreen;
use App\Orchid\Screens\Article\ArticleListScreen;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\Rubric\RubricEditScreen;
use App\Orchid\Screens\Rubric\RubricListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use App\Orchid\Screens\Website\WebsiteEditScreen;
use App\Orchid\Screens\Website\WebsiteListScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/main', PlatformScreen::class)
    ->name('platform.main');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Profile'), route('platform.profile')));

Route::prefix('users')->group(function () {
    // Platform > System > Users
    Route::screen('/', UserListScreen::class)
        ->name('platform.systems.users')
        ->breadcrumbs(fn (Trail $trail) => $trail
            ->parent('platform.index')
            ->push(__('Users'), route('platform.systems.users')));
    // Platform > System > Users > Create
    Route::screen('/create', UserEditScreen::class)
        ->name('platform.systems.users.create')
        ->breadcrumbs(fn (Trail $trail) => $trail
            ->parent('platform.systems.users')
            ->push(__('Create'), route('platform.systems.users.create')));
    // Platform > System > Users > User
    Route::screen('/{user}/edit', UserEditScreen::class)
        ->name('platform.systems.users.edit')
        ->breadcrumbs(fn (Trail $trail, $user) => $trail
            ->parent('platform.systems.users')
            ->push($user->name, route('platform.systems.users.edit', $user)));
});

Route::prefix('roles')->group(function () {
    // Platform > System > Roles
    Route::screen('/', RoleListScreen::class)
        ->name('platform.systems.roles')
        ->breadcrumbs(fn (Trail $trail) => $trail
            ->parent('platform.index')
            ->push(__('Roles'), route('platform.systems.roles')));
    // Platform > System > Roles > Create
    Route::screen('/create', RoleEditScreen::class)
        ->name('platform.systems.roles.create')
        ->breadcrumbs(fn (Trail $trail) => $trail
            ->parent('platform.systems.roles')
            ->push(__('Create'), route('platform.systems.roles.create')));
    // Platform > System > Roles > Role
    Route::screen('/{role}/edit', RoleEditScreen::class)
        ->name('platform.systems.roles.edit')
        ->breadcrumbs(fn (Trail $trail, $role) => $trail
            ->parent('platform.systems.roles')
            ->push($role->name, route('platform.systems.roles.edit', $role)));
});

Route::prefix('websites')->group(function () {
    // Platform > Websites
    Route::screen('/', WebsiteListScreen::class)
        ->name('platform.websites')
        ->breadcrumbs(fn (Trail $trail) => $trail
            ->parent('platform.index')
            ->push(__('Websites'), route('platform.websites')));
    // Platform > Websites > Create
    Route::screen('/create', WebsiteEditScreen::class)
        ->name('platform.websites.create')
        ->breadcrumbs(fn (Trail $trail) => $trail
            ->parent('platform.websites')
            ->push(__('Create'), route('platform.websites.create')));
    // Platform > Websites > Edit
    Route::screen('/{website}/edit', WebsiteEditScreen::class)
        ->name('platform.websites.edit')
        ->breadcrumbs(fn (Trail $trail, $website) => $trail
            ->parent('platform.websites')
            ->push($website->domain, route('platform.websites.edit', $website)));
});

Route::prefix('rubrics')->group(function () {
    // Platform > Rubrics
    Route::screen('/', RubricListScreen::class)
        ->name('platform.rubrics')
        ->breadcrumbs(fn (Trail $trail) => $trail
            ->parent('platform.index')
            ->push(__('Rubrics'), route('platform.rubrics')));
    // Platform > Rubrics > Create
    Route::screen('/create', RubricEditScreen::class)
        ->name('platform.rubrics.create')
        ->breadcrumbs(fn (Trail $trail) => $trail
            ->parent('platform.rubrics')
            ->push(__('Create'), route('platform.rubrics.create')));
    // Platform > Rubrics > Edit
    Route::screen('/{rubric}/edit', RubricEditScreen::class)
        ->name('platform.rubrics.edit')
        ->breadcrumbs(fn (Trail $trail, $rubric) => $trail
            ->parent('platform.rubrics')
            ->push($rubric->title, route('platform.rubrics.edit', $rubric)));
});

Route::prefix('articles')->group(function () {
    // Platform > Articles
    Route::screen('/', ArticleListScreen::class)
        ->name('platform.articles')
        ->breadcrumbs(fn (Trail $trail) => $trail
            ->parent('platform.index')
            ->push(__('Articles'), route('platform.articles')));
    // Platform > Articles > Create
    Route::screen('/create', ArticleEditScreen::class)
        ->name('platform.articles.create')
        ->breadcrumbs(fn (Trail $trail) => $trail
            ->parent('platform.articles')
            ->push(__('Create'), route('platform.articles.create')));
    // Platform > Articles > Edit
    Route::screen('/{article}/edit', ArticleEditScreen::class)
        ->name('platform.articles.edit')
        ->breadcrumbs(fn (Trail $trail, $article) => $trail
            ->parent('platform.articles')
            ->push($article->title, route('platform.articles.edit', $article)));
});

