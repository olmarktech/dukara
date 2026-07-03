@php
    // Blog Header - EXACT from blog.html line 726-740
    $title = $data['title'] ?? 'Insights';
@endphp

<!-- Section start -->
<div class="section panel overflow-hidden">
    <div class="section-outer panel py-6 lg:py-9">
        <div class="position-absolute top-0 start-0 end-0 min-h-screen overflow-hidden d-none lg:d-block" data-anime="targets: >*; scale: [0, 1]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 100});">
            <div class="position-absolute top-0 start-0 rotate-45" style="top: 16% !important; left: 18% !important;">
                <img class="w-32px text-gray-900 dark:text-white" src="{{ asset('themes/lexend-v4/assets/images/template/star-1.svg') }}" alt="star-1" data-uc-svg>
            </div>
            <div class="position-absolute top-0 end-0 rotate-45" style="top: 5% !important; right: 18% !important;">
                <img class="w-24px text-gray-900 dark:text-white" src="{{ asset('themes/lexend-v4/assets/images/template/star-2.svg') }}" alt="star-2" data-uc-svg>
            </div>
        </div>
        <div class="container max-w-xl">
            <div class="section-inner panel vstack gap-3 sm:gap-6 lg:gap-9" data-anime="targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100);">
                <header class="page-header vstack justify-center items-center gap-2 md:gap-4 text-center max-w-650px mx-auto">
                    <h1 class="h2 sm:h1 lg:display-6 xl:display-5 m-0">{{ $title }}</h1>
                </header>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->

