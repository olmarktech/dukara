@php
    // Support Area Widget - Lexend style
    $title = $data['title'] ?? '';
    $subtitle = $data['subtitle'] ?? '';
    $button_text = $data['button_text'] ?? '';
    $button_url = $data['button_url'] ?? '#';
    $image = $data['image'] ?? '';
    $section_alignment = $data['section_alignment'] ?? 'left';
    $repeater_data = $data['repeater_data'] ?? [];
    $padding_top = $data['padding_top'] ?? '';
    $padding_bottom = $data['padding_bottom'] ?? '';
    
    $is_left = ($section_alignment === 'left');
@endphp

<!-- Section start -->
<div class="section panel overflow-hidden" style="padding-top: {{ $padding_top }}px; padding-bottom: {{ $padding_bottom }}px;">
    <div class="section-outer panel py-6 sm:py-8 xl:py-10">
        <div class="container">
            <div class="section-inner panel">
                <div class="row align-items-center g-4 lg:g-6">
                    @if($is_left && $image)
                        <div class="col-12 lg:col-6 order-2 lg:order-1">
                            <div class="panel" data-anime="onview: -100; translateX: [-48, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500;">
                                {!! render_image_markup_by_attachment_id($image, $title, 'full', false) !!}
                            </div>
                        </div>
                    @endif
                    <div class="col-12 lg:col-6 {{ $is_left ? 'order-1 lg:order-2' : '' }}">
                        <div class="panel vstack gap-3 xl:gap-4" data-anime="onview: -100; translateX: [{{ $is_left ? '48' : '-48' }}, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500; delay: 200;">
                            @if($title)
                                <h2 class="h3 sm:h2 xl:h1 m-0 dark:text-white">{{ $title }}</h2>
                            @endif
                            @if($subtitle)
                                <p class="fs-6 xl:fs-5 text-dark dark:text-white text-opacity-70">{{ $subtitle }}</p>
                            @endif
                            @if(!empty($repeater_data) && isset($repeater_data['repeater_title_']))
                                <div class="vstack gap-2 mt-2">
                                    @foreach($repeater_data['repeater_title_'] as $key => $item_title)
                                        <div class="hstack gap-2" data-anime="onview: -50; translateY: [24, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500; delay: {{ 300 + ($key * 100) }};">
                                            @if(!empty($repeater_data['repeater_icon_'][$key]))
                                                <i class="{{ $repeater_data['repeater_icon_'][$key] }} icon-1 text-primary dark:text-quaternary"></i>
                                            @endif
                                            <span class="fs-6 dark:text-white">{{ $item_title }}</span>
                                        </div>
                                    @endforeach
                                </div>
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
                    @if(!$is_left && $image)
                        <div class="col-12 lg:col-6">
                            <div class="panel" data-anime="onview: -100; translateX: [48, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500;">
                                {!! render_image_markup_by_attachment_id($image, $title, 'full', false) !!}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Section end -->





