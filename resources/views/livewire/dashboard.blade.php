<div>

    <div class="w-full overflow-x-hidden bg-gray-200 px-6 py-6">
        <div class="container mx-auto bg-white p-6">
            <div class="flex min-h-screen flex-col justify-center bg-gray-100 py-6 sm:py-12">
                <div class="relative py-3 sm:mx-auto sm:max-w-xl">
                    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex flex-wrap">
                            <div class="w-full px-4 sm:px-6 md:px-8 lg:px-10 xl:px-12">
                                <div class="rounded-lg bg-white p-6 shadow-md">
                                    <!-- Tempatkan konten Anda di sini -->
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
                                    @setting('adsCode')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
