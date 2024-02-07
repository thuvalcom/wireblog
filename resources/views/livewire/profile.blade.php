<div>

    <div class="w-full overflow-x-hidden bg-gray-200 px-6 py-6">
        {{--    main area --}}
        <div class="container h-screen w-full bg-indigo-800 p-6 sm:w-full md:w-full">
            {{-- <div class="container grid h-screen w-full grid-cols-2 bg-white p-6 sm:w-full md:w-full"> --}}
            <div class="mt-6 w-1/2">

                <div class="mb-2 mt-2">
                </div>
                <div class="mx-auto mt-8 max-w-md rounded-md bg-indigo-600 p-6 text-white shadow-md">
                    <h2 class="mb-4 bg-indigo-600 py-4 text-center text-white">Welcome {{ $user->name }}</h2>
                    <h3 class="mb-4 text-2xl font-semibold">Profile</h3>

                    <div class="mb-4">
                        <p class="text-lg">Name: {{ $user->name }}</p>
                        <p class="text-lg">Email: {{ $user->email }}</p>
                        <!-- Informasi profil lainnya -->
                    </div>

                    <!-- Tombol Logout -->
                    <form wire:submit.prevent="logout">

                        <button type="submit"
                            class="rounded-md bg-red-500 px-4 py-2 text-white hover:bg-red-600">Logout</button>
                    </form>

                </div>

                @include('livewire.reset-password')
            </div>
            {{-- kolom kedua --}}

        </div>
    </div>
</div>
