@php
    // Extract data from Page Builder
    $badge_text = $data['badge_text'] ?? 'WORK SMARTER, NOT HARDER.';
    $title = $data['title'] ?? '';
    $subtitle = $data['subtitle'] ?? '';
    $button_text = $data['button_text'] ?? '';
    $button_url = $data['button_url'] ?? '';
    $button_subtext = $data['button_subtext'] ?? 'No credit card required!';
    $hero_image = $data['right_foreground_image'] ?? '';
@endphp

<!-- Section start - EXACT from index-13.html line 997-1043 -->
<div id="hero_header" class="hero-header section panel overflow-hidden">
    <div class="position-absolute top-0 start-0 end-0 w-100 h-100">
        <div class="h-4/5 sm:h-2/3 bg-gradient-45n from-tertiary to-quaternary rounded-bottom-2 xl:rounded-bottom-3 lg:mx-2 lg:mt-0 dark:d-none"></div>
        <div class="h-4/5 sm:h-2/3 bg-gray-800 lg:rounded-bottom-2 xl:rounded-bottom-3 lg:mx-2 lg:mt-0 d-none dark:d-block"></div>
        <div class="h-100 bg-secondary dark:bg-gray-800 rounded-top-2 xl:rounded-top-3 lg:mx-2 mt-2"></div>
    </div>
    <div class="section-outer panel pt-8 lg:pt-9 xl:pt-10">
        <div class="container">
            <div class="section-inner panel">
                <div class="d-none lg:d-block" data-anime="targets: >*; scale: [0, 1]; opacity: [0, 1]; easing: easeOutCubic; duration: 750; delay: anime.stagger(150, {start: 500});">
                    <img src="{{ asset('themes/lexend-v4/assets/images/vectors/finger.svg') }}" alt="Icon" class="d-inline-block position-absolute w-64px xl:w-80px dark:text-white lg:d-none xl:d-block" style="top: 29%; left: 33%;" data-uc-svg>
                    <img src="{{ asset('themes/lexend-v4/assets/images/vectors/finger.svg') }}" alt="Icon" class="d-inline-block position-absolute w-64px xl:w-80px dark:text-white xl:d-none" style="top: 34%; left: 28%;" data-uc-svg>
                    <img src="{{ asset('themes/lexend-v4/assets/images/vectors/star-01.svg') }}" alt="Icon" class="d-inline-block position-absolute w-32px xl:w-48px dark:text-white" style="top: 1%; left: 8%;" data-uc-svg>
                    <img src="{{ asset('themes/lexend-v4/assets/images/vectors/star-01.svg') }}" alt="Icon" class="d-inline-block position-absolute w-20px xl:w-32px dark:text-white" style="top: 8%; right: 6%;" data-uc-svg>
                    <img src="{{ asset('themes/lexend-v4/assets/images/vectors/star-02.svg') }}" alt="Icon" class="d-inline-block position-absolute w-18px xl:w-24px dark:text-white" style="top: 5%; left: 13%;" data-uc-svg>
                    <img src="{{ asset('themes/lexend-v4/assets/images/vectors/star-02.svg') }}" alt="Icon" class="d-inline-block position-absolute w-20px xl:w-32px dark:text-white" style="top: 24%; left: 7%;" data-uc-svg>
                    <img src="{{ asset('themes/lexend-v4/assets/images/vectors/star-02.svg') }}" alt="Icon" class="d-inline-block position-absolute w-20px xl:w-32px dark:text-white" style="top: 28%; right: 21%;" data-uc-svg>
                </div>
                <div class="row child-cols-12 justify-center items-center g-8">
                    <div class="lg:col-10">
                        <div class="panel vstack gap-4 lg:gap-6 xl:gap-8">
                            <div class="panel vstack justify-center items-center gap-2 px-2 pt-4 lg:pt-6 text-center">
                                <span class="fs-7 fw-semibold text-uppercase text-primary dark:text-quaternary" data-anime="translateY: [10, 0]; opacity: [0, 1]; easing: easeOutExpo; duration: 450; delay: 250;">{{ $badge_text }}</span>
                                <h1 class="h2 md:h1 lg:display-6 xl:display-5 m-0" data-anime="translateY: [10, 0]; opacity: [0, 1]; easing: easeOutExpo; duration: 450; delay: 250;">
                                    @php
                                        if (str_contains($title, '{h}') && str_contains($title, '{/h}')) {
                                            $text = explode('{h}', $title);
                                            $highlighted_word = explode('{/h}', $text[1])[0];
                                            $before_text = $text[0];
                                            $after_parts = explode('{/h}', $text[1]);
                                            $after_text = $after_parts[1] ?? '';
                                            echo $before_text;
                                            echo '<span class="text-primary dark:text-quaternary" data-uc-splitext="types: \'chars\'" data-anime="targets: > *; translateY: [-5, 0]; opacity: [0, 1]; easing: easeOutExpo; duration: 250; delay: anime.stagger(50);">';
                                            echo $highlighted_word;
                                            echo '</span>';
                                            echo $after_text;
                                        } else {
                                            echo $title;
                                        }
                                    @endphp
                                </h1>
                                <p class="fs-6 xl:fs-5 xl:px-9 dark:text-white text-opacity-70" data-uc-splitext="types: 'words'" data-anime="targets: > *; translateX: [5, 0]; opacity: [0, 1]; easing: easeOutExpo; duration: 450; delay: anime.stagger(50, {start:650});">{{ $subtitle }}</p>
                                <div class="vstack gap-2 items-center my-1 lg:my-3" data-anime="translateY: [24, 0]; opacity: [0, 1]; easing: easeOutExpo; duration: 750; delay: 750;">
                                    <a href="{{ $button_url }}" class="btn btn-md xl:btn-lg btn-primary dark:bg-quaternary dark:border-quaternary dark:text-dark fs-6 rounded-pill px-5 lg:px-7 w-auto">
                                        <span>{{ $button_text }}</span>
                                    </a>
                                    <span class="fs-7 dark:text-white text-opacity-75">{{ $button_subtext }}</span>
                                </div>
                            </div>
                            <div class="panel rounded-2" data-anime="translateY: [80, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 450; delay: 950;">
                                @if($hero_image)
                                    {!! render_image_markup_by_attachment_id($hero_image, 'Dashboard '.get_static_option('site_title'), 'full', false) !!}
                                @else
                                    <img src="{{ asset('themes/lexend-v4/assets/images/template/dashboard-13-home.png') }}" alt="Dashboard {{ get_static_option('site_title') }}">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->
