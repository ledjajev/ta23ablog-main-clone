<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-base-content">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-base-content">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>
    <button class="btn btn-error" onclick="my_modal_1.showModal()">{{ __('Delete Account') }}</button>

    <dialog id="my_modal_1" class="modal">
        <div class="modal-box">
            <form id="delete-account" method="post" action="{{ route('profile.destroy') }}" class="p-6">
                @csrf
                @method('delete')

                <h2 class="text-lg font-medium text-base-content">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                <p class="mt-1 text-sm text-base-content">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">@lang('Password')</legend>
                    <input type="password" name="password" class="input w-full"
                        placeholder="@lang('Password')" required autocomplete="current-password" />
                    @error('password')
                        <p class="label">{{ $message }}</p>
                    @enderror
                </fieldset>
            </form>
            <div class="modal-action">
                <form method="dialog">
                    <button class="btn btn-secondary">{{ __('Cancel') }}</button>
                </form>
                <button class="btn btn-error" type="submit" form="delete-account">
                    {{ __('Delete Account') }}
                </button>
            </div>
        </div>
    </dialog>
</section>
