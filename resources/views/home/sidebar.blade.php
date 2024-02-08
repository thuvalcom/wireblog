<div class="rounded-lg bg-white px-4 py-4 shadow-lg">
    <h2 class="mb-2 rounded bg-indigo-600 p-2 text-2xl font-bold uppercase tracking-wider text-white">Kategori
    </h2>
    <div class="mt-2 space-y-1">
        @foreach ($categories as $category)
            <span
                class="mb-2 mr-2 inline-block rounded-full bg-indigo-200 px-3 py-1 text-sm font-semibold text-indigo-700 transition-colors duration-200 hover:bg-indigo-300 hover:text-indigo-800">{{ $category->name }}</span>
        @endforeach

        <!-- Tambahkan lebih banyak kategori jika perlu -->
    </div>
</div>
