@extends('layout')

@section('title')
    Blogs
@endsection

@section('content')
    @if(!empty($posts))
        @foreach ($posts as $post)
            <article>
                <h1>{!! $post->title !!}</h1>
                <div>
                    {{ $post->excerpt }}
                    <a href="/posts/{{ $post->slug }}">View All &rAarr;</a>
                </div>
            </article>
        @endforeach
    @endif
@endsection