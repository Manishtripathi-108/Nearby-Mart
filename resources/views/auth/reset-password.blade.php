<x-guest-layout>
    <x-neomorphic-form method="POST" action="{{ route('/reset-password') }}">
        @csrf

        <!-- Password Reset Token -->
        <input name="token" type="hidden" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-neomorphic-form.label for="email" :value="__('Email')" />
            <x-neomorphic-form.input class="mt-1 block w-full" id="email" name="email" type="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-neomorphic-form.input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-neomorphic-form.label for="password" :value="__('Password')" />
            <x-neomorphic-form.input class="mt-1 block w-full" id="password" name="password" type="password" required autocomplete="new-password" />
            <x-neomorphic-form.input-error class="mt-2" :messages="$errors->get('password')" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-neomorphic-form.label for="password_confirmation" :value="__('Confirm Password')" />

            <x-neomorphic-form.input class="mt-1 block w-full" id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" />

            <x-neomorphic-form.input-error class="mt-2" :messages="$errors->get('password_confirmation')" />
        </div>

        <div class="mt-4 flex items-center justify-end">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </x-neomorphic-form>
</x-guest-layout>
