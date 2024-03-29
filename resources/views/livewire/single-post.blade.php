@section('title')
    <title>{{ $post->title }}</title>
    @push('meta')
        <meta name="description" content="{{ $post->description }}">
        <meta name="keywords" content="{{ $post->tags }}">
        <meta name="author" content="{{ $post->user->name }}">
    @endpush
@endsection
<div>

    <div class="flex flex-col gap-8 p-8 md:flex-row md:p-16">
        <!-- Single Post -->
        <div class="w-full bg-white p-8 shadow-md md:w-2/3">
            <div class="flex rounded-lg">
                <img src="{{ asset('storage/' . $post->image) }}" class="object-contain object-center">
            </div>

            <div class="p-4">
                <p class="text-3xl text-gray-900">{{ $post->title }}</p>
                <p class="mt-2 text-base font-normal text-slate-900">{!! nl2br(e($post->content)) !!}</p>
            </div>
            <div class="border-t border-gray-300 p-4 text-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Posted by <span
                                class="font-bold">{{ $post->user->name }}</span> •
                            {{ $post->created_at->diffForHumans() }}</p>
                    </div>
                    <div>
                        <span class="rounded bg-indigo-600 px-3 py-1 text-xs font-bold uppercase text-white">
                            {{ $post->category->name }}
                        </span>
                    </div>
                </div>
            </div>
            <livewire:comments :model="$post" />
        </div>
        <!-- Sidebar -->
        <div class="w-full md:w-1/3">
            <div class="rounded-lg bg-white px-4 py-4 shadow-lg">
                <h2 class="mb-2 rounded bg-indigo-600 p-2 text-2xl font-bold uppercase tracking-wider text-white">
                    Kategori
                </h2>
                <div class="mt-2 space-y-1">
                    @foreach ($categories as $category)
                        <span
                            class="mb-2 mr-2 inline-block rounded-full bg-indigo-200 px-3 py-1 text-sm font-semibold text-indigo-700 transition-colors duration-200 hover:bg-indigo-300 hover:text-indigo-800">
                            <a wire:navigate href="{{ route('category', $category->slug) }}">{{ $category->name }}</a>
                        </span>
                    @endforeach
                </div>
            </div>
            <div class="rounded-lg bg-white px-4 py-4 shadow-lg">
                <h2 class="mb-2 rounded bg-indigo-600 p-2 text-2xl font-bold uppercase tracking-wider text-white">
                    Popular Post
                </h2>
                @livewire('popular-posts')
            </div>
        </div>

    </div>

</div>
