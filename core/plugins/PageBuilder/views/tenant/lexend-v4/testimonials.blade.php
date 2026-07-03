@php
    $heading = $data['heading'] ?? '';
    $testimonials = $data['testimonials'] ?? [];
    $padding_top = !empty($data['padding_top']) ? $data['padding_top'] : '80px';
    $padding_bottom = !empty($data['padding_bottom']) ? $data['padding_bottom'] : '80px';
@endphp
<!-- Section start -->
<div id="clients_feedbacks" class="clients-feedbacks section panel overflow-hidden swiper-parent mt-2" style="padding-top: {{ $padding_top }}; padding-bottom: {{ $padding_bottom }};">
    <div class="section-outer panel overflow-hidden py-6 sm:py-8 xl:py-10">
        <div class="container">
            <div class="section-inner panel" data-anime="onview: -200; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500; delay: anime.stagger(100, {start: 200});">
                @if($heading)
                    <div class="section-heading panel vstack items-center gap-2 xl:gap-3 mb-6 max-w-700px mx-auto text-center">
                        <h2 class="h4 lg:h3 m-0">{{ $heading }}</h2>
                    </div>
                @endif
                <div class="section-content panel">
                    <div class="swiper overflow-unset" data-uc-swiper="items: 1.05; gap: 8; center: true; active: 1; dots: .swiper-pagination;" data-uc-swiper-s="items: 1.2; gap: 16;" data-uc-swiper-m="items: 1.3; gap: 16;" data-uc-swiper-l="items: 1.5; gap: 32;">
                        <div class="swiper-wrapper items-center">
                            @if(!empty($testimonials))
                                @foreach($testimonials as $testimonial)
                                    <div class="swiper-slide">
                                        <div class="clients-item panel overflow-hidden rounded-2 xl:rounded-3 border border-1 bg-white dark:bg-opacity-5 dark:text-white">
                                            <div class="row child-cols-12 sm:child-cols-6 g-0 col-match">
                                                <div>
                                                    <div class="clients-item-video panel">
                                                        <figure class="clients-item-video panel ratio ratio-1x1 overflow-hidden h-100">
                                                            @if(!empty($testimonial['client_image']))
                                                                @php
                                                                    $client_img = get_attachment_image_by_id($testimonial['client_image']);
                                                                @endphp
                                                                <img class="image media-cover" src="{{ $client_img['img_url'] ?? '' }}" alt="{{ $testimonial['client_name'] ?? 'Client' }}">
                                                            @else
                                                                <img class="image media-cover" src="{{ asset('themes/lexend-v4/assets/images/portrait/home-13-03.jpg') }}" alt="Client">
                                                            @endif
                                                            @if(!empty($testimonial['video_url']))
                                                                <div class="position-cover" data-uc-lightbox="video-autoplay: true; animation: scale;">
                                                                    <a href="{{ $testimonial['video_url'] }}" class="position-absolute top-50 start-50 translate-middle uc-link w-80px h-80px xl:w-100px xl:h-100px rounded-circle cstack bg-black bg-opacity-50 backdrop-2">
                                                                        <img class="w-32px h-32px text-white" src="{{ asset('themes/lexend-v4/assets/images/common/icons/play.svg') }}" alt="icon" data-uc-svg>
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        </figure>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="clients-item-content panel vstack justify-between gap-3 xl:gap-4 p-3 lg:p-4 xl:p-6">
                                                        <div>
                                                            @if(!empty($testimonial['testimonial_text']))
                                                                <p class="desc fs-6 sm:fs-7 lg:fs-5 lh-xxl text-gray dark:text-gray-100">{{ $testimonial['testimonial_text'] }}</p>
                                                            @endif
                                                        </div>
                                                        <div>
                                                            @if(!empty($testimonial['client_name']))
                                                                <h4 class="title h6 lg:h5 mb-0 lg:mb-narrow text-inherit">{{ $testimonial['client_name'] }}</h4>
                                                            @endif
                                                            @if(!empty($testimonial['client_position']))
                                                                <span class="fs-7 lg:fs-6 text-gray-300 dark:text-gray-200">{{ $testimonial['client_position'] }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                {{-- Default testimonials --}}
                                <div class="swiper-slide">
                                    <div class="clients-item panel overflow-hidden rounded-2 xl:rounded-3 border border-1 bg-white dark:bg-opacity-5 dark:text-white">
                                        <div class="row child-cols-12 sm:child-cols-6 g-0 col-match">
                                            <div>
                                                <div class="clients-item-video panel">
                                                    <figure class="clients-item-video panel ratio ratio-1x1 overflow-hidden h-100">
                                                        <img class="image media-cover" src="{{ asset('themes/lexend-v4/assets/images/portrait/home-13-03.jpg') }}" alt="client image">
                                                        <div class="position-cover" data-uc-lightbox="video-autoplay: true; animation: scale;">
                                                            <a href="#" class="position-absolute top-50 start-50 translate-middle uc-link w-80px h-80px xl:w-100px xl:h-100px rounded-circle cstack bg-black bg-opacity-50 backdrop-2">
                                                                <img class="w-32px h-32px text-white" src="{{ asset('themes/lexend-v4/assets/images/common/icons/play.svg') }}" alt="icon" data-uc-svg>
                                                            </a>
                                                        </div>
                                                    </figure>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="clients-item-content panel vstack justify-between gap-3 xl:gap-4 p-3 lg:p-4 xl:p-6">
                                                    <div>
                                                        <p class="desc fs-6 sm:fs-7 lg:fs-5 lh-xxl text-gray dark:text-gray-100">Lexend has transformed how our team works. We've cut meeting time by 30% and improved project delivery by 25%. The automation features alone saved our accounting team 15 hours per week. Best software investment we've made this year.</p>
                                                    </div>
                                                    <div>
                                                        <h4 class="title h6 lg:h5 mb-0 lg:mb-narrow text-inherit">Harry Peterson</h4>
                                                        <span class="fs-7 lg:fs-6 text-gray-300 dark:text-gray-200">Operations Director at Goodwell</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="clients-item panel overflow-hidden rounded-2 xl:rounded-3 border border-1 bg-white dark:bg-opacity-5 dark:text-white">
                                        <div class="row child-cols-12 sm:child-cols-6 g-0 col-match">
                                            <div>
                                                <div class="clients-item-video panel">
                                                    <figure class="clients-item-video panel ratio ratio-1x1 overflow-hidden h-100">
                                                        <img class="image media-cover" src="{{ asset('themes/lexend-v4/assets/images/portrait/home-13-01.jpg') }}" alt="client image">
                                                        <div class="position-cover" data-uc-lightbox="video-autoplay: true; animation: scale;">
                                                            <a href="#" class="position-absolute top-50 start-50 translate-middle uc-link w-80px h-80px xl:w-100px xl:h-100px rounded-circle cstack bg-black bg-opacity-50 backdrop-2">
                                                                <img class="w-32px h-32px text-white" src="{{ asset('themes/lexend-v4/assets/images/common/icons/play.svg') }}" alt="icon" data-uc-svg>
                                                            </a>
                                                        </div>
                                                    </figure>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="clients-item-content panel vstack justify-between gap-3 xl:gap-4 p-3 lg:p-4 xl:p-6">
                                                    <div>
                                                        <p class="desc fs-6 sm:fs-7 lg:fs-5 lh-xxl text-gray dark:text-gray-100">Lexend has transformed how our team works. We've cut meeting time by 30% and improved project delivery by 25%. The automation features alone saved our accounting team 15 hours per week. Best software investment we've made this year.</p>
                                                    </div>
                                                    <div>
                                                        <h4 class="title h6 lg:h5 mb-0 lg:mb-narrow text-inherit">Mark Rodriguez</h4>
                                                        <span class="fs-7 lg:fs-6 text-gray-300 dark:text-gray-200">Operations Director at Goodwell</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="clients-item panel overflow-hidden rounded-2 xl:rounded-3 border border-1 bg-white dark:bg-opacity-5 dark:text-white">
                                        <div class="row child-cols-12 sm:child-cols-6 g-0 col-match">
                                            <div>
                                                <div class="clients-item-video panel">
                                                    <figure class="clients-item-video panel ratio ratio-1x1 overflow-hidden h-100">
                                                        <img class="image media-cover" src="{{ asset('themes/lexend-v4/assets/images/portrait/home-13-02.jpg') }}" alt="client image">
                                                        <div class="position-cover" data-uc-lightbox="video-autoplay: true; animation: scale;">
                                                            <a href="#" class="position-absolute top-50 start-50 translate-middle uc-link w-80px h-80px xl:w-100px xl:h-100px rounded-circle cstack bg-black bg-opacity-50 backdrop-2">
                                                                <img class="w-32px h-32px text-white" src="{{ asset('themes/lexend-v4/assets/images/common/icons/play.svg') }}" alt="icon" data-uc-svg>
                                                            </a>
                                                        </div>
                                                    </figure>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="clients-item-content panel vstack justify-between gap-3 xl:gap-4 p-3 lg:p-4 xl:p-6">
                                                    <div>
                                                        <p class="desc fs-6 sm:fs-7 lg:fs-5 lh-xxl text-gray dark:text-gray-100">Lexend has transformed how our team works. We've cut meeting time by 30% and improved project delivery by 25%. The automation features alone saved our accounting team 15 hours per week. Best software investment we've made this year.</p>
                                                    </div>
                                                    <div>
                                                        <h4 class="title h6 lg:h5 mb-0 lg:mb-narrow text-inherit">Sané Hommels</h4>
                                                        <span class="fs-7 lg:fs-6 text-gray-300 dark:text-gray-200">Operations Director at Goodwell</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="section-footer panel mt-6 sm:mt-6 h-8px">
                    <div class="swiper-pagination position-absolute bottom-0 text-primary dark:text-quaternary m-0 justify-center"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->



