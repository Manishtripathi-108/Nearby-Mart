<x-app-layout>
    <!-- edit.blade.php -->

    <form action="{{ route('store.update', $store->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Name Input -->
        <div class="form-group">
            <label for="name">Store Name</label>
            <input class="form-control" id="name" name="name" type="text" value="{{ old('name', $store->name) }}">
        </div>

        <!-- Phone Input -->
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input class="form-control" id="phone" name="phone" type="text" value="{{ old('phone', $store->phone) }}">
        </div>

        <!-- Email Input -->
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" id="email" name="email" type="email" value="{{ old('email', $store->email) }}">
        </div>

        <!-- Submit Button -->
        <button class="btn btn-primary" type="submit">Update Store</button>
    </form>

</x-app-layout>
