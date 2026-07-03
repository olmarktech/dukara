@php
    // About Timeline section - EXACT from page-about.html line 980-1062
@endphp

<!-- Section start -->
<div id="about-timeline" class="about-timeline section panel overflow-hidden bg-secondary dark:bg-gray-800 mt-2 xl:mt-3 rounded-2 xl:rounded-3">
    <div class="section-outer panel py-6 xl:py-9">
        <div class="container max-w-lg">
            <div class="section-inner panel">
                <div class="panel vstack justify-center items-center gap-4 sm:gap-6 xl:gap-8">
                    @if(!empty($data['title']))
                        <h2 class="h4 sm:h3 lg:h2 m-0 text-center" data-anime="onview: -100; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: 100;">{{ $data['title'] }}</h2>
                    @endif
                    <div class="panel w-100 swiper-parent">
                        <div class="swiper-timeline swiper swiper-container overflow-unset" data-uc-swiper="items: 1; gap: 0; dots: .swiper-pagination; disable-class: d-none; center: true; center-bounding: true;" data-uc-swiper-s="items: 2;" data-uc-swiper-m="items: 3;">
                            <div class="swiper-wrapper" data-anime="onview: -100; targets: > *; translateX: [100, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 200});">
                                @if(!empty($data['repeater_data']) && array_key_exists('repeater_year_', $data['repeater_data']))
                                    @foreach($data['repeater_data']['repeater_year_'] as $key => $year)
                                        <div class="swiper-slide panel">
                                            <div class="timeline-box panel vstack items-center gap-9 text-center">
                                                @if(!empty($data['repeater_data']['repeater_image_'][$key]))
                                                    <div class="image-wrap panel overflow-hidden w-200px">
                                                        {!! render_image_markup_by_attachment_id($data['repeater_data']['repeater_image_'][$key], $year, 'full', false, ['class' => 'image w-100 origin-bottom']) !!}
                                                    </div>
                                                @endif
                                                <div class="content panel vstack items-center px-3 xl:px-6">
                                                    <h3 class="title h4 sm:h3 dark:text-white">{{ $year }}</h3>
                                                    <p class="desc fs-6 xl:fs-5 opacity-70 dark:text-white">{{ $data['repeater_data']['repeater_description_'][$key] ?? '' }}</p>
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

<!-- Section end -->

