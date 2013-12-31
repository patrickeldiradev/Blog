@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="card-title">{{ $post->title }}</h1>
        <p class="card-text">
            {{ $post->description }}
        </p>
        <div>
            <b>Author:</b> {{ $post->user->name }}
        </div>
        <div>
            <b>publish at:</b> {{ $post->publication_date }}
        </div>
    </div>
@endsection
