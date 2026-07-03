@php
    // Testimonials Grid section - EXACT from page-about.html line 902-977
    $title = $data['title'] ?? 'Some clients feedbacks';
    $link_text = $data['link_text'] ?? '';
    $link_url = $data['link_url'] ?? '';
    $testimonials = $data['testimonials'] ?? [];
@endphp

<!-- Section start -->
<div id="clients_feedbacks" class="clients-feedbacks section panel overflow-hidden mb-2 xl:mb-3">
    <div class="section-outer panel py-6 xl:py-9">
        <div class="container max-w-lg">
            <div class="section-inner panel">
                <div class="panel vstack justify-center items-center gap-4 sm:gap-6 xl:gap-8" data-anime="onview: -100; targets: > *; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 200});">
                    @if($title)
                        <h2 class="h4 sm:h3 lg:h2 m-0 text-center">{{ $title }}</h2>
                    @endif
                    <div class="row child-cols-12 sm:child-cols-6 xl:child-cols-4 justify-center col-match g-2 lg:g-3" data-uc-grid>
                        @foreach($testimonials as $testimonial)
                            <div>
                                <div class="px-3 sm:px-4 py-4 panel vstack justify-between gap-3 rounded-2 border">
                                    <div class="panel vstack items-start gap-2">
                                        @if(!empty($testimonial->company_logo))
                                            <div class="panel">
                                                <div class="hstack h-48px">
                                                    {!! render_image_markup_by_attachment_id($testimonial->company_logo, $testimonial->company ?? 'Brand', 'full', false, ['class' => 'w-128px text-gray-900 dark:text-white', 'data-uc-svg' => '']) !!}
                                                </div>
                                            </div>
                                        @endif
                                        <p class="fs-6 lg:fs-5 text-dark dark:text-white text-opacity-70">"{{ $testimonial->description }}"</p>
                                    </div>
                                    <div class="panel hstack gap-2 mt-2 lg:mt-4">
                                        @if(!empty($testimonial->image))
                                            {!! render_image_markup_by_attachment_id($testimonial->image, $testimonial->name, 'thumbnail', false, ['class' => 'w-40px rounded-circle']) !!}
                                        @endif
                                        <div class="panel vstack items-start gap-0">
                                            <h6 class="h6 m-0">{{ $testimonial->name }}</h6>
                                            @if(!empty($testimonial->designation))
                                                <span class="fs-7 opacity-70">{{ $testimonial->designation }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if($link_text && $link_url)
                        <a href="{{ $link_url }}" class="uc-link fw-bold d-inline-flex items-center gap-narrow">
                            <span>{{ $link_text }}</span>
                            <i class="icon icon-1 unicon-arrow-right rtl:rotate-180"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->

