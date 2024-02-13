<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Illuminate\Support\Facades\Request;

// Content

// Home and Rubrics
Breadcrumbs::for('pages.home', function (BreadcrumbTrail $trail) {
    $trail->push(__('Home'), route('pages.home'));
});
// Articles
Breadcrumbs::for('articles.index', function (BreadcrumbTrail $trail) {
    $rubric_slug = Request::route('rubric_slug');
    $rubric = \App\Models\Rubric::where('slug', $rubric_slug)->first();
    $trail->parent('pages.home');
    $trail->push(__($rubric->title), route('articles.index', ['rubric_slug' => $rubric_slug]));
});
// Article
Breadcrumbs::for('article.show', function (BreadcrumbTrail $trail) {
    $rubric_slug = Request::route('rubric_slug');
    $article_slug = Request::route('article_slug');
    $article = \App\Models\Article::where('slug', $article_slug)->first();
    $trail->parent('articles.index');
    $trail->push(__($article->title), route('article.show', ['rubric_slug' => $rubric_slug, 'article_slug' => $article_slug]));
});

