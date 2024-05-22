<section>
<header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Avatar ') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your Avatar.") }}
        </p>
    </header>
@if(session('changed'))
    <div class="bg-green-500 text-white p-4 rounded mb-4">
        {{ session('changed') }}
    </div>
    @endif

    <div>
        <form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <!-- Profile Image -->
            <div class="flex items-center">
                <div class="mr-4">
                    <img id="profile_image"
                        src="{{ $user->profile_picture ? asset('storage/Avatar/' . $user->profile_picture) : 'https://via.placeholder.com/150' }}"
                        alt="Profile Image" class="h-24 w-24 rounded-full object-cover">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="block text-gray-700">Profile Image</label>
                    <input type="file" id="profile_picture" name="profile_picture" accept="image/*"
                        class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
            </div>
            <x-primary-button>Upload</x-primary-button>
        </form>
    </div>
</section>