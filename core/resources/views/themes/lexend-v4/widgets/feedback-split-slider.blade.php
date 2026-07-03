@php
    // Feedback Split Slider - EXACT from page-features.html line 1006-1100
    // 2-column layout with synced image slider and text slider
    $title = $data['title'] ?? 'What clients said:';
@endphp

<!-- Section start -->
<div id="clients_feedback" class="clients-feedback section panel overflow-hidden">
    <div class="section-outer panel">
        <div class="container max-w-lg">
            <div class="section-inner panel swiper-parent" data-anime="onview: -100; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 200});">
                <h2 class="h4 sm:h3 lg:h2 m-0 text-center">{{ $title }}</h2>
                <div class="panel p-3 lg:p-6 bg-secondary dark:bg-gray-800 rounded-3 mt-4 sm:mt-6">
                    <div class="row child-cols-12 sm:child-cols-6 col-match g-3 lg:g-8">
                        <div>
                            <div class="panel rounded-2 overflow-hidden">
                                <div class="swiper connect-image" data-uc-swiper="items: 1; autoplay: 5000; dots: .swiper-pagination; effect: fade; fade: true; allowTouchMove: false; disableOnInteraction: true;">
                                    <div class="swiper-wrapper">
                                        @if(!empty($data['testimonial']))
                                            @foreach($data['testimonial'] as $testimonial)
                                                <div class="swiper-slide">
                                                    <figure class="featured-image m-0 rounded ratio ratio-3x4 uc-transition-toggle overflow-hidden">
                                                        @if(!empty($testimonial->image))
                                                            {!! render_image_markup_by_attachment_id($testimonial->image, $testimonial->name, 'full', false, ['class' => 'media-cover image uc-transition-scale-up uc-transition-opaque']) !!}
                                                        @else
                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque" src="{{ asset('themes/lexend-v4/assets/images/portrait/01.jpg') }}" alt="{{ $testimonial->name }}">
                                                        @endif
                                                    </figure>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="panel">
                                <div class="swiper h-100" data-uc-swiper="connect: .connect-image; items: 1; autoplay: 5000; dots: .swiper-pagination; effect: fade; fade: true;">
                                    <div class="swiper-wrapper">
                                        @if(!empty($data['testimonial']))
                                            @foreach($data['testimonial'] as $testimonial)
                                                <div class="swiper-slide h-100">
                                                    <div class="panel vstack justify-between items-center gap-2 lg:gap-4 h-100 text-center">
                                                        <div class="panel">
                                                            <i class="icon icon-4 unicon-quotes text-primary"></i>
                                                            <p class="fs-6 sm:fs-5 lg:fs-4 fw-bold mt-1 sm:mt-4 dark:text-white">"{{ $testimonial->description }}"</p>
                                                        </div>
                                                        <div class="panel pt-3">
                                                            <div class="panel vstack items-center gap-narrow">
                                                                <h6 class="h5 m-0">{{ $testimonial->name }}</h6>
                                                                @if(!empty($testimonial->designation))
                                                                    <span class="fs-6 opacity-70">{{ $testimonial->designation }}{{ !empty($testimonial->company) ? ' at ' . $testimonial->company : '' }}</span>
                                                                @endif
                                                            </div>
                                                            <div class="panel mt-6">
                                                                <div class="swiper-pagination text-primary m-0 justify-center"></div>
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
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->

