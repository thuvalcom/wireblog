<div>
    <div class="mx-auto mt-8 max-w-md rounded-md bg-indigo-600 p-6 text-white shadow-md">
        <h2 class="mb-4 text-2xl font-semibold">Reset Password</h2>

        @if (session('status'))
            <div class="mb-4 rounded-md bg-green-500 p-3 text-white">{{ session('status') }}</div>
        @endif

        @if (session('error'))
            <div class="mb-4 rounded-md bg-red-500 p-3 text-white">{{ session('error') }}</div>
        @endif

        <form wire:submit.prevent="resetPassword">
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">Email:</label>
                <input type="email" wire:model="email" class="mt-1 w-full rounded-md border bg-indigo-500 p-2" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium">Password:</label>
                <input type="password" wire:model="password" class="mt-1 w-full rounded-md border bg-indigo-500 p-2"
                    required>
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium">Confirm Password:</label>
                <input type="password" wire:model="password_confirmation"
                    class="mt-1 w-full rounded-md border bg-indigo-500 p-2" required>
            </div>

            <button type="submit"
                class="rounded-md bg-red-500 px-4 py-2 text-white transition duration-300 hover:bg-red-700">Reset
                Password</button>
        </form>
    </div>
</div>
