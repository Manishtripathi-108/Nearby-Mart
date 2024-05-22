<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <!-- component -->
        <div>
            <div class="flex h-screen justify-center">
                <div class="mx-auto flex w-full max-w-md items-center px-6 lg:w-full">
                    <div class="flex-1">
                        <div class="text-center">
                            <h2 class="text-center text-4xl font-bold text-gray-700">Nearby Mart</h2>
                            <p class="mt-3 text-gray-500">Sign in to access your account</p>
                        </div>

                        <div class="mt-8">
                            <!-- Email Address -->
                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input class="mt-1 block w-full" id="email" name="email" type="email" :value="old('email')" required autofocus autocomplete="username" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('Password')" />
                                <x-text-input class="mt-1 block w-full" id="password" name="password" type="password" required autocomplete="current-password" />
                                <x-input-error class="mt-2" :messages="$errors->get('password')" />
                            </div>

                            <!-- Remember Me -->
                            <div class="mt-4 block">
                                <label class="inline-flex items-center" for="remember_me">
                                    <input class="rounded border-gray-300 text-gray-600 shadow-sm focus:ring-blue-500" id="remember_me" name="remember" type="checkbox">
                                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            <div class="mt-4 flex items-center justify-between">
                                @if (Route::has('password.request'))
                                    <a class="rounded-md text-sm text-gray-600 underline hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif

                                <x-primary-button class="ms-4">
                                    {{ __('Login') }}
                                </x-primary-button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 rounded-md text-center text-sm text-gray-600">
                New User?
                <a href="{{ route('register') }}">
                    <span class="underline hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        {{ __('Register Here') }}
                    </span>
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
