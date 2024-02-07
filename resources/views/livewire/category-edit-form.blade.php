<div>
    <!-- update -->
    <div id="formContainer" class="mt-4 sm:w-full md:w-full">
        <form class="mb-4 rounded bg-gray-200 px-8 pb-8 pt-6 shadow-md" wire:submit="update">

            <div class="mb-4">
                <label class="mb-2 block text-sm font-bold text-gray-700" for="name">
                    Category Name
                </label>

                <input
                    class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
                    id="inputOne" name="name" type="text" placeholder="Input for category name" wire:model="name">
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
                    Update
                </button>
            </div>
        </form>
    </div>

    <!-- update -->

</div>
