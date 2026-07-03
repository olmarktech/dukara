@php
    // About Hero Header - EXACT from page-about.html line 726-768
    $title = $data['title'] ?? 'About Lexend.';
    $description = $data['description'] ?? '';
    $left_image = $data['left_image'] ?? '';
    $right_image = $data['right_image'] ?? '';
@endphp

<!-- Section start -->
<div id="hero_header" class="hero-header section panel overflow-hidden">
    <div class="position-absolute top-0 start-0 end-0 min-h-screen overflow-hidden d-none lg:d-block" data-anime="targets: >*; scale: [0, 1]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 750});">
        <div class="position-absolute top-0 start-0 rotate-45" style="top: 20% !important; left: 18% !important;">
            <img class="w-24px text-gray-900 dark:text-white" src="{{ asset('themes/lexend-v4/assets/images/template/star-1.svg') }}" alt="star-1" data-uc-svg>
        </div>
        <div class="position-absolute top-0 end-0 rotate-45" style="top: 15% !important; right: 18% !important;">
            <img class="w-32px text-gray-900 dark:text-white" src="{{ asset('themes/lexend-v4/assets/images/template/star-2.svg') }}" alt="star-2" data-uc-svg>
        </div>
    </div>
    <div class="section-outer panel pt-9 lg:pt-10 pb-6 sm:pb-8 lg:pb-9">
        <div class="container max-w-xl">
            <div class="section-inner panel mt-2 sm:mt-4 lg:mt-0" data-anime="targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 200});">
                <div class="vstack items-center gap-4 mb-4 sm:mb-6 lg:mb-8 max-w-850px mx-auto text-center">
                    <h1 class="h2 sm:h1 lg:display-6 xl:display-5 m-0">{{ $title }}</h1>
                    @if($description)
                        <p class="fs-6 md:fs-5 text-dark dark:text-white text-opacity-70">{{ $description }}</p>
                    @endif
                </div>
                <div class="panel row child-cols-12 col-match g-1 sm:g-2">
                    <div class="col-4">
                        @if($left_image)
                            <figure class="featured-image m-0 rounded ratio ratio-2x3 sm:rounded-2 uc-transition-toggle overflow-hidden">
                                @php
                                    $left_img = get_attachment_image_by_id($left_image, 'full', false);
                                @endphp
                                @if(!empty($left_img['img_url']))
                                    <img src="{{ $left_img['img_url'] }}" alt="{{ $left_img['img_alt'] ?? 'About image' }}" class="media-cover image uc-transition-scale-up uc-transition-opaque">
                                @endif
                            </figure>
                        @endif
                        <div class="position-absolute top-0 start-0 z-1 ms-n8 mt-n8 d-none lg:d-block">
                            <img class="w-200px xl:w-250px d-block dark:d-none" src="{{ asset('themes/lexend-v4/assets/images/template/hand-pencil.svg') }}" alt="hand-pencil">
                            <img class="w-200px xl:w-250px d-none dark:d-block" src="{{ asset('themes/lexend-v4/assets/images/template/hand-pencil-dark.svg') }}" alt="hand-pencil-dark">
                        </div>
                    </div>
                    <div class="col-8">
                        @if($right_image)
                            <div class="h-100">
                                <figure class="panel h-100 m-0 rounded sm:rounded-2 overflow-hidden">
                                    <canvas class="h-100 w-100"></canvas>
                                    @php
                                        $right_img = get_attachment_image_by_id($right_image, 'full', false);
                                    @endphp
                                    @if(!empty($right_img['img_url']))
                                        <img src="{{ $right_img['img_url'] }}" alt="{{ $right_img['img_alt'] ?? 'About image' }}" class="media-cover image">
                                    @endif
                                </figure>
                            </div>
                        @endif
                        <div class="position-absolute bottom-0 end-0 z-1 me-n8 mb-n8 d-none lg:d-block">
                            <img class="w-200px xl:w-250px d-block dark:d-none" src="{{ asset('themes/lexend-v4/assets/images/template/empathing.svg') }}" alt="empathing">
                            <img class="w-200px xl:w-250px d-none dark:d-block" src="{{ asset('themes/lexend-v4/assets/images/template/empathing-dark.svg') }}" alt="empathing-dark">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->

