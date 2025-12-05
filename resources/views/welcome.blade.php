@extends('partials.layout')
@section('title', 'Home')
@section('content')

    {{-- Custom pagination --}}
    @include('partials.pagination', ['paginator' => $posts])

    {{-- Posts grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-2">
        @foreach ($posts as $post)
            @include('partials.post-card')
        @endforeach
    </div>

    {{-- Custom pagination at bottom --}}
    @include('partials.pagination', ['paginator' => $posts])

@endsection
