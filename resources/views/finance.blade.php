<x-layout :sliderArticles="$sliderArticles" title="Kategori Finance">
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-8">Kategori: Finance</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-10">
                @forelse ($articles as $article)
                <a href="{{ route('articles.show', $article->id) }}" class="group relative border rounded-lg p-4 transition-transform duration-300 hover:scale-105">
                    <div class="overflow-hidden">
                        <img src="{{ $article->image_url ? asset('storage/' . $article->image_url) : asset('images/default.jpeg') }}" 
                             alt="{{ $article->title }}" 
                             class="h-1/2 w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75">
                    </div>
                    <h3 class="mt-4 text-lg font-bold text-gray-700 group-hover:text-blue-500 transition-colors duration-300">
                        {{ $article->title }}
                    </h3>
                    <p class="mt-2 text-sm text-gray-500">
                        {{ Str::limit(strip_tags($article->content), 100) }}
                    </p>
                </a>
                @empty
                <p class="text-gray-500">Tidak ada artikel dalam kategori ini.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-layout>