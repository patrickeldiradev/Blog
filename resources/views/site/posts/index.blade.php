@extends('layouts.app')

@section('content')

    <div class="container">
        @foreach($posts as $post)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">
                        {{ $post->brief }}
                    </p>
                    <a href="{{ route('site.post.show', $post->id) }}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        @endforeach

        {{ $posts->links() }}
    </div>

@endsection
