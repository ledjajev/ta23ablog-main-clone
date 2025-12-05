@extends('partials.layout')
@section('title', 'Login')
@section('content')
    <!-- Session Status -->
    @if (session('status'))
        <div role="alert" class="alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('status') }}</span>
        </div>
    @endif
    <div class="card w-96 bg-base-100 shadow-xl mx-auto">
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">@lang('Email')</legend>
                    <input type="email" name="email" class="input" value="{{ old('email') }}"
                        placeholder="@lang('Email')" required autofocus autocomplete="username" />
                    @error('email')
                        <p class="label">{{ $message }}</p>
                    @enderror
                </fieldset>
                <!-- Password -->
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">@lang('Password')</legend>
                    <input type="password" name="password" class="input" value="{{ old('password') }}"
                        placeholder="@lang('Password')" required autocomplete="current-password" />
                    @error('password')
                        <p class="label">{{ $message }}</p>
                    @enderror
                </fieldset>

                <!-- Remember Me -->

                <fieldset class="fieldset w-64 p-4">
                    <label class="label">
                        <input name="remember" type="checkbox" class="checkbox" />
                        @lang('Remember me')
                    </label>
                </fieldset>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="link" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <button class="btn btn-primary ms-3">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
