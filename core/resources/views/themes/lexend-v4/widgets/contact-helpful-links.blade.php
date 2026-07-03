@php
    // Contact Helpful Links section - EXACT from page-contact.html line 791-860
    // "Other ways to reach us" - 4 column grid cards
    $title = $data['title'] ?? 'Other ways to reach us';
@endphp

<!-- Section start -->
<div id="helpful-links" class="section panel overflow-hidden">
    <div class="section-outer panel pb-6 sm:pb-8 lg:pb-9">
        <div class="container max-w-xl">
            <div class="section-inner panel">
                <div class="panel vstack gap-4 sm:gap-6 xl:gap-8">
                    @if($title)
                        <h2 class="h4 sm:h3 lg:h2 m-0 text-center" data-anime="onview: -100; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: 100;">{{ $title }}</h2>
                    @endif
                    <div class="row child-cols-12 sm:child-cols-6 lg:child-cols-3 g-2 xl:g-3 justify-between col-match" data-anime="onview: -100; targets: > *; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 200});">
                        @if(!empty($data['repeater_data']) && array_key_exists('repeater_title_', $data['repeater_data']))
                            @foreach($data['repeater_data']['repeater_title_'] as $key => $card_title)
                                <div>
                                    <div class="panel vstack gap-2 items-center text-center px-3 py-4 lg:py-6 xl:py-8 rounded-2 bg-secondary dark:bg-gray-800 lg:hover:-translate-y-2 duration-150 transition-all">
                                        @if(!empty($data['repeater_data']['repeater_icon_'][$key]))
                                            @php
                                                $icon_url = get_attachment_image_by_id($data['repeater_data']['repeater_icon_'][$key])['img_url'] ?? '';
                                                $icon_dark_url = !empty($data['repeater_data']['repeater_icon_dark_'][$key]) 
                                                    ? get_attachment_image_by_id($data['repeater_data']['repeater_icon_dark_'][$key])['img_url'] ?? '' 
                                                    : '';
                                            @endphp
                                            <div class="cstack mb-2">
                                                @if(!empty($icon_url))
                                                    <img class="w-64px lg:w-80px d-block dark:d-none" src="{{ $icon_url }}" alt="{{ $card_title }}-icon">
                                                    @if(!empty($icon_dark_url))
                                                        <img class="w-64px lg:w-80px d-none dark:d-block" src="{{ $icon_dark_url }}" alt="{{ $card_title }}-icon-dark">
                                                    @else
                                                        <img class="w-64px lg:w-80px d-none dark:d-block" src="{{ $icon_url }}" alt="{{ $card_title }}-icon">
                                                    @endif
                                                @endif
                                            </div>
                                        @endif
                                        <h5 class="h5 m-0">{{ $card_title }}</h5>
                                        @if(!empty($data['repeater_data']['repeater_description_'][$key]))
                                            <p class="fs-6 opacity-70 dark:opacity-80">{{ $data['repeater_data']['repeater_description_'][$key] }}</p>
                                        @endif
                                        @if(!empty($data['repeater_data']['repeater_link_text_'][$key]) && !empty($data['repeater_data']['repeater_link_url_'][$key]))
                                            <a href="{{ $data['repeater_data']['repeater_link_url_'][$key] }}" class="uc-link fw-bold hstack gap-narrow justify-center">
                                                <span>{{ $data['repeater_data']['repeater_link_text_'][$key] }}</span>
                                                <i class="position-relative icon icon-1 unicon-arrow-right rtl:rotate-180 translate-y-px"></i>
                                            </a>
                                        @endif
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

