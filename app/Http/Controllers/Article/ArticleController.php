<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;


class ArticleController extends Controller
{

    public function index ($slug)
    {

        $website = request()->tenant;

        $rubric = $website->rubrics()->where('slug', $slug)->first();

        $articles = $rubric->articles()->where('is_publish', true)->paginate(5);

        return view('pages.rubric', [
            'rubric' => $rubric,
            'articles' => $articles,
        ]);
    }

    public function show ($rubric_slug, $article_slug)
    {

        $website = request()->tenant;

        $rubric = $website->rubrics()->where('slug', $rubric_slug)->first();

        $article = $rubric->articles->where('slug', $article_slug)->first();

        return view('pages.article', [
            'rubric' => $rubric,
            'article' => $article
        ]);
    }
}
