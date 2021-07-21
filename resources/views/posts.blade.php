@extends('layout')

@section('title')
    Blogs
@endsection

@section('content')
    @if(!empty($posts))
        @foreach ($posts as $post)
            <article>
                <h1>{!! $post->title !!}</h1>
                <p>
                    By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
                </p>
                <div>
                    {{ $post->excerpt }}
                    <a href="/posts/{{ $post->slug }}">View All &rAarr;</a>
                </div>
            </article>
        @endforeach
    @endif
@endsection