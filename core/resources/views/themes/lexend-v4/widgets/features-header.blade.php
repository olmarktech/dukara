@php
    // Features Page Header - EXACT from page-features.html line 726-831
    // Header with vertical numbered feature cards
    $title = $data['title'] ?? 'What separates you from others.';
    $subtitle = $data['subtitle'] ?? '';
@endphp

<!-- Section start -->
<div id="hero_header" class="hero-header section panel overflow-hidden">
    <div class="position-absolute top-0 start-0 end-0 min-h-screen overflow-hidden d-none lg:d-block" data-anime="targets: >*; scale: [0, 1]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 750});">
        <div class="position-absolute top-0 start-0 rotate-45" style="top: 30% !important; left: 18% !important;">
            <img class="w-32px text-gray-900 dark:text-white" src="{{ asset('themes/lexend-v4/assets/images/template/star-1.svg') }}" alt="star-1" data-uc-svg>
        </div>
        <div class="position-absolute top-0 end-0 rotate-45" style="top: 15% !important; right: 18% !important;">
            <img class="w-24px text-gray-900 dark:text-white" src="{{ asset('themes/lexend-v4/assets/images/template/star-2.svg') }}" alt="star-2" data-uc-svg>
        </div>
    </div>
    <div class="section-outer panel pt-9 lg:pt-10 pb-6 xl:pb-9">
        <div class="container max-w-lg">
            <div class="section-inner panel mt-2 sm:mt-4 lg:mt-0">
                <div class="panel vstack items-center gap-3 lg:gap-4 mb-6 sm:mb-8 lg:mb-9 max-w-650px mx-auto text-center" data-anime="targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 200});">
                    <h1 class="h2 sm:h1 lg:display-6 xl:display-5 m-0">{{ $title }}</h1>
                    @if($subtitle)
                        <p class="fs-6 sm:fs-5 text-dark dark:text-white text-opacity-70">{{ $subtitle }}</p>
                    @endif
                </div>
                <div class="sticky-scene panel vstack gap-4 sm:gap-6 xl:gap-8">
                    @if(!empty($data['repeater_data']) && array_key_exists('repeater_title_', $data['repeater_data']))
                        @foreach($data['repeater_data']['repeater_title_'] as $key => $feature_title)
                            @php
                                $number = str_pad($key + 1, 2, '0', STR_PAD_LEFT);
                                $feature_image = !empty($data['repeater_data']['repeater_image_'][$key]) 
                                    ? get_attachment_image_by_id($data['repeater_data']['repeater_image_'][$key])['img_url'] ?? '' 
                                    : '';
                            @endphp
                            <div class="feature-item panel px-3 lg:px-4 py-4 rounded-2 bg-secondary dark:bg-gray-800" data-anime="onview: -200; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: 100;">
                                <div class="row child-cols col-match justify-between g-4 lg:g-8 xl:g-10">
                                    <div class="order-0 lg:order-1">
                                        <div class="panel w-100 rounded lg:rounded-2 overflow-hidden">
                                            @if(!empty($feature_image))
                                                <img src="{{ $feature_image }}" alt="{{ $feature_title }}">
                                            @else
                                                <img src="{{ asset('themes/lexend-v4/assets/images/template/feature-0' . (($key % 4) + 1) . '.svg') }}" alt="{{ $feature_title }}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="order-1 lg:order-0 col-12 sm:col-5">
                                        <div class="panel vstack justify-center gap-4 h-100">
                                            <div>
                                                <div class="panel vstack gap-2">
                                                    <span class="fs-6 fw-bold m-0 text-primary">{{ $number }}.</span>
                                                    <h3 class="h4 lg:h2 m-0">{{ $feature_title }}</h3>
                                                    @if(!empty($data['repeater_data']['repeater_description_'][$key]))
                                                        <p class="fs-6 lg:fs-5 opacity-70 dark:opacity-80">{{ $data['repeater_data']['repeater_description_'][$key] }}</p>
                                                    @endif
                                                    @if(!empty($data['repeater_data']['repeater_link_text_'][$key]) && !empty($data['repeater_data']['repeater_link_url_'][$key]))
                                                        <a href="{{ $data['repeater_data']['repeater_link_url_'][$key] }}" class="uc-link fw-bold hstack gap-narrow">
                                                            <span>{{ $data['repeater_data']['repeater_link_text_'][$key] }}</span>
                                                            <i class="position-relative icon icon-1 unicon-arrow-right rtl:rotate-180 translate-y-px"></i>
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->

