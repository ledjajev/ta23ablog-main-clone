@extends('partials.layout')
@section('title', $post->title)
@section('content')
    @include('partials.post-card', ['full' => true])

    @foreach ($post->comments as $comment)
        <div class="card bg-base-300 shadow-sm my-2">
            <div class="card-body">
                <p>{{ $comment->body }}</p>
                <p class="text-base-content/50">{{ $comment->user->name }}</p>
            </div>
        </div>
    @endforeach
@endsection
