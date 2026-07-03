@php
    // CTA section - EXACT from index-13.html line 1729-1766
    $title = $data['title'] ?? '';
    $subtitle = $data['subtitle'] ?? '';
    $button_text = $data['button_text'] ?? '';
    $button_subtext = $data['button_subtext'] ?? '';
    $cta_image = $data['cta_image'] ?? '';
@endphp

<!-- Section start -->
<div id="cta" class="cta section panel overflow-hidden">
    <div class="section-outer panel overflow-hidden lg:mx-2 my-2 rounded-2 xl:rounded-3 {{ !empty($cta_image) ? 'max-h-550px sm:max-h-700px xl:max-h-850px pt-6 lg:pt-8 xl:pt-9' : 'py-6 lg:py-8 xl:py-9' }}">
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
                                    @if($title)
                                        @php
                                            if (str_contains($title, '{h}') && str_contains($title, '{/h}')) {
                                                $text = explode('{h}', $title);
                                                $highlighted_word = explode('{/h}', $text[1])[0];
                                                $before_text = $text[0];
                                                $after_parts = explode('{/h}', $text[1]);
                                                $after_text = $after_parts[1] ?? '';
                                                echo $before_text;
                                                echo '<br><span class="text-primary dark:text-quaternary" data-uc-splitext="types: \'chars\'" data-anime="onview: -100; targets: > *; translateY: [-5, 0]; opacity: [0, 1]; easing: easeOutExpo; duration: 250; delay: anime.stagger(50);">';
                                                echo $highlighted_word;
                                                echo '</span>';
                                                echo $after_text;
                                            } else {
                                                echo $title;
                                            }
                                        @endphp
                                    @endif
                                </h1>
                                @if($subtitle)
                                    <p class="fs-6 xl:fs-5 text-gray-600 dark:text-white text-opacity-70" data-uc-splitext="types: 'words'" data-anime="onview: -100; targets: > *; translateX: [5, 0]; opacity: [0, 1]; easing: easeOutExpo; duration: 450; delay: anime.stagger(50, {start:650});">{{ $subtitle }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="lg:col-auto">
                            <div class="vstack gap-2 items-center" data-anime="onview: -100; translateY: [24, 0]; opacity: [0, 1]; easing: easeOutExpo; duration: 750; delay: 750;">
                                @if($button_text)
                                    <a href="{{ $data['button_url'] ?? '#' }}" class="btn btn-md xl:btn-lg btn-primary dark:bg-quaternary dark:border-quaternary dark:text-dark fs-6 rounded-pill px-5 xl:px-7 w-auto">
                                        <span>{{ $button_text }}</span>
                                    </a>
                                @endif
                                @if($button_subtext)
                                    <span class="fs-7 dark:text-white text-opacity-75">{{ $button_subtext }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @if($cta_image)
                    <div class="panel" data-anime="onview: -100; translateY: [80, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 450;">
                        {!! render_image_markup_by_attachment_id($cta_image, 'Dashboard', 'full', false) !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Section end -->

