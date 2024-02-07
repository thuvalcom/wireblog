<div>
    <div class="mt-6 w-full sm:w-full md:w-full lg:w-full">

        <div class="mb-2 mt-2">
            @if (session('success'))
                <div class="mb-4 max-w-md bg-green-500 p-4 text-white">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 max-w-md bg-red-500 p-4 text-white">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        <form wire:submit="update" class="rounded-md bg-gray-50 p-6 shadow-md">
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
                <textarea wire:model="content" id="content" name="content" class="mt-1 w-full rounded-md border bg-indigo-200 p-2"></textarea>
                @error('content')
                    <em>{{ $message }}</em>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-semibold text-indigo-600">Upload Image:</label>
                <input wire:model="image" type="file" id="image" name="image"
                    class="mt-1 rounded-md border bg-indigo-200 p-2">
                @if ($image)
                    <p class="mt-2 text-sm text-gray-500">Uploading...</p>
                @endif
                @error('image')
                    <em>{{ $message }}</em>
                @enderror
            </div>

            <div class="mb-4">
                <label for="category" class="block text-sm font-semibold text-white">Category:</label>
                <select wire:model="category_id" id="category" name="category"
                    class="mt-1 w-full rounded-md border bg-indigo-200 p-2">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <em>{{ $message }}</em>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-semibold text-white">Status:</label>
                <select wire:model="status" id="status" name="status"
                    class="mt-1 w-full rounded-md border bg-indigo-200 p-2">
                    <option value="published">Published</option>
                    <option value="draft">Draft</option>
                </select>
                @error('status')
                    <em>{{ $message }}</em>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-semibold text-indigo-600">Description:</label>
                <textarea wire:model="description" id="description" name="description"
                    class="mt-1 w-full rounded-md border bg-indigo-200 p-2"></textarea>
                @error('description')
                    <em>{{ $message }}</em>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tags" class="block text-sm font-semibold text-indigo-600">Tags:</label>
                <input wire:model="tags" type="text" id="tags" name="tags"
                    class="mt-1 w-full rounded-md border bg-indigo-200 p-2">
                @error('tags')
                    <em>{{ $message }}</em>
                @enderror
            </div>

            <div class="mb-4">
                <label class="mb-2 block text-sm font-bold text-gray-700" for="user_id">
                    Select User
                </label>
                <select wire:model="user_id"
                    class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
                    id="user_id" name="user_id">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <em>{{ $message }}</em>
                @enderror
            </div>

            <button type="submit" class="rounded-md bg-indigo-700 p-2 text-white hover:bg-indigo-800">Update
                Post</button>
        </form>

    </div>
</div>
