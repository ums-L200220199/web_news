@props(['sliderArticles'])

<header class="bg-white shadow mt-[64px] z-0 h-[400px] max-w-5xl mx-auto">
    <div class="relative w-full px-4 py-6 sm:px-6 lg:px-8 h-full">
        <!-- Slider -->
        <div id="home-slider" class="relative overflow-hidden h-full">
            <div 
                class="slider-container flex transition-transform duration-500 ease-in-out h-full" 
                style="width: {{ count($sliderArticles) > 1 ? '200%' : '100%' }};">
                @foreach ($sliderArticles->chunk(1) as $chunk)
                <div class="slide flex justify-between flex-shrink-0 w-full space-x-4 h-full">
                    @foreach ($chunk as $article)
                    <div class="relative border rounded-lg overflow-hidden w-1/2 h-full bg-gray-100 shadow-md transition-transform duration-300 hover:scale-105">
                        <a href="{{ route('articles.show', $article->id) }}">
                            <img 
                                src="{{ asset('storage/' . $article->image_url) }}" 
                                alt="{{ $article->title }}" 
                                class="w-full h-full object-contain">
                        </a>
                        <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 text-white p-2 text-sm w-full">
                            {{ $article->title }}
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
            <!-- navigasi -->
            <button 
                id="prev-slide" 
                class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-4 py-2 rounded-full">
                &#8249;
            </button>
            <button 
                id="next-slide" 
                class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-4 py-2 rounded-full">
                &#8250;
            </button>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const slider = document.querySelector('#home-slider .slider-container');
        const slides = document.querySelectorAll('#home-slider .slide');
        const prevButton = document.querySelector('#prev-slide');
        const nextButton = document.querySelector('#next-slide');

        let currentIndex = 0;
        const totalSlides = slides.length;

        const updateSliderPosition = () => {
            slider.style.transform = `translateX(-${currentIndex * 100}%)`;
        };

        nextButton.addEventListener('click', () => {
            currentIndex = Math.min(currentIndex + 1, totalSlides - 1);
            updateSliderPosition();
        });

        prevButton.addEventListener('click', () => {
            currentIndex = Math.max(currentIndex - 1, 0);
            updateSliderPosition();
        });
    });
</script>
