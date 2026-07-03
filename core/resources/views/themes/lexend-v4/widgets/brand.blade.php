@php
    // Brands section - Supports 3 variants:
    // 1. index-13.html line 1048-1079 (no title, bg-secondary)
    // 2. page-about.html line 773-803 (no title, no background, slider)
    // 3. page-contact.html variant with title (lines 913-940)
    $section_title = $data['section_title'] ?? '';
    $display_style = $data['display_style'] ?? 'default'; // 'default', 'slider', 'slider-with-title'
    
    // Auto-detect style if not set
    if ($display_style === 'default') {
        if (!empty($section_title)) {
            $display_style = 'slider-with-title';
        } elseif (isset($data['use_slider']) && $data['use_slider']) {
            $display_style = 'slider';
        }
    }
@endphp

<!-- Section start -->
@if($display_style === 'slider-with-title')
    {{-- Contact/Pricing page style: Slider with title --}}
    <div id="clients_brands" class="clients-brands section panel overflow-hidden">
        <div class="section-outer panel pb-8 sm:pb-9 xl:pb-9">
            <h5 class="h6 sm:h5 text-center mb-4 sm:mb-6 xl:mb-8" data-anime="onview: -100; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: 200;">{{ $section_title }}</h5>
            <div class="block-panel panel" data-anime="onview: -100; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: 250;">
                <div class="element-brands max-w-950px m-auto text-gray-900 dark:text-white">
                    <div class="swiper" data-uc-swiper="items: 2; center: true; center-bounds: true;" data-uc-swiper-s="items: 4; center: false; center-bounds: false;" data-uc-swiper-m="items: 5; gap: 80;">
                        <div class="swiper-wrapper items-center ease-linear">
                            @if(array_key_exists('repeater_image_', $data['repeater_data'] ?? []))
                                @foreach($data['repeater_data']['repeater_image_'] as $key => $image)
                                    <div class="brand-item swiper-slide text-center">
                                        {!! render_image_markup_by_attachment_id($image, $data['repeater_data']['repeater_title_'][$key] ?? 'Brand', 'full', false, ['class' => 'brand-item-image h-40px', 'data-uc-svg' => '']) !!}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@elseif($display_style === 'slider')
    {{-- About page style: Slider without title, no background --}}
    <div id="clients_brands" class="clients-brands section panel overflow-hidden">
        <div class="section-outer panel pb-6 xl:pb-9">
            <div class="container max-w-xl">
                <div class="section-inner panel">
                    <div class="block-panel panel" data-anime="onview: -100; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: 250;">
                        <div class="element-brands max-w-950px m-auto text-gray-900 dark:text-white">
                            <div class="swiper" data-uc-swiper="items: 2; center: true; center-bounds: true;" data-uc-swiper-s="items: 4; center: false; center-bounds: false;" data-uc-swiper-m="items: 5; gap: 80;">
                                <div class="swiper-wrapper items-center ease-linear">
                                    @if(array_key_exists('repeater_image_', $data['repeater_data'] ?? []))
                                        @foreach($data['repeater_data']['repeater_image_'] as $key => $image)
                                            <div class="brand-item swiper-slide text-center">
                                                {!! render_image_markup_by_attachment_id($image, $data['repeater_data']['repeater_title_'][$key] ?? 'Brand', 'full', false, ['class' => 'brand-item-image h-40px', 'data-uc-svg' => '']) !!}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    {{-- Home page style: Grid with background - EXACT from index-13.html line 1048-1079 --}}
    <div id="brands" class="brands section panel overflow-hidden">
        <div class="section-outer panel pt-6 sm:pt-8 xl:pt-9 lg:mx-2 bg-secondary dark:bg-gray-800">
            <div class="container">
                <div class="section-inner panel text-center xl:mx-9" data-anime="onview: -200; translateY: [-16, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500; delay: 350;">
                    <div class="brands panel">
                        <div class="row child-cols-4 sm:child-cols items-center justify-center text-center g-2 sm:g-6 xl:g-9">
                            @if(array_key_exists('repeater_image_', $data['repeater_data'] ?? []))
                                @foreach($data['repeater_data']['repeater_image_'] as $key => $image)
                                    <div>
                                        @php
                                            $dark_image = $data['repeater_data']['repeater_image_dark_'][$key] ?? null;
                                        @endphp
                                        @if($dark_image)
                                            {{-- Light/Dark mode image variants --}}
                                            <span class="dark:d-none">{!! render_image_markup_by_attachment_id($image, $data['repeater_data']['repeater_title_'][$key] ?? 'Brand', 'full', false) !!}</span>
                                            <span class="d-none dark:d-block">{!! render_image_markup_by_attachment_id($dark_image, $data['repeater_data']['repeater_title_'][$key] ?? 'Brand', 'full', false) !!}</span>
                                        @else
                                            {!! render_image_markup_by_attachment_id($image, $data['repeater_data']['repeater_title_'][$key] ?? 'Brand', 'full', false) !!}
                                        @endif
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<!-- Section end -->

