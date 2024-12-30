@props(['sliderArticles'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Home</title>
</head>
<body>
  <x-navbar></x-navbar>
    @if(request()->routeIs('admin.articles.index'))
    @elseif (request()->routeIs('articles.show'))
    @elseif(request()->routeIs('about'))
      <x-header>{{ $title }}</x-header>
    @else
      <x-slidehead :sliderArticles="$sliderArticles"/>
    @endif
  <main>
    <div>
        {{ $slot }}
    </div>
  </main>
  
</body>
</html>
