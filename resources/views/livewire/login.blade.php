<div>

    <div class="flex min-h-screen items-center justify-center bg-gray-50 px-4 py-12 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Login
                </h2>
                <form wire:submit="login" class="mt-8 space-y-6">
                    <input type="hidden" name="remember" value="true">
                    <div class="-space-y-px rounded-md shadow-sm">
                        <div class="mb-1">
                            <label for="email-address" class="sr-only">Email address</label>
                            <input wire:model="email" id="email-address" name="email" type="email"
                                autocomplete="email" required
                                class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                placeholder="Email address">
                        </div>
                        <div class="mb-1">
                            <label for="password" class="sr-only">Password</label>
                            <input wire:model="password" id="password" name="password" type="password"
                                autocomplete="current-password" required
                                class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                placeholder="Password">
                        </div>
                    </div>
                    <div>
                        <button type="submit"
                            class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Sign in
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
