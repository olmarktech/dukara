@php
    $title = $data['title'] ?? '';
    $subtitle = $data['subtitle'] ?? '';
    $padding_top = $data['padding_top'] ?? '80';
    $padding_bottom = $data['padding_bottom'] ?? '80';
    $section_id = $data['section_id'] ?? '';
@endphp

{{-- Lexend Counter Section --}}
<div id="{{ $section_id }}" class="counter-section section panel" style="padding-top: {{ $padding_top }}px; padding-bottom: {{ $padding_bottom }}px;">
    <div class="container">
        <div class="row child-cols-12 sm:child-cols-6 lg:child-cols-4 col-match justify-center g-4">
            @if(array_key_exists('repeater_title_', $data['repeater_data']))
                @foreach($data['repeater_data']['repeater_title_'] as $key => $title)
                    <div>
                        <div class="panel text-center" data-anime="onview: -100; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100);">
                            <h3 class="h2 lg:h1 m-0 text-primary dark:text-quaternary">
                                {{ $data['repeater_data']['repeater_number_'][$key] ?? '0' }}<span>+</span>
                            </h3>
                            <p class="fs-5 lg:fs-4 fw-medium mt-1 dark:text-white">{{ $title }}</p>
                            @if(!empty($data['repeater_data']['repeater_description_'][$key]))
                                <p class="fs-6 opacity-70 mt-1">{{ $data['repeater_data']['repeater_description_'][$key] }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

