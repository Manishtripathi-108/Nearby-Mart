<section>
    <x-neomorphic-form class="mt-6 space-y-6" method="post" action="{{ route('password.update') }}">
        <div>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Update Password') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </p>
        </div>

        @csrf
        @method('put')

        <div>
            <x-neomorphic-form.label for="update_password_current_password" :value="__('Current Password')" />
            <x-neomorphic-form.input class="mt-1 block w-full" id="update_password_current_password" name="current_password" type="password" autocomplete="current-password" />
            <x-neomorphic-form.input-error class="mt-2" :messages="$errors->updatePassword->get('current_password')" />
        </div>

        <div>
            <x-neomorphic-form.label for="update_password_password" :value="__('New Password')" />
            <x-neomorphic-form.input class="mt-1 block w-full" id="update_password_password" name="password" type="password" autocomplete="new-password" />
            <x-neomorphic-form.input-error class="mt-2" :messages="$errors->updatePassword->get('password')" />
        </div>

        <div>
            <x-neomorphic-form.label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-neomorphic-form.input class="mt-1 block w-full" id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" />
            <x-neomorphic-form.input-error class="mt-2" :messages="$errors->updatePassword->get('password_confirmation')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p class="text-sm text-green-600" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">{{ __('Saved.') }}</p>
            @endif
        </div>
    </x-neomorphic-form>
</section>
