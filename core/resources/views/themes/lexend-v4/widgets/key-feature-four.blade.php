@php
    // Key Feature Style Four Widget - Lexend style
    $repeater_data = $data['repeater_data'] ?? [];
    $padding_top = $data['padding_top'] ?? '';
    $padding_bottom = $data['padding_bottom'] ?? '';
@endphp

<!-- Section start -->
<div class="section panel overflow-hidden" style="padding-top: {{ $padding_top }}px; padding-bottom: {{ $padding_bottom }}px;">
    <div class="section-outer panel py-6 sm:py-8 xl:py-10">
        <div class="container">
            <div class="section-inner panel">
                @if(!empty($repeater_data) && isset($repeater_data['repeater_title_']))
                    <div class="row child-cols-12 sm:child-cols-6 lg:child-cols-3 col-match g-3 lg:g-4" data-anime="onview: -100; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500; delay: anime.stagger(100, {start: 200});">
                        @foreach($repeater_data['repeater_title_'] as $key => $item_title)
                            <div>
                                <div class="feature-item panel vstack gap-3 p-4 lg:p-5 rounded-2 bg-secondary dark:bg-gray-800">
                                    @if(!empty($repeater_data['repeater_icon_'][$key]))
                                        <div class="icon-box">
                                            <i class="{{ $repeater_data['repeater_icon_'][$key] }} icon-2 text-primary dark:text-quaternary"></i>
                                        </div>
                                    @endif
                                    <div class="panel">
                                        <h3 class="h5 lg:h4 m-0 dark:text-white">
                                            @if(!empty($repeater_data['repeater_title_url_'][$key]))
                                                <a href="{{ $repeater_data['repeater_title_url_'][$key] }}" class="text-inherit">{{ $item_title }}</a>
                                            @else
                                                {{ $item_title }}
                                            @endif
                                        </h3>
                                        @if(!empty($repeater_data['repeater_description_'][$key]))
                                            <p class="fs-6 text-dark dark:text-white text-opacity-70 mt-2 mb-0">{{ $repeater_data['repeater_description_'][$key] }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Section end -->





