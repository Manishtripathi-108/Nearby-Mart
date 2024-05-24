<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Avatar') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Update your Avatar.') }}
        </p>
    </header>

    <div>
        <form class="space-y-4" action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Profile Image -->
            <div class="flex items-center">
                <div class="mr-4">
                    <img class="h-24 w-24 rounded-full object-cover" id="profile_image" src="{{ $user->profile_picture ? asset('avatars/' . $user->profile_picture) : 'https://via.placeholder.com/150' }}" alt="Profile Image">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="block text-gray-700">Profile Image</label>
                    <input class="mt-1 block w-full rounded-md border border-gray-300 text-sm text-gray-900 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" id="profile_picture" name="profile_picture" type="file" accept="image/*">
                </div>
            </div>
            <x-primary-button>Upload</x-primary-button>
        </form>
    </div>

    @push('scripts')
        <script>
            document.getElementById('profile_picture').addEventListener('change', function(event) {
                const [file] = event.target.files;
                if (file) {
                    document.getElementById('profile_image').src = URL.createObjectURL(file);
                }
            });
        </script>
    @endpush
</section>
