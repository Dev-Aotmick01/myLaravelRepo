@extends("layouts.front")

@section("content")

@if($posts->count())
    @foreach($posts as $post)
        <div class="post-preview">
{{--            <a href="{{route("home.post", $post->id)}}">--}}
            <a href="{{route("home.post", $post->slug)}}">
                <h2 class="post-title">
                    {{$post->title}}
                </h2>
                <h3 class="post-subtitle">
                    {{\Illuminate\Support\Str::words($post->title, 4, '.....')}}
                </h3>
            </a>
            <p class="post-meta">Posted by
                <a href="#">
                    {{$post->user->name}}
{{--                    {{ $post->user ? $post->user->name : 'Unknown Author' }}--}}
                </a>
                {{$post->created_at->format("m/Y")}}</p>
        </div>
        <hr>
    @endforeach
@endif
    <!-- Pager -->
{{--{{$posts->currentPage()}}--}}
{{--<br>--}}
{{--{{gettype($posts->currentPage())}}--}}
<div class="clearfix">
    @if($posts->currentPage() === 1)
        <a class="btn btn-primary float-right" href="{{$posts->nextPageUrl()}}">Newer Posts &rarr;</a>
    @elseif(!$posts->hasMorePages())
        <a class="btn btn-primary float-left" href="{{$posts->previousPageUrl()}}">&larr; Older Posts </a>
    @else
        <a class="btn btn-primary float-left" href="{{$posts->previousPageUrl()}}">&larr; Older Posts </a>
        <a class="btn btn-primary float-right" href="{{$posts->nextPageUrl()}}">Newer Posts &rarr;</a>
    @endif
</div>
    {{--        <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>--}}
@endsection







{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                        <div class="fw-bold text-primary fs-4">--}}
{{--                            {!! __('Hello, :name!<br>You are logged in!', ['name' => e(Auth::user()->name)]) !!}--}}
{{--                        </div>--}}
{{--                        --}}{{--                        {!! __('Hello, :name!<br>You are logged in!', ['name' => e(Auth::user()->name)]) !!}--}}
{{--                        --}}{{--                    {{ __(' You are logged in!') }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}
