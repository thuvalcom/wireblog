<div>
    <div class="w-full overflow-x-hidden bg-gray-200 px-6 py-6">

        <div
            class="container grid w-full grid-cols-1 bg-gray-100 p-6 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-2">
            {{-- table --}}

            <table class="table-auto divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-900">
                            ID
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-900">
                            Title
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-900">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($posts as $post)
                        <tr wire:key="{{ $post->id }}">
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900">
                                {{ $loop->iteration }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900">
                                {{ $post->title }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900">
                                <button wire:click="edit({{ $post->id }})"
                                    class="rounded bg-indigo-700 px-4 py-2 font-bold text-white hover:bg-indigo-900">
                                    Update
                                </button>
                                <button wire:click="confirmDelete({{ $post->id }})"
                                    class="rounded bg-red-500 px-4 py-2 font-bold text-white hover:bg-red-700">
                                    Delete
                                </button>

                            </td>
                        </tr>
                    @endforeach
                    <!-- More rows... -->
                </tbody>
            </table>
            {{-- end table --}}
        </div>
        {{--    main area --}}
        <div
            class="container grid w-full grid-cols-1 bg-gray-100 p-6 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-2">
            @if ($updateMode)
                @include('livewire.post-update')
            @else
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
                    <form wire:submit="save" class="rounded-md bg-gray-50 p-6 shadow-md">
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
                            <label for="image" class="block text-sm font-semibold text-indigo-600">Upload
                                Image:</label>
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
                            <label for="description"
                                class="block text-sm font-semibold text-indigo-600">Description:</label>
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

                        <button type="submit" class="rounded-md bg-indigo-700 p-2 text-white hover:bg-indigo-800">Save
                            Post</button>
                    </form>

                </div>
            @endif

        </div>

    </div>

    <!-- Modal -->
    @if ($confirmingDelete)
        <div class="fixed inset-0 flex items-center justify-center bg-indigo-800 bg-opacity-80">
            <div class="rounded bg-indigo-800 p-6 shadow-md">
                <p class="text-lg">Are you sure, you want to delete {{ $postToDelete->title }}?</p>
                <div class="mt-4 flex justify-end space-x-4">
                    <button wire:click="destroy({{ $postToDelete->id }})"
                        class="rounded bg-red-500 px-4 py-2 font-bold text-white hover:bg-red-700">
                        Yes
                    </button>
                    <button wire:click="$set('confirmingDelete', false)"
                        class="rounded bg-gray-400 px-4 py-2 font-bold text-white hover:bg-gray-600">
                        No
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
