@section('title')
    <title>@setting('metaTitle')</title>
    @push('meta')
        <meta name="description" content="@setting('metaDescription')">
        <meta name="keywords" content="@setting('metaKeywords')">
        <meta name="author" content="@setting('metaAuthor')">
    @endpush
@endsection
<div class="mt-10 px-10">
    <div class="mx-auto grid max-w-screen-xl gap-8 lg:grid-cols-3">
        <!-- Article Section -->
        <div class="grid gap-8 md:grid-cols-2 lg:col-span-2">
            @foreach ($posts as $post)
                <div class="mb-8 overflow-hidden rounded-lg bg-white shadow-md">
                    <div class="relative h-56 overflow-hidden">
                        <div class="absolute inset-0 bg-cover bg-center"
                            style="background-image: url('{{ asset('storage/' . $post->image) }}')"></div>

                        <!-- Overlay for Text -->
                        <div class="absolute inset-0 bg-black opacity-50 hover:opacity-0"></div>

                        <!-- Category Badge -->
                        <div class="absolute right-4 top-4">
                            <span
                                class="inline-block rounded bg-indigo-600 px-2 py-1 text-xs font-semibold uppercase text-white">{{ $post->category->name }}</span>
                        </div>
                    </div>
                    <div class="p-4 lg:p-6">
                        <h2 class="mb-2 text-xl font-bold text-gray-900 hover:text-indigo-800 lg:text-2xl xl:text-3xl">
                            <a wire:navigate href="{{ route('post', $post->slug) }}">
                                {{ str($post->title)->words(8) }}</a>
                        </h2>

                        <div class="flex items-center justify-between">
                            <p class="rounded-sm bg-indigo-500 px-2 py-0 text-sm text-white">Posted by <span
                                    class="font-bold">{{ $post->user->name }}</span> •
                                {{ $post->created_at->diffForHumans() }}</p>
                            <a wire:navigate href="{{ route('post', $post->slug) }}"
                                class="rounded bg-indigo-600 px-3 py-1 text-xs font-bold uppercase text-white">Read
                                More</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <!-- Sidebar Section -->
        <div class="sm:mx-auto lg:col-span-1">
            <div class="bg-white p-4">
                <!-- List Category -->
                <div class="mb-6">
                    <h3
                        class="mx-w-xs mb-2 bg-indigo-600 px-4 py-2 text-lg font-semibold text-white hover:transition-opacity">
                        Categories</h3>
                    <ul class="list-none space-y-2 pl-1">
                        @foreach ($categories as $category)
                            <li class="flex items-center">
                                <span class="feather-icon mr-2 rounded-full bg-indigo-600 p-2 text-slate-900"
                                    data-feather="folder"></span>
                                <a wire:navigate href="{{ route('category', $category->slug) }}"
                                    class="text-slate-900 hover:animate-none hover:bg-indigo-600 hover:px-4 hover:py-1 hover:text-white">{{ $category->name }}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>

                <!-- Popular Articles -->
                <div>
                    <h3
                        class="mx-w-xs mb-2 bg-indigo-600 px-4 py-2 text-lg font-semibold text-white hover:transition-opacity">
                        Popular Articles</h3>
                    <ul class="list-none space-y-2 pl-4">
                        <li class="flex items-center">
                            <span class="feather-icon mr-2 rounded-full bg-indigo-600 p-2 text-slate-900"
                                data-feather="file-text"></span>
                            <a href="#"
                                class="text-slate-900 hover:animate-none hover:bg-indigo-600 hover:px-4 hover:py-1 hover:text-white">Article
                                1</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-8 lg:col-span-2">
            {{ $posts->links() }}
        </div>
    </div>

</div>
