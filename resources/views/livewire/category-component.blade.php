<div>

    <div class="w-full overflow-x-hidden bg-gray-200 px-6 py-6">
        {{--    main area --}}
        <div class="container grid h-screen w-full grid-cols-2 bg-white p-6 sm:w-full md:w-full">
            <div class="mx-auto mt-6 w-1/2">
                <h3 class="mb-4 bg-indigo-600 py-4 text-center text-white">Lets Create Category</h3>
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

                @if ($updateMode)
                    <div id="formContainer" class="mt-4 sm:w-full md:w-full">
                        <form class="mb-4 rounded bg-gray-200 px-8 pb-8 pt-6 shadow-md" wire:submit="update">

                            <div class="mb-4">
                                <label class="mb-2 block text-sm font-bold text-gray-700" for="name">
                                    Category Name
                                </label>

                                <input
                                    class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
                                    id="inputOne" name="name" type="text" placeholder="Input for category name"
                                    wire:model="name">

                                <span class="mt-4 bg-red-600">
                                    @error('name')
                                        <em>{{ $message }}</em>
                                    @enderror
                                </span>

                            </div>
                            <div class="flex items-center justify-between">
                                <button
                                    class="focus:shadow-outline rounded bg-indigo-600 px-4 py-2 font-bold text-white hover:bg-indigo-800 focus:outline-none"
                                    type="submit">
                                    update Category
                                </button>
                            </div>
                        </form>
                    </div>
                @else
                    <div id="formContainer" class="mt-4 sm:w-full md:w-full">
                        <form class="mb-4 rounded bg-gray-200 px-8 pb-8 pt-6 shadow-md" wire:submit="save">

                            <div class="mb-4">
                                <label class="mb-2 block text-sm font-bold text-gray-700" for="name">
                                    Category Name
                                </label>

                                <input
                                    class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
                                    id="inputOne" name="name" type="text" placeholder="Input for category name"
                                    wire:model="name">
                                <span class="mt-4 bg-red-600">
                                    @error('name')
                                        <em>{{ $message }}</em>
                                    @enderror
                                </span>

                            </div>
                            <div class="flex items-center justify-between">
                                <button
                                    class="focus:shadow-outline rounded bg-indigo-600 px-4 py-2 font-bold text-white hover:bg-indigo-800 focus:outline-none"
                                    type="submit">
                                    Create Category
                                </button>
                            </div>
                        </form>
                    </div>
                @endif

            </div>

            {{-- table --}}
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-900">
                                        ID
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-900">
                                        Name
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-900">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach ($categories as $category)
                                    <tr>

                                        <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900">
                                            {{ $category->id }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900">
                                            {{ $category->name }}
                                        </td>

                                        <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900">

                                            <button wire:click="edit({{ $category->id }})"
                                                class="rounded bg-indigo-700 px-4 py-2 font-bold text-white hover:bg-indigo-900">
                                                Update
                                            </button>

                                            <button wire:click="confirmDelete({{ $category->id }})"
                                                class="rounded bg-red-500 px-4 py-2 font-bold text-white hover:bg-red-700">
                                                Delete
                                            </button>

                                        </td>

                                    </tr>
                                @endforeach
                                <!-- More rows... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @if ($confirmingDelete)
        <div class="fixed inset-0 flex items-center justify-center bg-indigo-800 bg-opacity-80">
            <div class="rounded bg-indigo-800 p-6 shadow-md">
                <p class="text-lg">Are you sure, you want to delete {{ $categoryToDelete->name }}?</p>
                <div class="mt-4 flex justify-end space-x-4">
                    <button wire:click="destroy({{ $categoryToDelete->id }})"
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

    <!--div terakhir -->
</div>
