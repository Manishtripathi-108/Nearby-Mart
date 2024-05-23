<x-guest-layout>
    <x-neomorphic-form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-neomorphic-form.label for="name" :value="__('Name')" />
            <x-neomorphic-form.input class="mt-1 block w-full" id="name" name="name" type="text" :value="old('name')" required autofocus autocomplete="name" />
            <x-neomorphic-form.input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-neomorphic-form.label for="email" :value="__('Email')" />
            <x-neomorphic-form.input class="mt-1 block w-full" id="email" name="email" type="email" :value="old('email')" required autocomplete="username" />
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
            <a class="rounded-md text-sm text-gray-600 underline hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </x-neomorphic-form>
</x-guest-layout>
