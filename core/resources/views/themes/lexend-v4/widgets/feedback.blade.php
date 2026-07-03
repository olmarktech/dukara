@php
    // Testimonials section - EXACT from index-13.html line 1439-1547
    $title = $data['title'] ?? '';
@endphp

<!-- Section start -->
<div id="clients_feedbacks" class="clients-feedbacks section panel overflow-hidden swiper-parent">
    <div class="section-outer panel overflow-hidden pb-6 sm:pb-8 xl:pb-10">
        <div class="container">
            <div class="section-inner panel" data-anime="onview: -200; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500; delay: anime.stagger(100, {start: 200});">
                <div class="section-heading panel vstack items-center gap-2 xl:gap-3 mb-6 max-w-700px mx-auto text-center">
                    @if($title)
                        @php
                            if (str_contains($title, '{h}') && str_contains($title, '{/h}')) {
                                $text = explode('{h}', $title);
                                $highlighted_word = explode('{/h}', $text[1])[0];
                                $before_text = $text[0];
                                $after_parts = explode('{/h}', $text[1]);
                                $after_text = $after_parts[1] ?? '';
                                $final_title = $before_text . '<span class="text-primary dark:text-quaternary">' . $highlighted_word . '</span>' . $after_text;
                            } else {
                                $final_title = $title;
                            }
                        @endphp
                        <h2 class="h4 lg:h3 m-0">{!! $final_title !!}</h2>
                    @endif
                </div>
                <div class="section-content panel">
                    <div class="swiper swiper-testimonials overflow-unset" data-uc-swiper="items: 1.05; gap: 8; center: true; active: 1; dots: .swiper-pagination;" data-uc-swiper-s="items: 1.2; gap: 16;" data-uc-swiper-m="items: 1.3; gap: 16;" data-uc-swiper-l="items: 1.5; gap: 32;">
                        <div class="swiper-wrapper items-center">
                            @if(!empty($data['testimonial']))
                                @foreach($data['testimonial'] as $testimonial)
                                    <div class="swiper-slide">
                                        <div class="clients-item panel overflow-hidden rounded-2 xl:rounded-3 border border-1 bg-white dark:bg-opacity-5 dark:text-white">
                                            <div class="row child-cols-12 sm:child-cols-6 g-0 col-match">
                                                <div>
                                                    <div class="clients-item-video panel">
                                                        <figure class="clients-item-video panel ratio ratio-1x1 overflow-hidden h-100">
                                                            @if(!empty($testimonial->image))
                                                                {!! render_image_markup_by_attachment_id($testimonial->image, $testimonial->name, 'full', false) !!}
                                                            @else
                                                                <img class="image media-cover" src="{{ asset('themes/lexend-v4/assets/images/portrait/home-13-01.jpg') }}" alt="{{ $testimonial->name }}">
                                                            @endif
                                                        </figure>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="clients-item-content panel vstack justify-between gap-3 xl:gap-4 p-3 lg:p-4 xl:p-6">
                                                        <div>
                                                            <p class="desc fs-6 sm:fs-7 lg:fs-5 lh-xxl text-gray dark:text-gray-100">{{ $testimonial->description }}</p>
                                                        </div>
                                                        <div>
                                                            <h4 class="title h6 lg:h5 mb-0 lg:mb-narrow text-inherit">{{ $testimonial->name }}</h4>
                                                            @if(!empty($testimonial->company))
                                                                <span class="fs-7 lg:fs-6 text-gray-300 dark:text-gray-200">{{ $testimonial->designation ?? 'Customer' }} at {{ $testimonial->company }}</span>
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
                    <div class="section-footer panel mt-6 sm:mt-6 h-8px">
                        <div class="swiper-pagination position-absolute bottom-0 text-primary dark:text-quaternary m-0 justify-center"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->

<style>
/* Fix Testimonial Swiper Display */
.swiper-testimonials .swiper-wrapper {
    display: flex !important;
    align-items: center;
}

.swiper-testimonials .swiper-slide {
    width: auto;
    flex-shrink: 0;
}

.clients-feedbacks .swiper-wrapper {
    transition-timing-function: ease-out;
}

/* Ensure proper height */
.clients-item {
    height: 100%;
}

@media (max-width: 640px) {
    .swiper-testimonials {
        padding-left: 1rem;
        padding-right: 1rem;
    }
}
</style>

<script>
// Ensure swiper initializes properly for testimonials
document.addEventListener('DOMContentLoaded', function() {
    const testimonialSwiper = document.querySelector('.swiper-testimonials');
    if (!testimonialSwiper) return;
    
    // Force wrapper to be flex
    const wrapper = testimonialSwiper.querySelector('.swiper-wrapper');
    if (wrapper) {
        wrapper.style.display = 'flex';
        wrapper.style.flexDirection = 'row';
    }
    
    // Try UIkit initialization
    if (window.UIkit && UIkit.swiper) {
        setTimeout(() => {
            try {
                UIkit.swiper(testimonialSwiper);
                console.log('Testimonial swiper initialized via UIkit');
            } catch(e) {
                console.log('UIkit swiper init failed:', e);
            }
        }, 200);
    }
    
    // Fallback: Manual initialization
    setTimeout(() => {
        const wrapper = testimonialSwiper.querySelector('.swiper-wrapper');
        if (wrapper && wrapper.style.transform === '') {
            console.log('Initializing testimonial swiper manually');
            wrapper.style.display = 'flex';
            wrapper.style.transition = 'transform 0.3s ease';
        }
    }, 500);
});
</script>
