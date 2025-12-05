@extends('partials.layout')
@section('title', 'New Post')
@section('content')
    <div class="card bg-base-300 w-1/2 mx-auto">
        <div class="card-body">
            <form action="{{route('posts.store')}}" method="POST">
                @csrf
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">@lang('Title')</legend>
                    <input type="text" name="title" class="input w-full" value="{{ old('title') }}" placeholder="@lang('Title')"
                        required autofocus/>
                    @error('title')
                        <p class="label">{{ $message }}</p>
                    @enderror
                </fieldset>
                 <fieldset class="fieldset">
                    <legend class="fieldset-legend">@lang('Content')</legend>
                    <textarea type="text" name="body" class="textarea w-full" rows="12" placeholder="@lang('Content')">{{ old('body') }}</textarea>
                    @error('body')
                        <p class="label">{{ $message }}</p>
                    @enderror
                </fieldset>
                <button class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
