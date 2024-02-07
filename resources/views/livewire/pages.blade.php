<div>
    <div class="w-full overflow-x-hidden bg-gray-200 px-6 py-6">
        <div class="container mx-auto bg-white p-6">
            <div class="flex min-h-screen flex-col justify-center bg-gray-100 py-6 sm:py-12">
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
                <!-- Table -->
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
                        @foreach ($pages as $page)
                            <tr wire:key="{{ $page->id }}">
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900">
                                    {{ $page->title }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900">
                                    <button wire:click="edit({{ $page->id }})"
                                        class="rounded bg-indigo-700 px-4 py-2 font-bold text-white hover:bg-indigo-900">
                                        Update
                                    </button>
                                    <button wire:click="confirmDelete({{ $page->id }})"
                                        class="rounded bg-red-500 px-4 py-2 font-bold text-white hover:bg-red-700">
                                        Delete
                                    </button>

                                </td>
                            </tr>
                        @endforeach
                        <!-- More rows... -->
                    </tbody>
                </table>
                <!-- Table -->
                <!-- Check Status -->
                @if ($updateMode)
                    @include('livewire.page-update')
                @else
                    <!-- Check Status -->

                    <!-- form save -->

                    <form wire:submit="save" class="w-4/12 rounded-md bg-gray-50 p-6">
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

                        <button type="submit"
                            class="rounded-md bg-indigo-700 px-8 py-2 text-white hover:bg-indigo-800">Save
                            Page</button>
                    </form>
                    <!-- form save -->
                @endif

            </div>
        </div>

    </div>
    <!-- Modal -->
    @if ($confirmingDelete)
        <div class="fixed inset-0 flex items-center justify-center bg-indigo-800 bg-opacity-80">
            <div class="rounded bg-indigo-800 p-6 shadow-md">
                <p class="text-lg">Are you sure, you want to delete {{ $pageToDelete->title }}?</p>
                <div class="mt-4 flex justify-end space-x-4">
                    <button wire:click="destroy({{ $pageToDelete->id }})"
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
