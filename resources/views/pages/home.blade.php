@extends('layouts.app')

@section('title')
    Главная страница
@endsection
@section('content')
    <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary" style="background-image: url('{{ $website->logo }}'); background-size: cover; background-position: center;">
        <div class="col-lg-6 px-0">
            <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
            <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
        </div>
    </div>
    <div class="row mb-2">
        <x-main.rubrics/>
    </div>
@endsection



