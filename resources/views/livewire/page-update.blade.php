<div>
    <!-- form save -->

    <form wire:submit="update" class="w-4/12 rounded-md bg-gray-50 p-6">
        <div class="mb-4">
            <label for="title" class="block text-sm font-semibold text-indigo-600">Title:</label>
            <input wire:model="title" type="text" id="title" name="title"
                class="mt-1 w-full rounded-md border bg-indigo-200 p-2">
            @error('title')
                <em>{{ $message }}</em>
            @enderror
        </div>

        <div class="mb-4">
            <label for="slug" class="block text-sm font-semibold text-indigo-600">Slug:</label>
            <input wire:model="slug" type="text" id="slug" name="slug"
                class="mt-1 w-full rounded-md border bg-indigo-200 p-2">
            @error('slug')
                <em>{{ $message }}</em>
            @enderror
        </div>

        <div class="mb-4">
            <label for="content" class="block text-sm font-semibold text-indigo-600">Content:</label>
            <textarea wire:model="content" name="content" class="mt-1 w-full rounded-md border bg-indigo-200 p-2"></textarea>
            @error('content')
                <em>{{ $message }}</em>
            @enderror
        </div>

        <button type="submit" class="rounded-md bg-indigo-700 px-8 py-2 text-white hover:bg-indigo-800">Update
            Page</button>
    </form>
    <!-- form save -->
</div>
