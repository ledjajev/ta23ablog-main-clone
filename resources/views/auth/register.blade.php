@extends('partials.layout')
@section('title', 'Register')
@section('content')
    <div class="card w-96 bg-base-100 shadow-xl mx-auto">
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">@lang('Name')</legend>
                    <input type="text" name="name" class="input" value="{{ old('name') }}"
                        placeholder="@lang('Name')" required autofocus autocomplete="name" />
                    @error('name')
                        <p class="label">{{ $message }}</p>
                    @enderror
                </fieldset>
                <!-- Email Address -->

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">@lang('Email')</legend>
                    <input type="email" name="email" class="input" value="{{ old('email') }}"
                        placeholder="@lang('Email')" required autocomplete="username" />
                    @error('email')
                        <p class="label">{{ $message }}</p>
                    @enderror
                </fieldset>
                <!-- Password -->

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">@lang('Password')</legend>
                    <input type="password" name="password" class="input" value="{{ old('password') }}"
                        placeholder="@lang('Password')" required autocomplete="new-password" />
                    @error('password')
                        <p class="label">{{ $message }}</p>
                    @enderror
                </fieldset>
                <!-- Confirm Password -->
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">@lang('Confirm Password')</legend>
                    <input type="password" name="password_confirmation" class="input" value="{{ old('password') }}"
                        placeholder="@lang('Confirm Password')" required autocomplete="new-password" />
                    @error('password_confirmation')
                        <p class="label">{{ $message }}</p>
                    @enderror
                </fieldset>

                <div class="flex items-center justify-end mt-4">
                    <a class="link" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                    <button class="btn btn-primary ms-3">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
