@php
    // Portfolio Area Widget - Lexend style
    $title = $data['title'] ?? '';
    $subtitle = $data['subtitle'] ?? '';
    $button_text = $data['button_text'] ?? '';
    $button_url = $data['button_url'] ?? '#';
    $bg_image = $data['bg_image'] ?? '';
    $padding_top = $data['padding_top'] ?? '';
    $padding_bottom = $data['padding_bottom'] ?? '';
@endphp

<!-- Section start -->
<div class="section panel overflow-hidden" style="padding-top: {{ $padding_top }}px; padding-bottom: {{ $padding_bottom }}px;">
    <div class="section-outer panel py-6 sm:py-8 xl:py-10 position-relative">
        @if($bg_image)
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background-image: url('{{ get_attachment_image_by_id($bg_image)['img_url'] ?? '' }}'); background-size: cover; background-position: center; opacity: 0.1;"></div>
        @endif
        <div class="container position-relative">
            <div class="section-inner panel">
                <div class="vstack items-center gap-3 xl:gap-4 text-center max-w-700px mx-auto" data-anime="onview: -100; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500; delay: anime.stagger(100, {start: 200});">
                    @if($title)
                        <h2 class="h3 sm:h2 xl:h1 m-0 dark:text-white">{{ $title }}</h2>
                    @endif
                    @if($subtitle)
                        <p class="fs-6 xl:fs-5 text-dark dark:text-white text-opacity-70">{{ $subtitle }}</p>
                    @endif
                    @if($button_text)
                        <div class="mt-3">
                            <a href="{{ $button_url }}" class="btn btn-md btn-primary text-white">
                                <span>{{ $button_text }}</span>
                                <i class="icon icon-1 unicon-arrow-up-right"></i>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Section end -->





