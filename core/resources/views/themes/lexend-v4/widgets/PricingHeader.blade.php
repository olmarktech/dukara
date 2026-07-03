@php
    // Pricing Header - EXACT from page-pricing.html line 726-745
    $title = $data['title'] ?? 'Simple, scalable pricing.';
    $subtitle = $data['subtitle'] ?? 'No extra charges. No hidden fees.';
    $monthly_text = $data['monthly_text'] ?? 'Monthly';
    $yearly_text = $data['yearly_text'] ?? 'Yearly';
@endphp

<!-- Section start -->
<div id="hero_header" class="hero-header section panel overflow-hidden">
    <div class="position-absolute top-0 start-0 end-0 min-h-screen overflow-hidden d-none lg:d-block" data-anime="targets: >*; scale: [0, 1]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 750});">
        <div class="position-absolute top-0 start-0 rotate-45" style="top: 30% !important; left: 18% !important;">
            <img class="w-32px text-gray-900 dark:text-white" src="{{ asset('themes/lexend-v4/assets/images/template/star-1.svg') }}" alt="star-1" data-uc-svg>
        </div>
        <div class="position-absolute top-0 end-0 rotate-45" style="top: 15% !important; right: 18% !important;">
            <img class="w-24px text-gray-900 dark:text-white" src="{{ asset('themes/lexend-v4/assets/images/template/star-2.svg') }}" alt="star-2" data-uc-svg>
        </div>
    </div>
    <div class="section-outer panel pt-9 lg:pt-10 pb-2 sm:pb-3 lg:pb-4">
        <div class="container max-w-xl">
            <div class="section-inner panel mt-2 sm:mt-4 lg:mt-0">
                <div class="vstack items-center gap-3 lg:gap-4 mb-2 sm:mb-3 lg:mb-4 max-w-750px mx-auto text-center" data-anime="targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 200});">
                    <h1 class="h2 sm:h1 lg:display-6 xl:display-5 m-0">{{ $title }}</h1>
                    @if($subtitle)
                        <p class="fs-6 xl:fs-5 text-dark dark:text-white text-opacity-70">{{ $subtitle }}</p>
                    @endif
                    <ul class="uc-switcher-nav nav-x gap-0 p-narrow border rounded-2 fs-7 fw-medium" data-uc-switcher="connect: .pricing-switcher;">
                        <li><a href="#" class="text-none w-128px cstack p-1">{{ $monthly_text }}</a></li>
                        <li><a href="#" class="text-none w-128px cstack p-1">{{ $yearly_text }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->

