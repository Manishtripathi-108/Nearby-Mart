<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <!-- component -->
        <div class="dark:bg-gray-900">
            <div class="flex justify-center h-screen">
                <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-full">
                    <div class="flex-1">
                        <div class="text-center">
                            <h2 class="text-4xl font-bold text-center text-gray-700 dark:text-white">Nearby Mart</h2>
                            <p class="mt-3 text-gray-500 dark:text-gray-300">Sign in to access your account</p>
                        </div>

                        <div class="mt-8">
                            <!-- Email Address -->
                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input class="mt-1 block w-full" id="email" name="email" type="email"
                                    :value="old('email')" required autofocus autocomplete="username" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('Password')" />
                                <x-text-input class="mt-1 block w-full" id="password" name="password" type="password"
                                    required autocomplete="current-password" />
                                <x-input-error class="mt-2" :messages="$errors->get('password')" />
                            </div>

                            <!-- Remember Me -->
                            <div class="mt-4 block">
                                <label class="inline-flex items-center" for="remember_me">
                                    <input class="rounded border-gray-300 text-gray-600 shadow-sm focus:ring-blue-500"
                                        id="remember_me" name="remember" type="checkbox">
                                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            <div class="mt-4 flex items-center justify-between">
                                @if (Route::has('password.request'))
                                <a class="rounded-md text-sm text-gray-600 underline hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                                @endif


                                <div class="mt-6">
                                    <button type="submit"
                                        class="w-full px-4 py-2 tracking-wide  transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                        Sign in
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 rounded-md text-center text-sm text-gray-600">
                New User?
                <a href="{{ route('register') }}">
                    <span
                        class="underline hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        {{ __('Register Here') }}
                    </span>
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>