@php
    // About Values section - EXACT from page-about.html line 853-897
@endphp

<!-- Section start -->
<div id="about_values" class="about-values section panel overflow-hidden">
    <div class="section-outer panel py-6 xl:py-9">
        <div class="container max-w-lg">
            <div class="section-inner panel">
                <div class="panel vstack gap-4 sm:gap-6 xl:gap-8">
                    @if(!empty($data['title']))
                        <h2 class="h4 sm:h3 lg:h2 m-0 text-center" data-anime="onview: -100; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: 100;">{{ $data['title'] }}</h2>
                    @endif
                    <div class="row child-cols-12 sm:child-cols-6 g-2 lg:g-4 justify-between" data-anime="onview: -100; targets: > *; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 200});">
                        @if(!empty($data['repeater_data']) && array_key_exists('repeater_title_', $data['repeater_data']))
                            @foreach($data['repeater_data']['repeater_title_'] as $key => $value_title)
                                <div>
                                    <div class="panel vstack gap-2 p-4 lg:py-6 rounded-2 bg-secondary dark:bg-gray-800">
                                        @if(!empty($data['repeater_data']['repeater_icon_'][$key]))
                                            @php
                                                $icon_url = get_attachment_image_by_id($data['repeater_data']['repeater_icon_'][$key])['img_url'] ?? '';
                                                $icon_dark_url = !empty($data['repeater_data']['repeater_icon_dark_'][$key]) 
                                                    ? get_attachment_image_by_id($data['repeater_data']['repeater_icon_dark_'][$key])['img_url'] ?? '' 
                                                    : '';
                                            @endphp
                                            @if(!empty($icon_url))
                                                <img class="w-64px lg:w-80px d-block dark:d-none" src="{{ $icon_url }}" alt="{{ $value_title }}-icon">
                                                @if(!empty($icon_dark_url))
                                                    <img class="w-64px lg:w-80px d-none dark:d-block" src="{{ $icon_dark_url }}" alt="{{ $value_title }}-icon-dark">
                                                @else
                                                    <img class="w-64px lg:w-80px d-none dark:d-block" src="{{ $icon_url }}" alt="{{ $value_title }}-icon">
                                                @endif
                                            @endif
                                        @endif
                                        <h5 class="h5 lg:h4 m-0">{{ $value_title }}</h5>
                                        <p class="fs-6 opacity-70 dark:opacity-80">{{ $data['repeater_data']['repeater_description_'][$key] ?? '' }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->

