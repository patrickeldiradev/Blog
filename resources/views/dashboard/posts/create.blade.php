@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>
            {{ __('Create new post') }}:
        </h2>

        @include('dashboard.posts.form')
    </div>

@endsection
