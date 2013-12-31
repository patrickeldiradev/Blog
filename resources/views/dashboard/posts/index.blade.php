@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <h2 class="col-md-8">
                posts:
            </h2>
            <h2 class="col-md-4">
                <a class="btn btn-success pull-right" href="{{ route('dashboard.post.create') }}">Create new</a>
            </h2>
        </div>

        @include('dashboard.partials.messages')

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <th>{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $posts->links() }}
    </div>

@endsection
