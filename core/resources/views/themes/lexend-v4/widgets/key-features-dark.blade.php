@php
    // Key Features Dark Grid - EXACT from page-features.html line 836-952
    // Dark background with hover effect cards
    $title = $data['title'] ?? '';
@endphp

<!-- Section start -->
<div id="key_features" class="key-features section panel overflow-hidden bg-gray-900 uc-dark mb-4 xl:mb-6 rounded-2 xl:rounded-3">
    <div class="section-outer panel py-6 xl:py-9 dark:bg-gray-800">
        <div class="container sm:max-w-md lg:max-w-lg">
            <div class="section-inner panel">
                <div class="panel vstack gap-4 sm:gap-6 xl:gap-8">
                    @if($title)
                        @php
                            if (str_contains($title, '{h}') && str_contains($title, '{/h}')) {
                                $text = explode('{h}', $title);
                                $highlighted_word = explode('{/h}', $text[1])[0];
                                $before_text = $text[0];
                                $after_parts = explode('{/h}', $text[1]);
                                $after_text = $after_parts[1] ?? '';
                                $final_title = $before_text . '<span class="text-primary">' . $highlighted_word . '</span>' . $after_text;
                            } else {
                                $final_title = $title;
                            }
                        @endphp
                        <h2 class="title h3 lg:h2 xl:h1 m-0 text-center max-w-550px mx-auto" data-anime="onview: -100; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: 250;">{!! $final_title !!}</h2>
                    @endif
                    <div class="panel">
                        <div class="row child-cols-12 sm:child-cols-6 lg:child-cols-4 col-match g-3" data-anime="onview: -100; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 200});">
                            @if(!empty($data['repeater_data']) && array_key_exists('repeater_title_', $data['repeater_data']))
                                @foreach($data['repeater_data']['repeater_title_'] as $key => $item_title)
                                    <div>
                                        <div class="feature-item panel p-4 border rounded hover:bg-white dark:hover:bg-primary dark:text-white hover:scale-105 duration-150 transition-all">
                                            <div class="vstack panel min-h-250px">
                                                <i class="position-absolute top-0 ltr:end-0 rtl:start-0 icon-2 unicon-arrow-up-right rtl:-rotate-90"></i>
                                                <div class="vstack justify-between gap-2 h-100">
                                                    @if(!empty($data['repeater_data']['repeater_icon_'][$key]))
                                                        @php
                                                            $icon_class = $data['repeater_data']['repeater_icon_'][$key];
                                                            // Check if it's a FontAwesome icon or Unicon
                                                            $is_fontawesome = str_contains($icon_class, 'fa-') || str_contains($icon_class, 'fa ');
                                                        @endphp
                                                        @if($is_fontawesome)
                                                            <i class="icon icon-4 {{ $icon_class }}" style="font-size: 2.5rem;"></i>
                                                        @else
                                                            <i class="icon icon-4 {{ $icon_class }}"></i>
                                                        @endif
                                                    @else
                                                        <i class="icon icon-4 unicon-document"></i>
                                                    @endif
                                                    <div class="panel">
                                                        <div class="vstack gap-1">
                                                            <h3 class="title h5 m-0 text-inherit">{{ $item_title }}</h3>
                                                            @if(!empty($data['repeater_data']['repeater_description_'][$key]))
                                                                <p class="desc fs-6 opacity-70">{{ $data['repeater_data']['repeater_description_'][$key] }}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(!empty($data['repeater_data']['repeater_link_url_'][$key]))
                                                    <a href="{{ $data['repeater_data']['repeater_link_url_'][$key] }}" class="position-cover"></a>
                                                @endif
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

<!-- Section end -->

