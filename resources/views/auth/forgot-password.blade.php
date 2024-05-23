<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <x-neomorphic-form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-neomorphic-form.label for="email" :value="__('Email')" />
            <x-neomorphic-form.input class="mt-1 block w-full" id="email" name="email" type="email" :value="old('email')" required autofocus />
            <x-neomorphic-form.input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div class="mt-4 flex items-center justify-end">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </x-neomorphic-form>
</x-guest-layout>
