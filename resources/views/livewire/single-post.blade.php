@section('title')
    <title>{{ $post->title }}</title>
    @push('meta')
        <meta name="description" content="{{ $post->description }}">
        <meta name="keywords" content="{{ $post->tags }}">
        <meta name="author" content="{{ $post->user->name }}">
    @endpush
@endsection
<div>

    <div class="mt-10 grid grid-cols-4 gap-8 px-10 md:grid-cols-12">
        <!-- Single Post -->
        <div class="col-span-3 overflow-hidden rounded-lg bg-white shadow-lg md:col-span-9">
            <div class="h-56 bg-cover bg-center p-4"
                style="background-image: url('{{ asset('storage/' . $post->image) }}')">
                <div class="flex justify-between">
                    <span
                        class="rounded-lg bg-white px-2 py-1 text-xs text-indigo-600">{{ $post->category->name }}</span>
                </div>
            </div>
            <div class="p-4">
                <p class="text-3xl text-gray-900">{{ $post->title }}</p>
                <p class="mt-2 text-gray-700">{!! nl2br(e($post->content)) !!}</p>
            </div>
            <div class="border-t border-gray-300 p-4 text-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Posted by <span
                                class="font-bold">{{ $post->user->name }}</span> •
                            {{ $post->created_at->diffForHumans() }}</p>
                    </div>
                    <div>
                        <a href="#"
                            class="rounded bg-indigo-600 px-3 py-1 text-xs font-bold uppercase text-white">{{ $post->category->name }}</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar -->
        <div class="col-span-1 overflow-hidden rounded-lg bg-white px-5 py-5 shadow-lg md:col-span-3">
            @include('home.sidebar')
        </div>

    </div>

</div>
