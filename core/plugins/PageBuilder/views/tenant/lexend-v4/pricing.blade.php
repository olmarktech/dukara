@php
    $heading = $data['heading'] ?? '';
    $pricing_plans = $data['pricing_plans'] ?? [];
    $disclaimer_text = $data['disclaimer_text'] ?? '';
    $padding_top = !empty($data['padding_top']) ? $data['padding_top'] : '80px';
    $padding_bottom = !empty($data['padding_bottom']) ? $data['padding_bottom'] : '80px';
@endphp
<!-- Section start -->
<div id="pricing" class="pricing section panel overflow-hidden" style="padding-top: {{ $padding_top }}; padding-bottom: {{ $padding_bottom }};">
    <div class="section-outer panel py-6 sm:py-8 xl:py-10">
        <div class="container">
            <div class="section-inner panel" data-anime="onview: -200; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500; delay: anime.stagger(100, {start: 200});">
                @if($heading)
                    <div class="section-heading panel vstack items-center gap-2 xl:gap-3 mb-4 sm:mb-6 xl:mb-9 max-w-700px mx-auto text-center">
                        <h2 class="h3 sm:h2 xl:h1 m-0">{{ $heading }}</h2>
                    </div>
                @endif
                <div class="section-content panel">
                    <div class="swiper overflow-unset lg:overflow-hidden" data-uc-swiper="items: 1.05; gap: 8; active: 1; center: true; center-bounds: true;" data-uc-swiper-s="items: 2.1; gap: 16;" data-uc-swiper-m="items: 3; gap: 16;" data-uc-swiper-l="items: 3; gap: 24;">
                        <div class="swiper-wrapper">
                            @if(!empty($pricing_plans))
                                @foreach($pricing_plans as $index => $plan)
                                    <div class="swiper-slide">
                                        <div class="pricing-box panel p-3 sm:px-3 sm:py-6 xl:px-5 xl:py-8 vstack items-start rounded-1-5 lg:rounded-2 xl:rounded-3 {{ $plan['is_popular'] ? 'bg-gray-800 text-white dark:text-dark shadow-xs' : 'bg-white dark:bg-opacity-5 text-dark shadow-xs' }}">
                                            @if($plan['is_popular'])
                                                <div class="pricing-box-title hstack gap-1 mb-narrow">
                                                    <span class="fs-3 ft-secondary fw-bold text-white dark:text-dark">{{ $plan['plan_name'] ?? 'Plan' }}</span>
                                                    <span class="fs-7 py-narrow px-2 rounded-pill bg-yellow text-dark">Most Popular</span>
                                                </div>
                                            @else
                                                <span class="pricing-box-title fs-3 ft-secondary fw-bold mb-narrow dark:text-white">{{ $plan['plan_name'] ?? 'Plan' }}</span>
                                            @endif
                                            @if(!empty($plan['plan_description']))
                                                <p class="pricing-box-desc fs-7 {{ $plan['is_popular'] ? 'text-white dark:text-dark opacity-70' : 'dark:text-white opacity-70' }}">{{ $plan['plan_description'] }}</p>
                                            @endif
                                            <div class="pricing-box-price hstack gap-narrow items-end mt-3">
                                                <h4 class="price h1 lg:display-6 xl:display-5 m-0 {{ $plan['is_popular'] ? 'text-white dark:text-dark' : 'dark:text-white' }}">${{ $plan['plan_price'] ?? '0' }}</h4>
                                                <span class="duration fs-7 {{ $plan['is_popular'] ? 'text-white dark:text-dark opacity-70' : 'dark:text-white opacity-70' }} mb-1">{{ $plan['plan_duration'] ?? '/mo' }}</span>
                                            </div>
                                            @if(!empty($plan['button_text']) && !empty($plan['button_url']))
                                                <div class="pricing-box-cta vstack gap-1 justify-center text-center my-4">
                                                    <a href="{{ $plan['button_url'] }}" class="btn btn-md xl:btn-lg {{ $plan['is_popular'] ? 'btn-primary' : 'btn-outline-dark dark:text-white dark:hover:text-dark dark:hover:bg-white border' }} rounded-pill">{{ $plan['button_text'] }}</a>
                                                    @if(!empty($plan['button_subtext']))
                                                        <span class="fs-7 {{ $plan['is_popular'] ? 'text-white dark:text-dark opacity-70' : 'dark:text-white opacity-70' }}">{{ $plan['button_subtext'] }}</span>
                                                    @endif
                                                </div>
                                            @endif
                                            @if(!empty($plan['features']))
                                                <ul class="nav-y gap-1 fs-7 xl:fs-6 {{ $plan['is_popular'] ? 'text-white dark:text-dark' : 'dark:text-white' }}">
                                                    @foreach($plan['features'] as $feature)
                                                        <li class="row child-cols items-start g-1">
                                                            <div class="col-auto">
                                                                <img src="{{ asset('themes/lexend-v4/assets/images/vectors/check.svg') }}" alt="icon" style="padding-top: 2px;">
                                                            </div>
                                                            <div>
                                                                <span>{{ $feature['feature_text'] ?? '' }}</span>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                {{-- Default pricing plans --}}
                                <div class="swiper-slide">
                                    <div class="pricing-box panel p-3 sm:px-3 sm:py-6 xl:px-5 xl:py-8 vstack items-start rounded-1-5 lg:rounded-2 bg-white dark:bg-opacity-5 text-dark shadow-xs">
                                        <span class="pricing-box-title fs-3 ft-secondary fw-bold mb-narrow dark:text-white">Free</span>
                                        <p class="pricing-box-desc fs-7 dark:text-white opacity-70">Basic features and reporting.</p>
                                        <div class="pricing-box-price hstack gap-narrow items-end mt-3">
                                            <h4 class="price h1 lg:display-6 xl:display-5 m-0 dark:text-white">$0</h4>
                                            <span class="duration fs-7 dark:text-white opacity-70 mb-1">/mo</span>
                                        </div>
                                        <div class="pricing-box-cta vstack gap-1 justify-center text-center my-4">
                                            <a href="#" class="btn btn-md xl:btn-lg btn-outline-dark dark:text-white dark:hover:text-dark dark:hover:bg-white border rounded-pill">Start for free</a>
                                            <span class="fs-7 dark:text-white opacity-70">No credit card required!</span>
                                        </div>
                                        <ul class="nav-y gap-1 fs-7 xl:fs-6 dark:text-white">
                                            <li class="row child-cols items-start g-1">
                                                <div class="col-auto">
                                                    <img src="{{ asset('themes/lexend-v4/assets/images/vectors/check.svg') }}" alt="icon" style="padding-top: 2px;">
                                                </div>
                                                <div>
                                                    <span>Unlimited transcription</span>
                                                </div>
                                            </li>
                                            <li class="row child-cols items-start g-1">
                                                <div class="col-auto">
                                                    <img src="{{ asset('themes/lexend-v4/assets/images/vectors/check.svg') }}" alt="icon" style="padding-top: 2px;">
                                                </div>
                                                <div>
                                                    <span>Limited AI Summaries</span>
                                                </div>
                                            </li>
                                            <li class="row child-cols items-start g-1">
                                                <div class="col-auto">
                                                    <img src="{{ asset('themes/lexend-v4/assets/images/vectors/check.svg') }}" alt="icon" style="padding-top: 2px;">
                                                </div>
                                                <div>
                                                    <span>800 mins storage</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="pricing-box panel p-3 sm:px-3 sm:py-6 xl:px-5 xl:py-8 vstack items-start rounded-1-5 lg:rounded-2 text-white dark:text-dark shadow-xs bg-gray-800 dark:bg-secondary">
                                        <div class="pricing-box-title hstack gap-1 mb-narrow">
                                            <span class="fs-3 ft-secondary fw-bold text-white dark:text-dark">Business</span>
                                            <span class="fs-7 py-narrow px-2 rounded-pill bg-yellow text-dark">Most Popular</span>
                                        </div>
                                        <p class="pricing-box-desc fs-7 text-white dark:text-dark opacity-70">Manage your fast growing team or business</p>
                                        <div class="pricing-box-price hstack gap-narrow items-end mt-3">
                                            <h4 class="price h1 lg:display-6 xl:display-5 m-0 text-white dark:text-dark">$49</h4>
                                            <span class="duration fs-7 text-opacity-70 mb-1">/mo</span>
                                        </div>
                                        <div class="pricing-box-cta vstack gap-1 justify-center text-center my-4">
                                            <a href="#" class="btn btn-md xl:btn-lg btn-primary rounded-pill">Start a free trial</a>
                                            <span class="fs-7 text-white dark:text-dark opacity-70">No credit card required.</span>
                                        </div>
                                        <ul class="nav-y gap-1 fs-7 xl:fs-6 text-white dark:text-dark">
                                            <li class="row child-cols items-start g-1">
                                                <div class="col-auto">
                                                    <img src="{{ asset('themes/lexend-v4/assets/images/vectors/check.svg') }}" alt="icon" style="padding-top: 2px;">
                                                </div>
                                                <div>
                                                    <span>Unlimited transcription</span>
                                                </div>
                                            </li>
                                            <li class="row child-cols items-start g-1">
                                                <div class="col-auto">
                                                    <img src="{{ asset('themes/lexend-v4/assets/images/vectors/check.svg') }}" alt="icon" style="padding-top: 2px;">
                                                </div>
                                                <div>
                                                    <span>Limited AI Summaries</span>
                                                </div>
                                            </li>
                                            <li class="row child-cols items-start g-1">
                                                <div class="col-auto">
                                                    <img src="{{ asset('themes/lexend-v4/assets/images/vectors/check.svg') }}" alt="icon" style="padding-top: 2px;">
                                                </div>
                                                <div>
                                                    <span>800 mins storage</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="pricing-box panel p-3 sm:px-3 sm:py-6 xl:px-5 xl:py-8 vstack items-start rounded-1-5 lg:rounded-2 bg-white dark:bg-opacity-5 text-dark shadow-xs">
                                        <div class="pricing-box-title hstack gap-1 mb-narrow">
                                            <span class="fs-3 ft-secondary fw-bold dark:text-white">Enterprise</span>
                                            <span class="fs-7 py-narrow px-2 rounded-pill bg-quaternary">40% Off</span>
                                        </div>
                                        <p class="pricing-box-desc fs-7 dark:text-white opacity-70">For advanced security. control & support</p>
                                        <div class="pricing-box-price hstack gap-narrow items-end mt-3">
                                            <h4 class="price h1 lg:display-6 xl:display-5 m-0 dark:text-white">$79</h4>
                                            <span class="duration fs-7 dark:text-white opacity-70 mb-1">/mo</span>
                                        </div>
                                        <div class="pricing-box-cta vstack gap-1 justify-center text-center my-4">
                                            <a href="#" class="btn btn-md xl:btn-lg btn-outline-dark dark:text-white dark:hover:text-dark dark:hover:bg-white border rounded-pill">Get in touch</a>
                                            <span class="fs-7 dark:text-white opacity-70">Let's make it fit for you!</span>
                                        </div>
                                        <ul class="nav-y gap-1 fs-7 xl:fs-6 dark:text-white">
                                            <li class="row child-cols items-start g-1">
                                                <div class="col-auto">
                                                    <img src="{{ asset('themes/lexend-v4/assets/images/vectors/check.svg') }}" alt="icon" style="padding-top: 2px;">
                                                </div>
                                                <div>
                                                    <span>Unlimited transcription</span>
                                                </div>
                                            </li>
                                            <li class="row child-cols items-start g-1">
                                                <div class="col-auto">
                                                    <img src="{{ asset('themes/lexend-v4/assets/images/vectors/check.svg') }}" alt="icon" style="padding-top: 2px;">
                                                </div>
                                                <div>
                                                    <span>Limited AI Summaries</span>
                                                </div>
                                            </li>
                                            <li class="row child-cols items-start g-1">
                                                <div class="col-auto">
                                                    <img src="{{ asset('themes/lexend-v4/assets/images/vectors/check.svg') }}" alt="icon" style="padding-top: 2px;">
                                                </div>
                                                <div>
                                                    <span>800 mins storage</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @if($disclaimer_text)
                    <div class="section-footer panel vstack gap-2 items-center text-center mt-4 sm:mt-6">
                        <span class="fs-7 xl:fs-6 ft-script text-gray-500 dark:text-gray-200">{{ $disclaimer_text }}</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Section end -->



