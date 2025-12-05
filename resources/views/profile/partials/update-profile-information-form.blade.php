<section>
    <header>
        <h2 class="text-lg font-medium text-base-content">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-base-content">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <fieldset class="fieldset">
            <legend class="fieldset-legend">@lang('Name')</legend>
            <input type="text" name="name" class="input w-full" value="{{ old('name', $user->name) }}"
                placeholder="@lang('Name')" required autofocus autocomplete="name" />
            @error('name')
                <p class="label">{{ $message }}</p>
            @enderror
        </fieldset>
        <div>
            <fieldset class="fieldset">
                <legend class="fieldset-legend">@lang('Email')</legend>
                <input type="email" name="email" class="input w-full" value="{{ old('email', $user->email) }}"
                    placeholder="@lang('Email')" required autocomplete="username" />
                @error('email')
                    <p class="label">{{ $message }}</p>
                @enderror
            </fieldset>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-base-content">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="link">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-success">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button class="btn btn-primary">{{ __('Save') }}</button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-base-content">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
