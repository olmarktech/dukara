@php
    // About Team section - EXACT from page-about.html line 1067-1151
@endphp

<!-- Section start -->
<div id="about-team" class="about-team section panel overflow-hidden">
    <div class="section-outer panel py-6 xl:py-9">
        <div class="container max-w-lg">
            <div class="section-inner panel">
                <div class="panel vstack justify-center items-center gap-4 sm:gap-6 xl:gap-8" data-anime="onview: -100; targets: > *; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 200});">
                    @if(!empty($data['title']))
                        <h2 class="h4 sm:h3 lg:h2 m-0 text-center">{{ $data['title'] }}</h2>
                    @endif
                    <div class="row child-cols-6 sm:child-cols-4 lg:child-cols-3 col-match gx-2 lg:gx-4 gy-4 lg:gy-6" data-anime="onview: -100; targets: > *; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 200});" data-uc-grid>
                        @if(!empty($data['repeater_data']) && array_key_exists('repeater_name_', $data['repeater_data']))
                            @foreach($data['repeater_data']['repeater_name_'] as $key => $member_name)
                                <div>
                                    <div class="panel vstack gap-2">
                                        @if(!empty($data['repeater_data']['repeater_image_'][$key]))
                                            {!! render_image_markup_by_attachment_id($data['repeater_data']['repeater_image_'][$key], $member_name, 'full', false, ['class' => 'w-100 rounded']) !!}
                                        @endif
                                        <div class="panel vstack items-start gap-0">
                                            <h6 class="h6 m-0">{{ $member_name }}</h6>
                                            <span class="fs-7 opacity-70">{{ $data['repeater_data']['repeater_position_'][$key] ?? '' }}</span>
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

<!-- Section end -->

