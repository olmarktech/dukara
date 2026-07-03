@php
    $heading = $data['heading'] ?? '';
    $features = $data['features'] ?? [];
    $button_text = $data['button_text'] ?? '';
    $button_url = $data['button_url'] ?? '';
    $button_subtext = $data['button_subtext'] ?? '';
    $padding_top = $data['padding_top'] ?? '100px';
    $padding_bottom = $data['padding_bottom'] ?? '100px';
@endphp
<!-- Section start -->
<div id="main_features" class="main-features section panel overflow-hidden" style="padding-top: {{ $padding_top }}; padding-bottom: {{ $padding_bottom }};">
    <div class="section-outer panel py-6 sm:py-8 xl:py-10 lg:mx-2 rounded-bottom-2 xl:rounded-bottom-3 bg-secondary dark:bg-gray-800">
        <div class="container">
            <div class="section-inner panel">
                @if($heading)
                    <div class="section-heading panel vstack items-center gap-2 xl:gap-3 mb-6 sm:mb-8 xl:mb-9 max-w-700px mx-auto text-center" data-anime="onview: -100; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500; delay: anime.stagger(100, {start: 200});">
                        <h2 class="h3 sm:h2 xl:h1 m-0">{!! $heading !!}</h2>
                    </div>
                @endif
                <div class="section-content panel">
                    <div class="row child-cols-12 md:child-cols-6 col-match g-2 lg:g-4" data-anime="onview: -200; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500; delay: anime.stagger(100, {start: 200});">
                        @if(!empty($features))
                            @foreach($features as $feature)
                                <div>
                                    <div class="feature-item panel overflow-hidden p-2 bg-white border border-1 dark:bg-opacity-5 dark:text-white rounded-2 xl:rounded-3">
                                        <div class="panel vstack items-start gap-1 xl:gap-2 p-1 pb-2 lg:p-3 xl:p-4">
                                            @if(!empty($feature['title']))
                                                <h4 class="h4 xl:h3 m-0 text-inherit">{{ $feature['title'] }}</h4>
                                            @endif
                                            @if(!empty($feature['description']))
                                                <p class="fs-6 xl:fs-5 text-gray-400 dark:text-gray-200">{{ $feature['description'] }}</p>
                                            @endif
                                        </div>
                                        <div class="panel">
                                            @if(!empty($feature['feature_image']))
                                                @php
                                                    $feature_img = get_attachment_image_by_id($feature['feature_image']);
                                                @endphp
                                                <img class="rounded-2" src="{{ $feature_img['img_url'] ?? '' }}" alt="{{ $feature['title'] ?? 'Feature' }}">
                                            @else
                                                <img class="rounded-2" src="{{ asset('themes/lexend-v4/assets/images/features/home-13-feature-01.png') }}" alt="Feature">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            {{-- Default features if none configured --}}
                            <div>
                                <div class="feature-item panel overflow-hidden p-2 bg-white border border-1 dark:bg-opacity-5 dark:text-white rounded-2 xl:rounded-3">
                                    <div class="panel vstack items-start gap-1 xl:gap-2 p-1 pb-2 lg:p-3 xl:p-4">
                                        <h4 class="h4 xl:h3 m-0 text-inherit">Advanced Analytics</h4>
                                        <p class="fs-6 xl:fs-5 text-gray-400 dark:text-gray-200">Gain insights into your productivity patterns with customizable dashboards.</p>
                                    </div>
                                    <div class="panel">
                                        <img class="rounded-2" src="{{ asset('themes/lexend-v4/assets/images/features/home-13-feature-01.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="feature-item panel overflow-hidden p-2 bg-white border border-1 dark:bg-opacity-5 dark:text-white rounded-2 xl:rounded-3">
                                    <div class="panel vstack items-start gap-1 xl:gap-2 p-1 pb-2 lg:p-3 xl:p-4">
                                        <h4 class="h4 xl:h3 m-0 text-inherit">Seamless Integrations</h4>
                                        <p class="fs-6 xl:fs-5 text-gray-400 dark:text-gray-200">Connect with over 100+ tools you already use without switching contexts.</p>
                                    </div>
                                    <div class="panel">
                                        <img class="rounded-2" src="{{ asset('themes/lexend-v4/assets/images/features/home-13-feature-02.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="feature-item panel overflow-hidden p-2 bg-white border border-1 dark:bg-opacity-5 dark:text-white rounded-2 xl:rounded-3">
                                    <div class="panel vstack items-start gap-1 xl:gap-2 p-1 pb-2 lg:p-3 xl:p-4">
                                        <h4 class="h4 xl:h3 m-0 text-inherit">Team Collaboration</h4>
                                        <p class="fs-6 xl:fs-5 text-gray-400 dark:text-gray-200">Real-time collaboration tools that keep everyone in sync, no matter where they.</p>
                                    </div>
                                    <div class="panel">
                                        <img class="rounded-2" src="{{ asset('themes/lexend-v4/assets/images/features/home-13-feature-03.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="feature-item panel overflow-hidden p-2 bg-white border border-1 dark:bg-opacity-5 dark:text-white rounded-2 xl:rounded-3">
                                    <div class="panel vstack items-start gap-1 xl:gap-2 p-1 pb-2 lg:p-3 xl:p-4">
                                        <h4 class="h4 xl:h3 m-0 text-inherit">Automate Payments</h4>
                                        <p class="fs-6 xl:fs-5 text-gray-400 dark:text-gray-200">Automate routine payments and bills with our intuitive and secure payment system.</p>
                                    </div>
                                    <div class="panel">
                                        <img class="rounded-2" src="{{ asset('themes/lexend-v4/assets/images/features/home-13-feature-04.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                @if($button_text && $button_url)
                    <div class="section-footer panel vstack gap-2 items-center mt-6 sm:mt-8 xl:mt-9" data-anime="translateY: [24, 0]; opacity: [0, 1]; easing: easeOutExpo; duration: 750; delay: 750;">
                        <a href="{{ $button_url }}" class="btn btn-md xl:btn-lg btn-primary dark:bg-quaternary dark:border-quaternary dark:text-dark fs-6 rounded-pill px-5 lg:px-7 w-auto">
                            <span>{{ $button_text }}</span>
                        </a>
                        @if($button_subtext)
                            <span class="fs-7 dark:text-white text-opacity-75">{{ $button_subtext }}</span>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Section end -->



