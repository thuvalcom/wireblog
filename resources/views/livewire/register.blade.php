<div>
    <div class="flex min-h-screen items-center justify-center bg-gray-50 px-4 py-12 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">

            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Register
                </h2>
                <form wire:submit="register" class="mt-8 space-y-6">
                    <input type="hidden" name="remember" value="true">
                    <div class="-space-y-px rounded-md shadow-sm">
                        <div class="mb-1">
                            <label for="name" class="sr-only">Full Name</label>
                            <input wire:model="name" id="name" name="name" type="text" autocomplete="name"
                                required
                                class="relative mb-1 block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                placeholder="Full Name">
                        </div>
                        <div>
                            <label for="email-address-register" class="sr-only">Email address</label>
                            <input wire:model="email" id="email" name="email" type="email" autocomplete="email"
                                required
                                class="relative mb-1 block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                placeholder="Email address">
                        </div>
                        <div>
                            <label for="password-register" class="sr-only">Password</label>
                            <input wire:model="password" id="password-register" name="password" type="password"
                                autocomplete="current-password" required
                                class="relative mb-1 block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                placeholder="Password">
                        </div>
                        <div class="mt-1">
                            <label for="password-confirm" class="sr-only">Confirm Password</label>
                            <input wire:model="password_confirmation" id="password-confirm" name="password-confirm"
                                type="password" autocomplete="current-password" required
                                class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                placeholder="Confirm Password">
                        </div>
                    </div>
                    <div>
                        <button type="submit"
                            class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
