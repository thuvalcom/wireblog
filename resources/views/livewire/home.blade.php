@section('title')
    <title>@setting('metaTitle')</title>
    @push('meta')
        <meta name="description" content="@setting('metaDescription')">
        <meta name="keywords" content="@setting('metaKeywords')">
        <meta name="author" content="@setting('metaAuthor')">
    @endpush
@endsection
<div class="mt-10 px-10">
    <div class="lg:grid-cols- grid grid-cols-1 gap-8 md:grid-cols-3">
        <!-- Card 1 -->
        @foreach ($posts as $post)
            <div class="overflow-hidden rounded-lg bg-white shadow-lg">

                <div class="h-56 bg-cover bg-center p-4"
                    style="background-image: url('{{ asset('storage/' . $post->image) }}')">
                    <div class="flex justify-between">
                        <span
                            class="rounded-lg bg-white px-2 py-1 text-xs text-indigo-600">{{ $post->category->name }}</span>
                    </div>
                </div>
                <div class="p-4">
                    <p class="text-3xl text-gray-900">{{ str($post->title)->words(5) }}</p>
                    <p class="mt-2 text-gray-700">{{ str($post->content)->words(8) }}</p>
                </div>
                <div class="border-t border-gray-300 p-4 text-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Posted by <span
                                    class="font-bold">{{ $post->user->name }}</span> •
                                {{ $post->created_at->diffForHumans() }}</p>
                        </div>
                        <div>
                            <a href="{{ route('post', $post->slug) }}"
                                class="rounded bg-indigo-600 px-3 py-1 text-xs font-bold uppercase text-white">Read
                                More</a>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach

    </div>
    <div class="mx-auto mt-10 justify-items-center rounded-lg bg-white px-4 py-4 shadow-lg">
        {{ $posts->links() }}
    </div>
    @include('home.widget')

</div>
