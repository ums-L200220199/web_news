<x-layout>
    <body class="bg-gray-100">
        <div class="container mx-auto px-4 py-8 mt-16">
            <h1 class="text-3xl font-bold mb-8 text-gray-700">Admin: Manage Articles</h1>
    
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Form Add/Edit Article -->
                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                    <h2 id="form-title" class="text-lg font-semibold mb-4 text-gray-700">Add New Article</h2>
                    <form id="article-form" action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <input type="hidden" name="_method" id="_method" value="POST">
                        <input type="hidden" name="article_id" id="article_id">
    
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="title" required
                                class="w-full mt-1 border border-gray-300 rounded-md px-4 py-2 focus:ring-green-500 focus:border-green-500 shadow-sm sm:text-sm">
                        </div>
                        <div>
                            <label for="kategori" class="block text-sm font-medium text-gray-700">Category</label>
                            <select name="kategori" id="kategori" required
                                class="w-full mt-1 border border-gray-300 rounded-md px-4 py-2 focus:ring-green-500 focus:border-green-500 shadow-sm sm:text-sm">
                                <option value="sport">Sport</option>
                                <option value="finance">Finance</option>
                            </select>
                        </div>
                        <div>
                            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                            <textarea name="content" id="content" rows="4" required
                                class="w-full mt-1 border border-gray-300 rounded-md px-4 py-2 focus:ring-green-500 focus:border-green-500 shadow-sm sm:text-sm"></textarea>
                        </div>
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                            <input type="file" name="image" id="image"
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-600 hover:file:bg-green-100">
                            <div id="current-image" class="mt-4"></div>
                        </div>
                        <button type="submit"
                            class="bg-green-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-green-600 w-full font-semibold">
                            Submit
                        </button>
                    </form>
                </div>
    
                <!-- Uploaded Articles -->
                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                    <h2 class="text-lg font-semibold mb-4 text-gray-700">Uploaded Articles</h2>
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 border-b">#</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 border-b">Title</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 border-b">Category</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 border-b">Image</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($articles as $index => $article)
                            <tr>
                                <td class="px-4 py-3 text-sm text-gray-500">{{ $index + 1 }}</td>
                                <td class="px-4 py-3 text-sm text-gray-700">{{ $article->title }}</td>
                                <td class="px-4 py-3 text-sm text-gray-700">{{ $article->kategori }}</td>
                                <td class="px-4 py-3">
                                    @if ($article->image_url)
                                    <img src="{{ asset('storage/' . $article->image_url) }}" alt="{{ $article->title }}"
                                        class="h-12 w-12 object-cover rounded-md">
                                    @else
                                    <span class="text-sm text-gray-400">No Image</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 flex items-center space-x-2">
                                    <button type="button" onclick="populateEditForm({{ $article }})"
                                        class="bg-yellow-500 text-white px-3 py-2 rounded-md hover:bg-yellow-600 text-sm font-medium">
                                        Edit
                                    </button>
                                    <form action="{{ route('admin.articles.destroy', $article) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white px-3 py-2 rounded-md hover:bg-red-600 text-sm font-medium">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
        <script>
            function populateEditForm(article) {
                document.getElementById('form-title').textContent = 'Edit Article';
                document.getElementById('article-form').action = `/admin/articles/${article.id}`;
                document.getElementById('_method').value = 'PATCH';
                document.getElementById('article_id').value = article.id;
                document.getElementById('title').value = article.title;
                document.getElementById('kategori').value = article.kategori;
                document.getElementById('content').value = article.content;
    
                const currentImageDiv = document.getElementById('current-image');
                if (article.image_url) {
                    currentImageDiv.innerHTML = `
                        <img src="/storage/${article.image_url}" alt="${article.title}" class="h-24 w-24 object-cover rounded-md">
                        <p class="text-gray-600 text-sm mt-2">Current Image</p>
                    `;
                } else {
                    currentImageDiv.innerHTML = `<p class="text-gray-600 text-sm">No image uploaded</p>`;
                }
            }
        </script>
    </body>
    
</x-layout>