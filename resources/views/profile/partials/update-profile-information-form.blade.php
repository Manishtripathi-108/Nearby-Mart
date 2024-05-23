<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    <x-neomorphic-form class="mt-6 space-y-6" method="post" action="{{ route('profile.update') }}">
        <div>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Profile Information') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </div>

        @csrf
        @method('patch')

        <div>
            <x-neomorphic-form.label for="name" :value="__('Name')" />
            <x-neomorphic-form.input class="mt-1 block w-full" id="name" name="name" type="text" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-neomorphic-form.input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-neomorphic-form.label for="phone" :value="__('Phone Number')" />
            <x-neomorphic-form.input class="mt-1 block w-full" id="phone" name="phone" type="text" :value="old('phone', $user->phone)" required autocomplete="phonenumber" />
            <x-neomorphic-form.input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div>
            <x-neomorphic-form.label for="dob" :value="__('Date of birth')" />
            <x-neomorphic-form.input class="mt-1 block w-full" id="dob" name="dob" type="date" :value="old('dob', $user->dob)" required autocomplete="dob" />
            <x-neomorphic-form.input-error class="mt-2" :messages="$errors->get('dob')" />
        </div>

        <div>
            <x-neomorphic-form.label for="email" :value="__('Email')" />
            <x-neomorphic-form.input class="mt-1 block w-full" id="email" name="email" type="email" :value="old('email', $user->email)" required autocomplete="username" />
            <x-neomorphic-form.input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="mt-2 text-sm text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" form="send-verification">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p class="text-sm text-green-600" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">{{ __('Saved.') }}</p>
            @endif
        </div>
    </x-neomorphic-form>
</section>
