@php
    $title = $data['title'] ?? '';
    $subtitle = $data['subtitle'] ?? '';
    $button_text = $data['button_text'] ?? '';
    $button_url = $data['button_url'] ?? '';
    $button_subtext = $data['button_subtext'] ?? '';
    $background_image = $data['background_image'] ?? '';
    $padding_top = $data['padding_top'] ?? '100px';
    $padding_bottom = $data['padding_bottom'] ?? '100px';
@endphp
<!-- Section start -->
<div id="cta" class="cta section panel overflow-hidden" style="padding-top: {{ $padding_top }}; padding-bottom: {{ $padding_bottom }};">
    <div class="section-outer panel overflow-hidden lg:mx-2 my-2 rounded-2 xl:rounded-3 {{ $background_image ? 'max-h-550px sm:max-h-700px xl:max-h-850px pt-6 lg:pt-8 xl:pt-9' : 'py-6 lg:py-8 xl:py-9' }}">
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
                                @if($title)
                                    <h1 class="h3 sm:h2 xl:h1 m-0" data-anime="onview: -200; translateY: [10, 0]; opacity: [0, 1]; easing: easeOutExpo; duration: 450; delay: 250;">
                                        {!! $title !!}
                                    </h1>
                                @endif
                                @if($subtitle)
                                    <p class="fs-6 xl:fs-5 text-gray-600 dark:text-white text-opacity-70" data-uc-splitext="types: 'words'" data-anime="onview: -100; targets: > *; translateX: [5, 0]; opacity: [0, 1]; easing: easeOutExpo; duration: 450; delay: anime.stagger(50, {start:650});">{{ $subtitle }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="lg:col-auto">
                            @if($button_text && $button_url)
                                <div class="vstack gap-2 items-center" data-anime="onview: -100; translateY: [24, 0]; opacity: [0, 1]; easing: easeOutExpo; duration: 750; delay: 750;">
                                    <a href="{{ $button_url }}" class="btn btn-md xl:btn-lg btn-primary dark:bg-quaternary dark:border-quaternary dark:text-dark fs-6 rounded-pill px-5 xl:px-7 w-auto">
                                        <span>{{ $button_text }}</span>
                                    </a>
                                    @if($button_subtext)
                                        <span class="fs-7 dark:text-white text-opacity-75">{{ $button_subtext }}</span>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @if($background_image)
                    <div class="panel" data-anime="onview: -100; translateY: [80, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 450;">
                        @php
                            $bg_img = get_attachment_image_by_id($background_image);
                        @endphp
                        <img src="{{ $bg_img['img_url'] ?? asset('themes/lexend-v4/assets/images/template/dashboard-13-home.png') }}" alt="Dashboard">
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Section end -->



