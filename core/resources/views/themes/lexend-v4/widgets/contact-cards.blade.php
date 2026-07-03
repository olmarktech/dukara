@php
    // Contact Cards section - EXACT from page-contact.html line 791-860
    $section_title = $data['section_title'] ?? 'Other ways to reach us';
    $repeater_data = $data['repeater_data'] ?? [];
    $section_id = $data['section_id'] ?? 'helpful-links';
@endphp

<!-- Section start -->
<div id="{{ $section_id }}" class="section panel overflow-hidden">
    <div class="section-outer panel pb-6 sm:pb-8 lg:pb-9">
        <div class="container max-w-xl">
            <div class="section-inner panel">
                <div class="panel vstack gap-4 sm:gap-6 xl:gap-8">
                    @if($section_title)
                        <h2 class="h4 sm:h3 lg:h2 m-0 text-center" data-anime="onview: -100; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: 100;">{{ $section_title }}</h2>
                    @endif
                    @if(!empty($repeater_data) && isset($repeater_data['repeater_title']))
                        <div class="row child-cols-12 sm:child-cols-6 lg:child-cols-3 g-2 xl:g-3 justify-between col-match" data-anime="onview: -100; targets: > *; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 200});">
                            @foreach($repeater_data['repeater_title'] as $key => $title)
                                <div>
                                    <div class="panel vstack gap-2 items-center text-center px-3 py-4 lg:py-6 xl:py-8 rounded-2 bg-secondary dark:bg-gray-800 lg:hover:-translate-y-2 duration-150 transition-all">
                                        @if(!empty($repeater_data['repeater_icon'][$key]))
                                            <div class="cstack mb-2">
                                                @php
                                                    $icon_url = get_attachment_image_by_id($repeater_data['repeater_icon'][$key], 'full', false);
                                                @endphp
                                                @if(!empty($icon_url['img_url']))
                                                    <img class="w-64px lg:w-80px d-block dark:d-none" src="{{ $icon_url['img_url'] }}" alt="{{ $title ?? 'icon' }}">
                                                    <img class="w-64px lg:w-80px d-none dark:d-block" src="{{ $icon_url['img_url'] }}" alt="{{ $title ?? 'icon-dark' }}">
                                                @else
                                                    {{-- Fallback to default icons if image not uploaded --}}
                                                    <img class="w-64px lg:w-80px d-block dark:d-none" src="{{ asset('themes/lexend-v4/assets/images/template/icon-location.svg') }}" alt="icon">
                                                    <img class="w-64px lg:w-80px d-none dark:d-block" src="{{ asset('themes/lexend-v4/assets/images/template/icon-location-dark.svg') }}" alt="icon-dark">
                                                @endif
                                            </div>
                                        @endif
                                        @if($title)
                                            <h5 class="h5 m-0">{{ $title }}</h5>
                                        @endif
                                        @if(!empty($repeater_data['repeater_description'][$key]))
                                            <p class="fs-6 opacity-70 dark:opacity-80">{{ $repeater_data['repeater_description'][$key] }}</p>
                                        @endif
                                        @if(!empty($repeater_data['repeater_link_text'][$key]) && !empty($repeater_data['repeater_link_url'][$key]))
                                            <a href="{{ $repeater_data['repeater_link_url'][$key] }}" class="uc-link fw-bold hstack gap-narrow justify-center">
                                                <span>{{ $repeater_data['repeater_link_text'][$key] }}</span>
                                                <i class="position-relative icon icon-1 unicon-arrow-right rtl:rotate-180 translate-y-px"></i>
                                            </a>
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
<!-- Section end -->

