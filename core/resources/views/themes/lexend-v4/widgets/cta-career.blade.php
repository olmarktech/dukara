@php
    // CTA Career section - EXACT from page-about.html line 1156-1186
    $title = $data['title'] ?? "We're looking for people who share our vision!";
    $subtitle = $data['subtitle'] ?? 'Have what it takes to be one of us.';
    $button_text = $data['button_text'] ?? 'View current openings';
    $button_url = $data['button_url'] ?? '#';
@endphp

<!-- Section start -->
<div id="cta" class="cta section panel overflow-hidden" data-anime="onview:-100; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: 200;">
    <div class="section-outer panel py-4 sm:py-6 xl:py-9 bg-secondary dark:bg-gray-800">
        <div class="d-none lg:d-block" data-anime="onview: -100; targets: img; scale: [0.8, 1]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: 350;">
            <div class="position-absolute top-50 start-0 translate-middle-y ms-n6">
                <img class="w-200px xl:w-250px d-block dark:d-none" src="{{ asset('themes/lexend-v4/assets/images/template/thinking.svg') }}" alt="thinking">
                <img class="w-200px xl:w-250px d-none dark:d-block" src="{{ asset('themes/lexend-v4/assets/images/template/thinking-dark.svg') }}" alt="thinking-dark">
            </div>
            <div class="position-absolute top-50 end-0 translate-middle-y me-n6">
                <img class="w-200px xl:w-250px d-block dark:d-none" src="{{ asset('themes/lexend-v4/assets/images/template/send-message.svg') }}" alt="send-message">
                <img class="w-200px xl:w-250px d-none dark:d-block" src="{{ asset('themes/lexend-v4/assets/images/template/send-message-dark.svg') }}" alt="send-message-dark">
            </div>
        </div>
        <div class="d-none lg:d-block" data-anime="targets: >*; scale: [0, 1]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 750});">
            <div class="position-absolute bottom-0 start-0 rotate-45" style="bottom: 30% !important; left: 24% !important;">
                <img class="w-24px text-gray-900 dark:text-white" src="{{ asset('themes/lexend-v4/assets/images/template/star-2.svg') }}" alt="star-2" data-uc-svg>
            </div>
            <div class="position-absolute top-0 end-0 rotate-45" style="top: 50% !important; right: 21% !important;">
                <img class="w-32px text-gray-900 dark:text-white" src="{{ asset('themes/lexend-v4/assets/images/template/star-1.svg') }}" alt="star-1" data-uc-svg>
            </div>
        </div>
        <div class="container max-w-xl">
            <div class="section-inner panel">
                <div class="vstack items-center gap-2 sm:gap-3 max-w-550px mx-auto text-center" data-anime="onview:-100; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 200});">
                    <h2 class="h3 sm:h1 m-0">{{ $title }}</h2>
                    @if($subtitle)
                        <p class="fs-5 xl:fs-4 text-dark dark:text-white text-opacity-70">{{ $subtitle }}</p>
                    @endif
                    @if($button_text)
                        <a href="{{ $button_url }}" class="btn btn-md lg:btn-lg btn-primary text-white mt-1 xl:mt-2">{{ $button_text }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->

