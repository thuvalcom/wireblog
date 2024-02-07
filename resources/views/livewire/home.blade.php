@section('title')
    <title>@setting('metaTitle')</title>
    @push('meta')
        <meta name="description" content="@setting('metaDescription')">
        <meta name="keywords" content="@setting('metaKeywords')">
        <meta name="author" content="@setting('metaAuthor')">
    @endpush
@endsection
<div class="mt-10 px-10">
    <div class="max-w-screen-xl mx-auto grid lg:grid-cols-3 gap-8">
        <!-- Article Section -->
        <div class="lg:col-span-2 grid md:grid-cols-2 gap-8">
            @foreach ($posts as $post)
                <div class="overflow-hidden rounded-lg bg-white shadow-sm mb-8">
                    <div class="h-48 lg:h-64 bg-cover bg-center p-4"
                         style="background-image: url('{{ asset('storage/' . $post->image) }}')">
                        <div class="flex justify-end items-end h-full">
                            <span class="rounded-lg bg-white px-2 py-1 text-xs text-indigo-600">{{ $post->category->name }}</span>
                        </div>
                    </div>
                    <div class="p-4 lg:p-6">
                        <h2 class="text-xl lg:text-2xl xl:text-3xl font-bold text-gray-900 mb-2">{{ str($post->title)->words(8) }}</h2>
                        <p class="text-gray-700 mb-4">{{ str($post->content)->words(10) }}</p>
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-500">Posted by <span
                                    class="font-bold">{{ $post->user->name }}</span> •
                                {{ $post->created_at->diffForHumans() }}</p>
                            <a href="{{ route('post', $post->slug) }}"
                               class="rounded bg-indigo-600 px-3 py-1 text-xs font-bold uppercase text-white">Read
                                More</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <!-- Sidebar Section -->
        <div class="lg:col-span-1 sm:mx-auto">
            <div class="bg-white p-4">
                <p class="text-xl font-bold mb-4 text-slate-900">Sidebar Title</p>

                <!-- List Category -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-2 text-slate-900">Categories</h3>
                    <ul class="list-none pl-4 space-y-2">
                        <li class="flex items-center">
                            <span class="bg-indigo-600 text-slate-900 feather-icon p-2 rounded-full mr-2" data-feather="folder"></span>
                            <a href="#" class="text-slate-900 hover:underline">Category 1</a>
                        </li>
                        <li class="flex items-center">
                            <span class="bg-indigo-600 text-slate-900 feather-icon p-2 rounded-full mr-2" data-feather="folder"></span>
                            <a href="#" class="text-slate-900 hover:underline">Category 2</a>
                        </li>
                        <!-- Add more categories as needed -->
                    </ul>
                </div>

                <!-- Popular Articles -->
                <div>
                    <h3 class="text-lg font-semibold mb-2 text-slate-900">Popular Articles</h3>
                    <ul class="list-none pl-4 space-y-2">
                        <li class="flex items-center">
                            <span class="bg-indigo-600 text-slate-900 feather-icon p-2 rounded-full mr-2" data-feather="file-text"></span>
                            <a href="#" class="text-slate-900 hover:underline">Article 1</a>
                        </li>
                        <li class="flex items-center">
                            <span class="bg-indigo-600 text-slate-900 feather-icon p-2 rounded-full mr-2" data-feather="file-text"></span>
                            <a href="#" class="text-slate-900 hover:underline">Article 2</a>
                        </li>
                        <!-- Add more popular articles as needed -->
                    </ul>
                </div>
            </div>
        </div>


        <!-- Pagination -->
        <div class="lg:col-span-2 mt-8">
            <div class="flex justify-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
















</div>
