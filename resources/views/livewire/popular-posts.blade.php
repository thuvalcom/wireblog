<div>

    <ul class="list-none space-y-2 pl-4">
        @foreach ($posts as $post)
            <li class="hover:bg-gray-indigo-600 flex items-center transition-colors duration-200 hover:text-white">
                <span class="feather-icon mr-2 rounded-full bg-indigo-600 p-2 text-slate-900"></span>
                <a wire:navigate href="{{ route('post', $post->slug) }}" class="text-slate-900">{{ $post->title }}</a>
                <span class="ml-2 text-sm text-gray-500">Views: {{ $post->views }}</span>
            </li>
        @endforeach
    </ul>
</div>
