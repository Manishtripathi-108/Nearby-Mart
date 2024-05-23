<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <x-neomorphic-form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-neomorphic-form.label for="password" :value="__('Password')" />

            <x-neomorphic-form.input class="mt-1 block w-full" id="password" name="password" type="password" required autocomplete="current-password" />

            <x-neomorphic-form.input-error class="mt-2" :messages="$errors->get('password')" />
        </div>

        <div class="mt-4 flex justify-end">
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </x-neomorphic-form>
</x-guest-layout>
