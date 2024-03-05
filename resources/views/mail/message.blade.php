@extends('layouts.email')

@section('title')
    {{ $subject }}
@endsection

@section('content')
    <h3>{{ $subject }}</h3>

    {!! $body !!}
@endsection


