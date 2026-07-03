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
<div id="key_features" class="key-features section panel overflow-hidden" style="padding-top: {{ $padding_top }}; padding-bottom: {{ $padding_bottom }};">
    <div class="section-outer panel py-6 sm:py-8 xl:py-10 lg:mx-2 mt-2">
        <div class="position-absolute top-0 start-0 end-0 w-100 h-100 bg-gradient-45n from-quaternary to-tertiary rounded-2 xl:rounded-3 dark:d-none"></div>
        <div class="container">
            <div class="section-inner panel">
                @if($heading)
                    <div class="section-heading panel vstack items-center gap-2 xl:gap-3 mb-4 sm:mb-6 xl:mb-9 max-w-700px mx-auto text-center" data-anime="onview: -200; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500; delay: anime.stagger(100, {start: 200});">
                        <h2 class="h3 sm:h2 xl:h1 m-0">{{ $heading }}</h2>
                    </div>
                @endif
                <div class="section-content panel">
                    <div class="row child-cols-12 sm:child-cols-6 lg:child-cols-4 col-match g-2 lg:g-3 xl:g-4" data-anime="onview: -200; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500; delay: anime.stagger(100, {start: 200});">
                        @if(!empty($features))
                            @foreach($features as $feature)
                                <div>
                                    <div class="features-item vstack justify-between gap-4 px-3 py-4 xl:p-5 rounded-2 bg-white dark:bg-opacity-5">
                                        @if(!empty($feature['feature_icon']))
                                            <div class="icon-box">
                                                @php
                                                    $icon_img = get_attachment_image_by_id($feature['feature_icon']);
                                                @endphp
                                                <img class="w-48px h-48px text-primary dark:text-quaternary" src="{{ $icon_img['img_url'] ?? '' }}" alt="feature-icon" data-uc-svg>
                                            </div>
                                        @else
                                            <div class="icon-box">
                                                <img class="w-48px h-48px text-primary dark:text-quaternary" src="{{ asset('themes/lexend-v4/assets/images/custom-icons/home-13-icon-01.svg') }}" alt="feature-icon" data-uc-svg>
                                            </div>
                                        @endif
                                        <div class="panel">
                                            <div class="vstack gap-1">
                                                @if(!empty($feature['title']))
                                                    <h3 class="title h5 lg:h4 m-0">{{ $feature['title'] }}</h3>
                                                @endif
                                                @if(!empty($feature['description']))
                                                    <p class="desc fs-6 text-gray-400 dark:text-gray-200">{{ $feature['description'] }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            {{-- Default key features if none configured --}}
                            <div>
                                <div class="features-item vstack justify-between gap-4 px-3 py-4 xl:p-5 rounded-2 bg-white dark:bg-opacity-5">
                                    <div class="icon-box">
                                        <img class="w-48px h-48px text-primary dark:text-quaternary" src="{{ asset('themes/lexend-v4/assets/images/custom-icons/home-13-icon-01.svg') }}" alt="feature-icon" data-uc-svg>
                                    </div>
                                    <div class="panel">
                                        <div class="vstack gap-1">
                                            <h3 class="title h5 lg:h4 m-0">Smart Automation</h3>
                                            <p class="desc fs-6 text-gray-400 dark:text-gray-200">Automate routine tasks and workflows with our intuitive drag-and-drop builder.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="features-item vstack justify-between gap-4 px-3 py-4 xl:p-5 rounded-2 bg-white dark:bg-opacity-5">
                                    <div class="icon-box">
                                        <img class="w-48px h-48px text-primary dark:text-quaternary" src="{{ asset('themes/lexend-v4/assets/images/custom-icons/home-13-icon-02.svg') }}" alt="feature-icon" data-uc-svg>
                                    </div>
                                    <div class="panel">
                                        <div class="vstack gap-1">
                                            <h3 class="title h5 lg:h4 m-0">Team Collaboration</h3>
                                            <p class="desc fs-6 text-gray-400 dark:text-gray-200">Real-time collaboration tools that keep everyone in sync, no matter they where.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="features-item vstack justify-between gap-4 px-3 py-4 xl:p-5 rounded-2 bg-white dark:bg-opacity-5">
                                    <div class="icon-box">
                                        <img class="w-48px h-48px text-primary dark:text-quaternary" src="{{ asset('themes/lexend-v4/assets/images/custom-icons/home-13-icon-03.svg') }}" alt="feature-icon" data-uc-svg>
                                    </div>
                                    <div class="panel">
                                        <div class="vstack gap-1">
                                            <h3 class="title h5 lg:h4 m-0">Advanced Analytics</h3>
                                            <p class="desc fs-6 text-gray-400 dark:text-gray-200">Gain insights into your productivity patterns with customizable dashboards.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="features-item vstack justify-between gap-4 px-3 py-4 xl:p-5 rounded-2 bg-white dark:bg-opacity-5">
                                    <div class="icon-box">
                                        <img class="w-48px h-48px text-primary dark:text-quaternary" src="{{ asset('themes/lexend-v4/assets/images/custom-icons/home-13-icon-04.svg') }}" alt="feature-icon" data-uc-svg>
                                    </div>
                                    <div class="panel">
                                        <div class="vstack gap-1">
                                            <h3 class="title h5 lg:h4 m-0">Seamless Integrations</h3>
                                            <p class="desc fs-6 text-gray-400 dark:text-gray-200">Connect with over 100+ tools you already use without switching contexts.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="features-item vstack justify-between gap-4 px-3 py-4 xl:p-5 rounded-2 bg-white dark:bg-opacity-5">
                                    <div class="icon-box">
                                        <img class="w-48px h-48px text-primary dark:text-quaternary" src="{{ asset('themes/lexend-v4/assets/images/custom-icons/home-13-icon-05.svg') }}" alt="feature-icon" data-uc-svg>
                                    </div>
                                    <div class="panel">
                                        <div class="vstack gap-1">
                                            <h3 class="title h5 lg:h4 m-0">Enterprise Security</h3>
                                            <p class="desc fs-6 text-gray-400 dark:text-gray-200">Bank-level encryption and compliance features to keep your data secure.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="features-item vstack justify-between gap-4 px-3 py-4 xl:p-5 rounded-2 bg-white dark:bg-opacity-5">
                                    <div class="icon-box">
                                        <img class="w-48px h-48px text-primary dark:text-quaternary" src="{{ asset('themes/lexend-v4/assets/images/custom-icons/home-13-icon-06.svg') }}" alt="feature-icon" data-uc-svg>
                                    </div>
                                    <div class="panel">
                                        <div class="vstack gap-1">
                                            <h3 class="title h5 lg:h4 m-0">Global Encryption</h3>
                                            <p class="desc fs-6 text-gray-400 dark:text-gray-200">Bank-level encryption and compliance features to keep your data secure.</p>
                                        </div>
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
                            <span class="fs-7 text-gray-900 dark:text-white">{{ $button_subtext }}</span>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Section end -->



