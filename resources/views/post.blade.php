@extends('layout')

@section('title')
    {!! $post->title !!}
@endsection

@section('content')
    <article>
        <h1>{!! $post->title !!}</h1>
        <p>{!! $post->body !!}</p>
    </article>
    <a href="/">Go Back</a>
@endsection