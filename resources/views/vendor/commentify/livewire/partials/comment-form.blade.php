<form class="mb-6" wire:submit="{{ $method }}">
    @if (session()->has('message'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
            <div class="mb-4 rounded-lg bg-green-50 p-4 text-sm text-green-800 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">Success!</span> {{ session('message') }}
            </div>
        </div>
    @endif
    @csrf
    <div class="mb-4 rounded-lg rounded-t-lg border border-indigo-800 bg-indigo-100 px-4 py-2">
        <label for="{{ $inputId }}" class="sr-only">{{ $inputLabel }}</label>
        <textarea id="{{ $inputId }}" rows="6"
            class="@error($state . '.body')
                              border-red-500 @enderror w-full border-0 px-0 text-sm text-gray-900 focus:outline-none focus:ring-0"
            placeholder="Write a comment..." wire:model.live="{{ $state }}.body" oninput="detectAtSymbol()"></textarea>
        @if (!empty($users) && $users->count() > 0)
            @include('commentify::livewire.partials.dropdowns.users')
        @endif
        @error($state . '.body')
            <p class="mt-2 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror
    </div>

    <button wire:loading.attr="disabled" type="submit"
        class="inline-flex items-center rounded-lg bg-indigo-700 px-4 py-2.5 text-center text-xs font-medium text-white hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-800">
        <div wire:loading wire:target="{{ $method }}">
            @include('commentify::livewire.partials.loader')
        </div>
        {{ $button }}
    </button>

</form>
