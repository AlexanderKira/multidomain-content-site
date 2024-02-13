@extends('layouts.app')

@section('title')
    {{ $rubric->title }}
@endsection

@section('content')
    <h3 class="pb-2 mb-4 fst-italic border-bottom">
        {!! \Diglactic\Breadcrumbs\Breadcrumbs::render('articles.index') !!}
    </h3>
@if(!$articles->isEmpty())
    <div class="row mb-2">
    @foreach($articles as $article)
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary-emphasis">{{ $rubric->title }}</strong>
                        <h3 class="mb-0">{{ $article->title }}</h3>
                        <div class="mb-1 text-body-secondary">{{ $article->created_at }}</div>
                        <p class="card-text mb-auto">{!! substr($article->text, 0, 100) . '...' !!}</p>
                        <a href="{{ route('article.show', ['rubric_slug' => $rubric->slug, 'article_slug' =>  $article->slug]) }}" class="icon-link gap-1 icon-link-hover stretched-link">
                            Continue reading
                        </a>
                    </div>
                </div>
            </div>
    @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $articles->links() }}
    </div>
@endif
@endsection
