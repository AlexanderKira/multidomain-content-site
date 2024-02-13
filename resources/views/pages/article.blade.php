@extends('layouts.app')

@section('title')
    {{ $article->title }}
@endsection

@section('content')
    <div class="row g-5">
        <div class="col-md-12">
            <h3 class="pb-2 mb-4 fst-italic border-bottom">
                {!! \Diglactic\Breadcrumbs\Breadcrumbs::render('article.show') !!}
            </h3>

            <article class="blog-post">
                <h2 class="display-5 link-body-emphasis mb-1">{{ $article->title }}</h2>
                <p class="blog-post-meta">{{ $article->created_at }}<a href="#" class="m-lg-3">{{ $article->author }}</a></p>
                {!! $article->text !!}
            </article>
        </div>
    </div>
@endsection



