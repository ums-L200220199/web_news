<x-layout>
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8 text-center">
            <!-- Artikel Detail -->
            <div class="prose mx-auto">
                <h1 class="text-4xl font-extrabold text-gray-800 mb-8">{{ $article->title }}</h1>
                <img src="{{ asset('storage/' . $article->image_url) }}" alt="{{ $article->title }}" 
                     class="rounded-lg mb-6 mx-auto max-w-full h-auto max-h-96 object-cover">
                <p class="text-sm text-gray-500 mb-6">{{ $article->created_at->format('F d, Y') }}</p>
                <div class="mt-6 text-gray-700 text-left" style="text-align: justify;">
                    {!! nl2br(e($article->content)) !!}
                </div>
            </div>
            <!-- Form Komentar -->
            <div class="mt-12">
                <h2 class="text-2xl font-bold mb-6 text-left">Tambahkan Komentar</h2>
                @auth
                    <form action="{{ route('comments.store', $article->id) }}" method="POST">
                        @csrf
                        <textarea name="content" class="w-full p-3 border rounded-lg" rows="4" placeholder="Write your comment here..." required></textarea>
                        <button type="submit" class="mt-3 px-6 py-2 bg-blue-500 text-white rounded-lg">Submit</button>
                    </form>
                @else
                    <p class="text-gray-600">Please <a href="{{ route('login') }}" class="text-blue-500">login</a> to comment.</p>
                @endauth

                <!-- Pesan Sukses -->
                @if (session('success'))
                    <p class="text-green-500 mt-3">{{ session('success') }}</p>
                @endif
            </div>

            <!-- Komentar -->
            <div class="mt-12">
                <h2 class="text-2xl font-bold mb-6">Komentar</h2>

                <!-- Daftar Komentar -->
                @forelse ($article->comments as $comment)
                    <div class="bg-gray-100 rounded-lg p-4 mb-4 text-left">
                        <p class="text-sm text-gray-500 mb-1">{{ $comment->user_email }} - {{ $comment->created_at->format('F d, Y H:i') }}</p>
                        <p class="text-gray-700">{{ $comment->content }}</p>
                    </div>
                @empty
                    <p class="text-gray-600">No comments yet. Be the first to comment!</p>
                @endforelse
            </div>

        </div>
    </div>    
</x-layout>
