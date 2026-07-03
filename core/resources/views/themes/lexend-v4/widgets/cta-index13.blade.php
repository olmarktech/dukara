@php
    // CTA Widget - EXACT from index-13.html line 1729-1766
    // This is the gradient style CTA with dashboard image
    $title = $data['title'] ?? 'Automate Repetitive Tasks,';
    $title_highlight = $data['title_highlight'] ?? 'Collaborate Seamlessly';
    $subtitle = $data['subtitle'] ?? 'Automate routine payments and bills with our intuitive and secure payment system.';
    $button_text = $data['button_text'] ?? 'Start a free trial';
    $button_url = $data['button_url'] ?? '#';
    $button_subtext = $data['button_subtext'] ?? 'No credit card required!';
    $cta_image = $data['cta_image'] ?? '';
@endphp

<!-- Section start - EXACT from index-13.html line 1729-1766 -->
<div id="cta" class="cta section panel overflow-hidden">
    <div class="section-outer panel overflow-hidden lg:mx-2 my-2 rounded-2 xl:rounded-3 max-h-550px sm:max-h-700px xl:max-h-850px pt-6 lg:pt-8 xl:pt-9">
        <div class="position-absolute top-0 start-0 end-0 w-100 h-100">
            <div class="w-100 h-100 bg-gradient-45n from-quaternary to-tertiary dark:d-none"></div>
            <div class="w-100 h-100 bg-gray-800 d-none dark:d-block"></div>
        </div>
        <div class="container">
            <div class="section-inner panel vstack gap-4 lg:gap-6 xl:gap-8">
                <div class="panel">
                    <div class="row child-cols-12 justify-between items-center g-3 sm:g-4 text-center lg:text-start">
                        <div class="lg:col-7 xl:col-6">
                            <div class="vstack gap-1 sm:gap-2">
                                <h1 class="h3 sm:h2 xl:h1 m-0" data-anime="onview: -200; translateY: [10, 0]; opacity: [0, 1]; easing: easeOutExpo; duration: 450; delay: 250;">
                                    @php
                                        // Handle highlighted text with {h}{/h} syntax
                                        if (str_contains($title, '{h}') && str_contains($title, '{/h}')) {
                                            $text = explode('{h}', $title);
                                            $highlighted_word = explode('{/h}', $text[1])[0];
                                            $before_text = $text[0];
                                            $after_parts = explode('{/h}', $text[1]);
                                            $after_text = $after_parts[1] ?? '';
                                            echo $before_text . '<br>';
                                        } else {
                                            echo $title . '<br>';
                                            $highlighted_word = $title_highlight;
                                        }
                                    @endphp
                                    <span class="text-primary dark:text-quaternary" data-uc-splitext="types: 'chars'" data-anime="onview: -100; targets: > *; translateY: [-5, 0]; opacity: [0, 1]; easing: easeOutExpo; duration: 250; delay: anime.stagger(50);">
                                        {{ $highlighted_word ?? $title_highlight }}
                                    </span>
                                </h1>
                                <p class="fs-6 xl:fs-5 text-gray-600 dark:text-white text-opacity-70" data-uc-splitext="types: 'words'" data-anime="onview: -100; targets: > *; translateX: [5, 0]; opacity: [0, 1]; easing: easeOutExpo; duration: 450; delay: anime.stagger(50, {start:650});">{{ $subtitle }}</p>
                            </div>
                        </div>
                        <div class="lg:col-auto">
                            <div class="vstack gap-2 items-center" data-anime="onview: -100; translateY: [24, 0]; opacity: [0, 1]; easing: easeOutExpo; duration: 750; delay: 750;">
                                <a href="{{ $button_url }}" class="btn btn-md xl:btn-lg btn-primary dark:bg-quaternary dark:border-quaternary dark:text-dark fs-6 rounded-pill px-5 xl:px-7 w-auto">
                                    <span>{{ $button_text }}</span>
                                </a>
                                <span class="fs-7 dark:text-white text-opacity-75">{{ $button_subtext }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel" data-anime="onview: -100; translateY: [80, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 450;">
                    @if($cta_image)
                        {!! render_image_markup_by_attachment_id($cta_image, 'Dashboard ' . get_static_option('site_title'), 'full', false) !!}
                    @else
                        <img src="{{ asset('themes/lexend-v4/assets/images/template/dashboard-13-home.png') }}" alt="Dashboard {{ get_static_option('site_title') }}">
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->

