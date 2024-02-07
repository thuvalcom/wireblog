<div>
    <div class="w-full overflow-x-hidden bg-indigo-300 px-6 py-6">
        {{--    main area --}}
        <div class="container h-screen w-full bg-indigo-400 p-6 sm:w-full md:w-full">
            <div class="mt-8 max-w-md rounded-md bg-indigo-500 p-6 text-white shadow-md">
                <h2 class="mb-4 text-2xl font-semibold">Blog Settings</h2>

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

                <form wire:submit="save">
                    <div class="mb-4">
                        <label for="metaTitle" class="block text-sm font-medium">Meta Title:</label>
                        <input type="text" wire:model="metaTitle"
                            class="mt-1 w-full rounded-md border bg-indigo-500 p-2" required>
                    </div>

                    <div class="mb-4">
                        <label for="metaDescription" class="block text-sm font-medium">Meta Description:</label>
                        <input type="text" wire:model="metaDescription"
                            class="mt-1 w-full rounded-md border bg-indigo-500 p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="metaKeywords" class="block text-sm font-medium">Meta Keywords:</label>
                        <input type="text" wire:model="metaKeywords"
                            class="mt-1 w-full rounded-md border bg-indigo-500 p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="metaAuthor" class="block text-sm font-medium">Meta Author:</label>
                        <input type="text" wire:model="metaAuthor"
                            class="mt-1 w-full rounded-md border bg-indigo-500 p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="metaRobots" class="block text-sm font-medium">Meta Robots:</label>
                        <input type="text" wire:model="metaRobots"
                            class="mt-1 w-full rounded-md border bg-indigo-500 p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="metaGoogleSiteVerification" class="block text-sm font-medium">Google Site
                            Verification:</label>
                        <input type="text" wire:model="metaGoogleSiteVerification"
                            class="mt-1 w-full rounded-md border bg-indigo-500 p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="adsCode" class="block text-sm font-medium">Ads Code:</label>
                        <input type="text" wire:model="adsCode"
                            class="mt-1 w-full rounded-md border bg-indigo-500 p-2" required>
                    </div>
                    <button type="submit"
                        class="rounded-md bg-red-500 px-4 py-2 text-white transition duration-300 hover:bg-red-700">Update
                        Settings</button>
                </form>
            </div>
        </div>
    </div>
</div>
