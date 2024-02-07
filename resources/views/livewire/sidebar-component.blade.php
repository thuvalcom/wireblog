<div>
    <div id="sidebar" class="absolute hidden h-full w-64 flex-col bg-indigo-800 shadow sm:relative sm:flex">
        <div class="px-8">
            <h1 class="mb-2 mt-3 text-2xl font-bold text-white">Dashboard</h1>
            <ul class="mb-8 text-sm">
                <li class="flex items-center py-1 text-gray-300 hover:text-white">
                    <i data-feather="home" class="mr-2 h-4 w-4"></i> <a wire:navigate href="{{ route('dashboard') }}"
                        @class(['current' => request()->is('dashboard')])>Dashboard</a>
                </li>
                <li class="flex items-center py-1 text-gray-300 hover:text-white">
                    <i data-feather="file-text" class="mr-2 h-4 w-4"></i> <a wire:navigate href="{{ route('posts') }}"
                        @class(['current' => request()->is('posts')])>Posts</a>
                </li>
                <li class="flex items-center py-1 text-gray-300 hover:text-white">
                    <i data-feather="tag" class="mr-2 h-4 w-4"></i> <a wire:navigate href="{{ route('categories') }}"
                        @class(['current' => request()->is('categories')])>Categories</a>
                </li>
                <li class="flex items-center py-1 text-gray-300 hover:text-white">
                    <i data-feather="user" class="mr-2 h-4 w-4"></i> <a wire:navigate href="{{ route('profile') }}"
                        @class(['current' => request()->is('profile')])>Profile</a>
                </li>
                <li class="flex items-center py-1 text-gray-300 hover:text-white">
                    <i data-feather="settings" class="mr-2 h-4 w-4"></i> <a wire:navigate href="{{ route('settings') }}"
                        @class(['current' => request()->is('settings')])>Settings</a>
                </li>

            </ul>
        </div>
    </div>
</div>
