@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="card-title">{{ $post->getTitle() }}</h1>
        <p class="card-text">
            {{ $post->getDescription() }}
        </p>
        <div>
            <b>Author:</b> {{ $post->getUserTransfer()->getName() }}
        </div>
        <div>
            <b>publish at:</b> {{ $post->getPublicationDate() }}
        </div>
    </div>
@endsection
