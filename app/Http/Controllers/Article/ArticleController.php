<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Service\WebsiteService;

class ArticleController extends Controller
{

    protected WebsiteService $websiteService;

    public function __construct(WebsiteService $websiteService)
    {
        $this->websiteService = $websiteService;
    }

    public function index ($slug)
    {
        $website = $this->websiteService->rememberWebsite();

        $rubric = $website->rubrics()->where('slug', $slug)->first();

        $articles = $rubric->articles()->where('is_publish', true)->paginate(5);


        return view('pages.rubric', [
            'rubricTitle' => $rubric->title,
            'rubricSlug' => $rubric->slug,
            'articles' => $articles,
        ]);
    }

    public function show ($rubric_slug, $article_slug)
    {

        $website = $this->websiteService->rememberWebsite();

        $rubric = $website->rubrics()->where('slug', $rubric_slug)->first();

        $article = $rubric->articles->where('slug', $article_slug)->first();

        return view('pages.article', [
            'rubric' => $rubric,
            'article' => $article
        ]);
    }
}
