<div>
@if(!$rubrics->isEmpty())
<div class="row mb-2">
    @foreach($rubrics as $rubric)
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h3 class="mb-0">{{ $rubric->title }}</h3>
                        <a href="{{ route('articles.index', ['rubric_slug' => $rubric->slug]) }}" class="icon-link gap-1 icon-link-hover stretched-link">
                            <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
                        </a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    </div>
                </div>
            </div>
    @endforeach
</div>
@endif
    <div class="d-flex justify-content-center">
        {{ $rubrics->links() }}
    </div>
</div>
