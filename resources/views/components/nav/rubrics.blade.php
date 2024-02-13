<div>
    @if(!$rubrics->isEmpty())
        <div class="nav-scroller py-1 mb-3 border-bottom">
            <nav class="nav nav-underline justify-content-between">
                @foreach ($rubrics as $rubric)
                    <a class="nav-link link-body-emphasis" href="{{ route('articles.index', ['rubric_slug' => $rubric->slug]) }}">{{ $rubric->title }}</a>
                @endforeach
            </nav>
        </div>
    @endif
</div>
