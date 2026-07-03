@php
    // About Us section - EXACT from page-about.html line 808-848
@endphp

<!-- Section start -->
<div id="about_us" class="about-us section panel overflow-hidden" data-anime="onview: -100; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: 250;">
    <div class="section-outer panel py-6 xl:py-9 bg-secondary dark:bg-gray-800">
        <div class="d-none lg:d-block" data-anime="onview: -100; targets: img; scale: [0.8, 1]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: 350;">
            <div class="position-absolute bottom-0 start-0 ms-n8 mb-6">
                <img class="w-150px xl:w-250px d-block dark:d-none" src="{{ asset('themes/lexend-v4/assets/images/template/walking.svg') }}" alt="walking">
                <img class="w-150px xl:w-250px d-none dark:d-block" src="{{ asset('themes/lexend-v4/assets/images/template/walking-dark.svg') }}" alt="walking-dark">
            </div>
        </div>
        <div class="container max-w-lg">
            <div class="section-inner panel">
                <div class="panel vstack text-center" data-anime="onview: -100; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 200});">
                    @if(!empty($data['title']))
                        <h2 class="h3 lg:h2 mb-4">{{ $data['title'] }}</h2>
                    @endif
                    @if(!empty($data['paragraph_one']))
                        <p class="fs-5 xl:fs-4 text-dark dark:text-white text-opacity-70">{{ $data['paragraph_one'] }}</p>
                    @endif
                    @if(!empty($data['paragraph_two']))
                        <p class="fs-5 xl:fs-4 text-dark dark:text-white text-opacity-70">{{ $data['paragraph_two'] }}</p>
                    @endif
                    <div class="panel mt-6">
                        <div class="row child-cols-6 lg:child-cols-4 justify-center g-3 col-match">
                            @if(!empty($data['counter_1_number']))
                                <div>
                                    <div class="panel vstack gap-1">
                                        <h4 class="h2 xl:h1 m-0"><span data-anime="onview: -100; textContent: {{ $data['counter_1_number'] }}; round: 1; easing: linear; duration: 1200;">0</span></h4>
                                        <p class="fs-6 lg:fs-5 text-dark dark:text-white text-opacity-70">{{ $data['counter_1_text'] }}</p>
                                    </div>
                                </div>
                            @endif
                            @if(!empty($data['counter_2_number']))
                                <div>
                                    <div class="panel vstack gap-1">
                                        <h4 class="h2 xl:h1 m-0"><span data-anime="onview: -100; textContent: [0, {{ $data['counter_2_number'] }}]; round: 1; easing: linear; duration: 1200;">0</span></h4>
                                        <p class="fs-6 lg:fs-5 text-dark dark:text-white text-opacity-70">{{ $data['counter_2_text'] }}</p>
                                    </div>
                                </div>
                            @endif
                            @if(!empty($data['counter_3_number']))
                                <div>
                                    <div class="panel vstack gap-1">
                                        <h4 class="h2 xl:h1 m-0"><span data-anime="onview: -100; textContent: [0, {{ $data['counter_3_number'] }}]; round: 1; easing: linear; duration: 1200;">0</span>{{ $data['counter_3_suffix'] }}</h4>
                                        <p class="fs-6 lg:fs-5 text-dark dark:text-white text-opacity-70 text-nowrap">{{ $data['counter_3_text'] }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->

