@php
    // CTA Widget - EXACT from index.html line 1634-1668
    $title = $data['title'] ?? 'Prevent costly mistakes';
    $subtitle = $data['subtitle'] ?? 'Create pre-approved templates and lock all legal information.';
    $button_text = $data['button_text'] ?? 'Try it now';
    $button_url = $data['button_url'] ?? 'page-pricing.html';
    $button_subtext = $data['button_subtext'] ?? '14-day trial, no credit card required.';
@endphp

<!-- Section start -->
<div id="cta" class="cta section panel overflow-hidden">
    <div class="section-outer panel" data-anime="onview: -100; translateY: [24, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: 200;">
        <div class="container max-w-xl">
            <div class="section-inner panel overflow-hidden rounded xl:rounded-2 px-2 sm:px-0 py-4 sm:py-6 xl:py-9 bg-secondary dark:bg-gray-800">
                <div class="d-none lg:d-block" data-anime="targets: >*; scale: [0, 1]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 750});">
                    <div class="position-absolute top-0 start-0 rotate-45" style="top: 40% !important; left: 20% !important;">
                        <img class="w-24px text-gray-900 dark:text-white" src="{{ asset('themes/lexend-v4/assets/images/template/star-1.svg') }}" alt="star-1" data-uc-svg>
                    </div>
                    <div class="position-absolute bottom-0 ltr:end-0 rtl:start-0 rotate-45" style="bottom: 40% !important; right: 20% !important;">
                        <img class="w-24px text-gray-900 dark:text-white" src="{{ asset('themes/lexend-v4/assets/images/template/star-2.svg') }}" alt="star-2" data-uc-svg>
                    </div>
                </div>
                <div class="d-none lg:d-block" data-anime="onview: -100; targets: img; scale: [0.8, 1]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: 350;">
                    <div class="position-absolute top-50 start-0 translate-middle-y ms-n6">
                        <img class="w-200px xl:w-250px d-block dark:d-none" src="{{ asset('themes/lexend-v4/assets/images/template/talking.svg') }}" alt="talking">
                        <img class="w-200px xl:w-250px d-none dark:d-block" src="{{ asset('themes/lexend-v4/assets/images/template/talking-dark.svg') }}" alt="talking-dark">
                    </div>
                    <div class="position-absolute top-50 end-0 translate-middle-y me-n6">
                        <img class="w-200px xl:w-250px d-block dark:d-none" src="{{ asset('themes/lexend-v4/assets/images/template/chatting.svg') }}" alt="chatting">
                        <img class="w-200px xl:w-250px d-none dark:d-block" src="{{ asset('themes/lexend-v4/assets/images/template/chatting-dark.svg') }}" alt="chatting-dark">
                    </div>
                </div>
                <div class="vstack items-center gap-2 max-w-400px lg:max-w-600px mx-auto text-center" data-anime="onview:-100; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 200});">
                    <h2 class="h3 sm:h1 xl:display-6 m-0">{{ $title }}</h2>
                    <p class="fs-6 sm:fs-5 text-dark dark:text-white text-opacity-70">{{ $subtitle }}</p>
                    <a href="{{ $button_url }}" class="btn btn-md h-48px lg:h-56px min-w-150px btn-primary text-white mt-2">
                        <span>{{ $button_text }}</span>
                        <i class="icon icon-1 unicon-arrow-up-right"></i>
                    </a>
                    <p class="fs-7 text-dark dark:text-white text-opacity-70">{{ $button_subtext }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->

