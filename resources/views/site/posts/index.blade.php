@extends('layouts.app')

@section('content')

    <div class="container">
        @foreach($posts as $post)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->getTitle() }}</h5>
                    <p class="card-text">
                        {{ $post->getBrief() }}
                    </p>
                    <a href="{{ route('site.post.show', $post->getId()) }}" class="btn btn-primary">{{ __('Read More') }}</a>
                </div>
            </div>
        @endforeach
    </div>

@endsection
