@php
    // App of the Month Widget - Lexend style
    $title = $data['title'] ?? '';
    $subtitle = $data['subtitle'] ?? '';
    $left_image = $data['left_image'] ?? '';
    $repeater_data = $data['repeater_data'] ?? [];
    $padding_top = $data['padding_top'] ?? '';
    $padding_bottom = $data['padding_bottom'] ?? '';
@endphp

<!-- Section start -->
<div class="section panel overflow-hidden" style="padding-top: {{ $padding_top }}px; padding-bottom: {{ $padding_bottom }}px;">
    <div class="section-outer panel py-6 sm:py-8 xl:py-10">
        <div class="container">
            <div class="section-inner panel">
                <div class="row align-items-center g-4 lg:g-6">
                    <div class="col-12 lg:col-6">
                        @if($left_image)
                            <div class="panel" data-anime="onview: -100; translateX: [-48, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500;">
                                {!! render_image_markup_by_attachment_id($left_image, 'App of the Month', 'full', false) !!}
                            </div>
                        @endif
                    </div>
                    <div class="col-12 lg:col-6">
                        <div class="panel vstack gap-3 xl:gap-4" data-anime="onview: -100; translateX: [48, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500; delay: 200;">
                            @if($title)
                                <h2 class="h3 sm:h2 xl:h1 m-0 dark:text-white">{{ $title }}</h2>
                            @endif
                            @if($subtitle)
                                <p class="fs-6 xl:fs-5 text-dark dark:text-white text-opacity-70">{{ $subtitle }}</p>
                            @endif
                            @if(!empty($repeater_data) && isset($repeater_data['repeater_title_']))
                                <div class="vstack gap-3 mt-2">
                                    @foreach($repeater_data['repeater_title_'] as $key => $item_title)
                                        <div class="hstack gap-3" data-anime="onview: -50; translateY: [24, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500; delay: {{ 300 + ($key * 100) }};">
                                            @if(!empty($repeater_data['repeater_icon_'][$key]))
                                                <div class="cstack w-48px h-48px bg-primary text-white rounded-circle flex-shrink-0">
                                                    <i class="{{ $repeater_data['repeater_icon_'][$key] }} icon-1"></i>
                                                </div>
                                            @endif
                                            <div class="panel">
                                                <h4 class="h5 m-0 dark:text-white">
                                                    @if(!empty($repeater_data['repeater_title_url_'][$key]))
                                                        <a href="{{ $repeater_data['repeater_title_url_'][$key] }}" class="text-inherit">{{ $item_title }}</a>
                                                    @else
                                                        {{ $item_title }}
                                                    @endif
                                                </h4>
                                                @if(!empty($repeater_data['repeater_subtitle_'][$key]))
                                                    <p class="fs-7 text-dark dark:text-white text-opacity-70 mt-1 mb-0">{{ $repeater_data['repeater_subtitle_'][$key] }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Section end -->





