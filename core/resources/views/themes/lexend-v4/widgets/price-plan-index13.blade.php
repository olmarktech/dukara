@php
    // Pricing Plans - EXACT from index-13.html line 1259-1437
    // Swiper slider style with different card design
    $title = $data['title'] ?? 'Scalable and affordable prices*';
    $all_price_plan = $data['all_price_plan'] ?? [];
    $plan_types = $data['plan_types'] ?? collect();
    
    // Normalize array keys to integers for proper matching (keep Eloquent models intact)
    $normalized_price_plan = [];
    foreach ($all_price_plan as $key => $value) {
        $normalized_price_plan[(int) $key] = $value;
    }
    $all_price_plan = $normalized_price_plan;
    
    // Get the first plan type's plans for display
    $first_plan_type = !empty($plan_types) ? (int)$plan_types->first() : 0;
    $display_plans = $all_price_plan[$first_plan_type] ?? [];
@endphp

<!-- Section start -->
<div id="pricing" class="pricing section panel overflow-hidden mx-1 lg:mx-2 mt-1 xl:mt-2 mb-2 rounded-2 xl:rounded-3 bg-secondary dark:bg-gray-800">
    <div class="section-outer panel py-6 sm:py-8 xl:py-10">
            <div class="container">
                <div class="section-inner panel" data-anime="onview: -200; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500; delay: anime.stagger(100, {start: 200});">
                    <div class="section-heading panel vstack items-center gap-2 xl:gap-3 mb-4 sm:mb-6 xl:mb-9 max-w-700px mx-auto text-center">
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
                            <h2 class="h3 sm:h2 xl:h1 m-0">{!! $final_title !!}</h2>
                        @endif
                    </div>
                    <div class="section-content panel">
                        <div class="swiper overflow-unset lg:overflow-hidden" data-uc-swiper="items: 1.05; gap: 8; active: 1; center: true; center-bounds: true;" data-uc-swiper-s="items: 2.1; gap: 16;" data-uc-swiper-m="items: 3; gap: 16;" data-uc-swiper-l="items: 3; gap: 24;">
                            <div class="swiper-wrapper">
                                @if(!empty($display_plans) && count($display_plans) > 0)
                                    @foreach($display_plans as $index => $plan)
                                        @php
                                            $is_popular = !empty($plan->package_badge) || $index == 1;
                                            // Get plan features - handle both Eloquent and array cases
                                            $plan_features = $plan->plan_features ?? collect();
                                            if (!($plan_features instanceof \Illuminate\Support\Collection)) {
                                                $plan_features = collect($plan_features);
                                            }
                                        @endphp
                                        <div class="swiper-slide">
                                            @if($is_popular && $index == 1)
                                                {{-- Middle card - Dark background --}}
                                                <div class="pricing-box panel p-3 sm:px-3 sm:py-6 xl:px-5 xl:py-8 vstack items-start rounded-1-5 lg:rounded-2 text-white dark:text-dark shadow-xs bg-gray-800 dark:bg-secondary">
                                                    <div class="pricing-box-title hstack gap-1 mb-narrow">
                                                        <span class="fs-3 ft-secondary fw-bold text-white dark:text-dark">{{ $plan->title }}</span>
                                                        @if(!empty($plan->package_badge))
                                                            <span class="fs-7 py-narrow px-2 rounded-pill bg-yellow text-dark">{{ $plan->package_badge }}</span>
                                                        @else
                                                            <span class="fs-7 py-narrow px-2 rounded-pill bg-yellow text-dark">{{ __('Most Popular') }}</span>
                                                        @endif
                                                    </div>
                                                    <p class="pricing-box-desc fs-7 text-white dark:text-dark opacity-70">{{ $plan->package_description ?? __('Manage your fast growing team or business') }}</p>
                                                    <div class="pricing-box-price hstack gap-narrow items-end mt-3">
                                                        <h4 class="price h1 lg:display-6 xl:display-5 m-0 text-white dark:text-dark">{{ amount_with_currency_symbol($plan->price) }}</h4>
                                                        <span class="duration fs-7 text-opacity-70 mb-1">/{{ __('mo') }}</span>
                                                    </div>
                                                    <div class="pricing-box-cta vstack gap-1 justify-center text-center my-4 w-100">
                                                        <a href="{{ route('landlord.frontend.plan.order', $plan->id) }}" class="btn btn-md xl:btn-lg btn-primary rounded-pill">{{ __('Start a free trial') }}</a>
                                                        <span class="fs-7 text-white dark:text-dark opacity-70">{{ __('No credit card required.') }}</span>
                                                    </div>
                                                    <ul class="nav-y gap-1 fs-7 xl:fs-6 text-white dark:text-dark">
                                                        @if($plan_features->count() > 0)
                                                            @foreach($plan_features as $feature)
                                                                @php
                                                                    $feat_status = is_object($feature) ? $feature->status : ($feature['status'] ?? 1);
                                                                    $feat_name = is_object($feature) ? $feature->feature_name : ($feature['feature_name'] ?? '');
                                                                @endphp
                                                                @if($feat_status)
                                                                    <li class="row child-cols items-start g-1">
                                                                        <div class="col-auto">
                                                                            <img src="{{ asset('themes/lexend-v4/assets/images/vectors/check.svg') }}" alt="icon" style="padding-top: 2px;">
                                                                        </div>
                                                                        <div>
                                                                            <span>{{ $feat_name }}</span>
                                                                        </div>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            @if($plan->page_permission_feature !== null)
                                                                <li class="row child-cols items-start g-1">
                                                                    <div class="col-auto"><img src="{{ asset('themes/lexend-v4/assets/images/vectors/check.svg') }}" alt="icon" style="padding-top: 2px;"></div>
                                                                    <div><span>{{ $plan->page_permission_feature < 0 ? __('Unlimited pages') : sprintf(__('%d pages'), $plan->page_permission_feature) }}</span></div>
                                                                </li>
                                                            @endif
                                                            @if($plan->product_permission_feature !== null)
                                                                <li class="row child-cols items-start g-1">
                                                                    <div class="col-auto"><img src="{{ asset('themes/lexend-v4/assets/images/vectors/check.svg') }}" alt="icon" style="padding-top: 2px;"></div>
                                                                    <div><span>{{ $plan->product_permission_feature < 0 ? __('Unlimited products') : sprintf(__('%d products'), $plan->product_permission_feature) }}</span></div>
                                                                </li>
                                                            @endif
                                                            @if($plan->storage_permission_feature !== null)
                                                                <li class="row child-cols items-start g-1">
                                                                    <div class="col-auto"><img src="{{ asset('themes/lexend-v4/assets/images/vectors/check.svg') }}" alt="icon" style="padding-top: 2px;"></div>
                                                                    <div><span>{{ $plan->storage_permission_feature < 0 ? __('Unlimited storage') : sprintf(__('%d MB storage'), $plan->storage_permission_feature) }}</span></div>
                                                                </li>
                                                            @endif
                                                        @endif
                                                    </ul>
                                                </div>
                                            @else
                                                {{-- Other cards - Light background --}}
                                                <div class="pricing-box panel p-3 sm:px-3 sm:py-6 xl:px-5 xl:py-8 vstack items-start rounded-1-5 lg:rounded-2 bg-white dark:bg-opacity-5 text-dark shadow-xs">
                                                    @if(!empty($plan->package_badge) && $index != 1)
                                                        <div class="pricing-box-title hstack gap-1 mb-narrow">
                                                            <span class="fs-3 ft-secondary fw-bold dark:text-white">{{ $plan->title }}</span>
                                                            <span class="fs-7 py-narrow px-2 rounded-pill bg-quaternary">{{ $plan->package_badge }}</span>
                                                        </div>
                                                    @else
                                                        <span class="pricing-box-title fs-3 ft-secondary fw-bold mb-narrow dark:text-white">{{ $plan->title }}</span>
                                                    @endif
                                                    <p class="pricing-box-desc fs-7 dark:text-white opacity-70">{{ $plan->package_description ?? __('Basic features and reporting.') }}</p>
                                                    <div class="pricing-box-price hstack gap-narrow items-end mt-3">
                                                        @if($plan->price > 0)
                                                            <h4 class="price h1 lg:display-6 xl:display-5 m-0 dark:text-white">{{ amount_with_currency_symbol($plan->price) }}</h4>
                                                            <span class="duration fs-7 dark:text-white opacity-70 mb-1">/{{ __('mo') }}</span>
                                                        @else
                                                            <h4 class="price h1 lg:display-6 xl:display-5 m-0 dark:text-white">{{ __('Free') }}</h4>
                                                        @endif
                                                    </div>
                                                    <div class="pricing-box-cta vstack gap-1 justify-center text-center my-4 w-100">
                                                        @if($plan->price > 0)
                                                            <a href="{{ route('landlord.frontend.plan.order', $plan->id) }}" class="btn btn-md xl:btn-lg btn-outline-dark dark:text-white dark:hover:text-dark dark:hover:bg-white border rounded-pill">{{ $index == 2 ? __('Get in touch') : __('Start for free') }}</a>
                                                        @else
                                                            <a href="{{ route('landlord.frontend.plan.order', $plan->id) }}" class="btn btn-md xl:btn-lg btn-outline-dark dark:text-white dark:hover:text-dark dark:hover:bg-white border rounded-pill">{{ __('Start for free') }}</a>
                                                        @endif
                                                        <span class="fs-7 dark:text-white opacity-70">{{ __('No credit card required!') }}</span>
                                                    </div>
                                                    <ul class="nav-y gap-1 fs-7 xl:fs-6 dark:text-white">
                                                        @if($plan_features->count() > 0)
                                                            @foreach($plan_features as $feature)
                                                                @php
                                                                    $feat_status = is_object($feature) ? $feature->status : ($feature['status'] ?? 1);
                                                                    $feat_name = is_object($feature) ? $feature->feature_name : ($feature['feature_name'] ?? '');
                                                                @endphp
                                                                @if($feat_status)
                                                                    <li class="row child-cols items-start g-1">
                                                                        <div class="col-auto">
                                                                            <img src="{{ asset('themes/lexend-v4/assets/images/vectors/check.svg') }}" alt="icon" style="padding-top: 2px;">
                                                                        </div>
                                                                        <div>
                                                                            <span>{{ $feat_name }}</span>
                                                                        </div>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            @if($plan->page_permission_feature !== null)
                                                                <li class="row child-cols items-start g-1">
                                                                    <div class="col-auto"><img src="{{ asset('themes/lexend-v4/assets/images/vectors/check.svg') }}" alt="icon" style="padding-top: 2px;"></div>
                                                                    <div><span>{{ $plan->page_permission_feature < 0 ? __('Unlimited pages') : sprintf(__('%d pages'), $plan->page_permission_feature) }}</span></div>
                                                                </li>
                                                            @endif
                                                            @if($plan->product_permission_feature !== null)
                                                                <li class="row child-cols items-start g-1">
                                                                    <div class="col-auto"><img src="{{ asset('themes/lexend-v4/assets/images/vectors/check.svg') }}" alt="icon" style="padding-top: 2px;"></div>
                                                                    <div><span>{{ $plan->product_permission_feature < 0 ? __('Unlimited products') : sprintf(__('%d products'), $plan->product_permission_feature) }}</span></div>
                                                                </li>
                                                            @endif
                                                            @if($plan->storage_permission_feature !== null)
                                                                <li class="row child-cols items-start g-1">
                                                                    <div class="col-auto"><img src="{{ asset('themes/lexend-v4/assets/images/vectors/check.svg') }}" alt="icon" style="padding-top: 2px;"></div>
                                                                    <div><span>{{ $plan->storage_permission_feature < 0 ? __('Unlimited storage') : sprintf(__('%d MB storage'), $plan->storage_permission_feature) }}</span></div>
                                                                </li>
                                                            @endif
                                                        @endif
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="section-footer panel vstack gap-2 items-center text-center mt-4 sm:mt-6">
                        <span class="fs-7 xl:fs-6 ft-script text-gray-500 dark:text-gray-200">{{ __('Prices are subject to change at any time and under any circumstances, and discounts are only temporary.') }}</span>
                    </div>
                </div>
            </div>
    </div>
</div>
<!-- Section end -->

