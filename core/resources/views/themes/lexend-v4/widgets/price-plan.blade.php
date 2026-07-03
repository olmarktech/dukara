@php
    // Pricing Plans - EXACT from page-pricing.html line 746-883
    $all_price_plan = $data['all_price_plan'] ?? [];
    $plan_types = $data['plan_types'] ?? collect();
    $monthly_text = 'Monthly';
    $yearly_text = 'Yearly';
    
    // Normalize array keys to integers for proper matching (keep Eloquent models intact)
    $normalized_price_plan = [];
    foreach ($all_price_plan as $key => $value) {
        $normalized_price_plan[(int) $key] = $value;
    }
    $all_price_plan = $normalized_price_plan;
@endphp

<!-- Section start -->
<div class="section panel overflow-hidden">
    <div class="section-outer panel pb-6 lg:pb-9">
        <div class="container max-w-xl">
            <div class="section-inner panel">
                <ul class="uc-switcher pricing-switcher">
                    @if($plan_types->count() > 1 && !empty($all_price_plan))
                        @foreach($plan_types as $type_index => $plan_type)
                            @php
                                $plan_type = (int) $plan_type; // Ensure integer type
                            @endphp
                            <li>
                                <div class="row child-cols-12 sm:child-cols-6 xl:child-cols-4 col-match justify-center g-2 lg:g-4" data-anime="onview: -100; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 400});">
                                    @if(!empty($all_price_plan[$plan_type]) && is_array($all_price_plan[$plan_type]) && count($all_price_plan[$plan_type]) > 0)
                                        @foreach($all_price_plan[$plan_type] as $index => $plan)
                                            @php
                                                $is_popular = !empty($plan->package_badge) || $index == 1; // Middle card or has badge
                                                // Get plan features - handle both Eloquent and array cases
                                                $plan_features = $plan->plan_features ?? collect();
                                                if (!($plan_features instanceof \Illuminate\Support\Collection)) {
                                                    $plan_features = collect($plan_features);
                                                }
                                                $first_feature_label = $index === 0 ? 'Key features:' : ($index === 1 ? 'Everything in Essentials, plus:' : 'Everything in Business, plus:');
                                            @endphp
                                            <div>
                                                <div class="tier panel vstack gap-2 xl:gap-4 px-3 py-4 sm:p-4 lg:p-6 rounded lg:rounded-2 bg-secondary dark:bg-gray-800 position-relative">
                                                    @if($is_popular && !empty($plan->package_badge))
                                                        <span class="position-absolute top-0 ltr:end-0 rtl:start-0 m-2 d-inline-flex py-narrow px-1 bg-primary rounded-1 text-white fs-7 fw-medium">{{ $plan->package_badge }}</span>
                                                    @elseif($is_popular && $index == 1)
                                                        <span class="position-absolute top-0 ltr:end-0 rtl:start-0 m-2 d-inline-flex py-narrow px-1 bg-primary rounded-1 text-white fs-7 fw-medium">Popular</span>
                                                    @endif
                                                    <div class="panel">
                                                        <h3 class="title h5 sm:h4 dark:text-white">{{ $plan->title }}</h3>
                                                        <p class="desc dark:text-white text-opacity-70 dark:opacity-80">{{ $plan->package_description ?? 'For your business needs' }}</p>
                                                    </div>
                                                    <div class="panel">
                                                        <div class="panel vstack gap-narrow">
                                                            @if($plan->price > 0)
                                                                <h5 class="title h3 sm:h2 m-0 dark:text-white">{{ amount_with_currency_symbol($plan->price) }}</h5>
                                                                <span class="fs-7 opacity-70">Seat per month{{ $plan_type == 0 ? ', 2 seats max' : '' }}</span>
                                                            @else
                                                                <h5 class="title h3 sm:h2 m-0 dark:text-white">Let's talk</h5>
                                                                <span class="fs-7 opacity-70">Per‑seat or per‑tool pricing</span>
                                                            @endif
                                                            <div class="vstack gap-1 justify-center text-center mt-3">
                                                                @if($plan->price > 0)
                                                                    <a href="{{ route('landlord.frontend.plan.order', $plan->id) }}" class="btn btn-md sm:btn-sm lg:btn-md btn-primary text-white">Start a free trial</a>
                                                                    <span class="fs-7 opacity-70 min-h-24px">No credit card required</span>
                                                                @else
                                                                    <a href="{{ route('landlord.dynamic.page', 'contact') }}" class="btn btn-md sm:btn-sm lg:btn-md btn-dark text-white dark:bg-white dark:text-dark dark:hover:bg-secondary">Contact sales</a>
                                                                    <span class="fs-7 opacity-70 min-h-24px">Respond within 24 hrs max</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel">
                                                        <div class="panel vstack gap-2">
                                                            <span class="fs-6 fw-bold dark:text-white">{{ $first_feature_label }}</span>
                                                            @if($plan_features->count() > 0)
                                                                @foreach($plan_features as $feature)
                                                                    @php
                                                                        $feat_status = is_object($feature) ? $feature->status : ($feature['status'] ?? 1);
                                                                        $feat_name = is_object($feature) ? $feature->feature_name : ($feature['feature_name'] ?? '');
                                                                    @endphp
                                                                    @if($feat_status)
                                                                        <div class="hstack gap-1 fs-7">
                                                                            <i class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                                            <span>{{ $feat_name }}</span>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                {{-- Fallback to default features if no plan_features --}}
                                                                @if($plan->page_permission_feature !== null)
                                                                    <div class="hstack gap-1 fs-7">
                                                                        <i class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                                        <span>{{ $plan->page_permission_feature < 0 ? __('Unlimited pages') : sprintf(__('%d pages'), $plan->page_permission_feature) }}</span>
                                                                    </div>
                                                                @endif
                                                                @if($plan->product_permission_feature !== null)
                                                                    <div class="hstack gap-1 fs-7">
                                                                        <i class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                                        <span>{{ $plan->product_permission_feature < 0 ? __('Unlimited products') : sprintf(__('%d products'), $plan->product_permission_feature) }}</span>
                                                                    </div>
                                                                @endif
                                                                @if($plan->blog_permission_feature !== null)
                                                                    <div class="hstack gap-1 fs-7">
                                                                        <i class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                                        <span>{{ $plan->blog_permission_feature < 0 ? __('Unlimited blog posts') : sprintf(__('%d blog posts'), $plan->blog_permission_feature) }}</span>
                                                                    </div>
                                                                @endif
                                                                @if($plan->storage_permission_feature !== null)
                                                                    <div class="hstack gap-1 fs-7">
                                                                        <i class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                                        <span>{{ $plan->storage_permission_feature < 0 ? __('Unlimited storage') : sprintf(__('%d MB storage'), $plan->storage_permission_feature) }}</span>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                    @if($is_popular && $index == 1)
                                                        <div class="position-absolute bottom-0 ltr:end-0 rtl:start-0 m-2 d-none md:d-block">
                                                            <img class="w-100px lg:w-128px d-block dark:d-none" src="{{ asset('themes/lexend-v4/assets/images/template/money.svg') }}" alt="money">
                                                            <img class="w-100px lg:w-128px d-none dark:d-block" src="{{ asset('themes/lexend-v4/assets/images/template/money-dark.svg') }}" alt="money-dark">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    @else
                        {{-- Single plan type (no switcher) --}}
                        @if(!empty($all_price_plan) && is_array($all_price_plan) && count($all_price_plan) > 0)
                            @foreach($all_price_plan as $plan_type => $plan_items)
                                @if(!empty($plan_items) && is_array($plan_items) && count($plan_items) > 0)
                                <li>
                                    <div class="row child-cols-12 sm:child-cols-6 xl:child-cols-4 col-match justify-center g-2 lg:g-4" data-anime="onview: -100; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 400});">
                                        @foreach($plan_items as $index => $plan)
                                            @php
                                                $is_popular = !empty($plan->package_badge) || $index == 1;
                                                // Get plan features - handle both Eloquent and array cases
                                                $plan_features = $plan->plan_features ?? collect();
                                                if (!($plan_features instanceof \Illuminate\Support\Collection)) {
                                                    $plan_features = collect($plan_features);
                                                }
                                                $first_feature_label = $index === 0 ? 'Key features:' : ($index === 1 ? 'Everything in Essentials, plus:' : 'Everything in Business, plus:');
                                            @endphp
                                            <div>
                                                <div class="tier panel vstack gap-2 xl:gap-4 px-3 py-4 sm:p-4 lg:p-6 rounded lg:rounded-2 bg-secondary dark:bg-gray-800 position-relative">
                                                    @if($is_popular && !empty($plan->package_badge))
                                                        <span class="position-absolute top-0 ltr:end-0 rtl:start-0 m-2 d-inline-flex py-narrow px-1 bg-primary rounded-1 text-white fs-7 fw-medium">{{ $plan->package_badge }}</span>
                                                    @elseif($is_popular && $index == 1)
                                                        <span class="position-absolute top-0 ltr:end-0 rtl:start-0 m-2 d-inline-flex py-narrow px-1 bg-primary rounded-1 text-white fs-7 fw-medium">Popular</span>
                                                    @endif
                                                    <div class="panel">
                                                        <h3 class="title h5 sm:h4 dark:text-white">{{ $plan->title }}</h3>
                                                        <p class="desc dark:text-white text-opacity-70 dark:opacity-80">{{ $plan->package_description ?? 'For your business needs' }}</p>
                                                    </div>
                                                    <div class="panel">
                                                        <div class="panel vstack gap-narrow">
                                                            @if($plan->price > 0)
                                                                <h5 class="title h3 sm:h2 m-0 dark:text-white">{{ amount_with_currency_symbol($plan->price) }}</h5>
                                                                <span class="fs-7 opacity-70">Seat per month</span>
                                                            @else
                                                                <h5 class="title h3 sm:h2 m-0 dark:text-white">Let's talk</h5>
                                                                <span class="fs-7 opacity-70">Per‑seat or per‑tool pricing</span>
                                                            @endif
                                                            <div class="vstack gap-1 justify-center text-center mt-3">
                                                                @if($plan->price > 0)
                                                                    <a href="{{ route('landlord.frontend.plan.order', $plan->id) }}" class="btn btn-md sm:btn-sm lg:btn-md btn-primary text-white">Start a free trial</a>
                                                                    <span class="fs-7 opacity-70 min-h-24px">No credit card required</span>
                                                                @else
                                                                    <a href="{{ route('landlord.dynamic.page', 'contact') }}" class="btn btn-md sm:btn-sm lg:btn-md btn-dark text-white dark:bg-white dark:text-dark dark:hover:bg-secondary">Contact sales</a>
                                                                    <span class="fs-7 opacity-70 min-h-24px">Respond within 24 hrs max</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel">
                                                        <div class="panel vstack gap-2">
                                                            <span class="fs-6 fw-bold dark:text-white">{{ $first_feature_label }}</span>
                                                            @if($plan_features->count() > 0)
                                                                @foreach($plan_features as $feature)
                                                                    @php
                                                                        $feat_status = is_object($feature) ? $feature->status : ($feature['status'] ?? 1);
                                                                        $feat_name = is_object($feature) ? $feature->feature_name : ($feature['feature_name'] ?? '');
                                                                    @endphp
                                                                    @if($feat_status)
                                                                        <div class="hstack gap-1 fs-7">
                                                                            <i class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                                            <span>{{ $feat_name }}</span>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                @if($plan->page_permission_feature !== null)
                                                                    <div class="hstack gap-1 fs-7">
                                                                        <i class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                                        <span>{{ $plan->page_permission_feature < 0 ? __('Unlimited pages') : sprintf(__('%d pages'), $plan->page_permission_feature) }}</span>
                                                                    </div>
                                                                @endif
                                                                @if($plan->product_permission_feature !== null)
                                                                    <div class="hstack gap-1 fs-7">
                                                                        <i class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                                        <span>{{ $plan->product_permission_feature < 0 ? __('Unlimited products') : sprintf(__('%d products'), $plan->product_permission_feature) }}</span>
                                                                    </div>
                                                                @endif
                                                                @if($plan->blog_permission_feature !== null)
                                                                    <div class="hstack gap-1 fs-7">
                                                                        <i class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                                        <span>{{ $plan->blog_permission_feature < 0 ? __('Unlimited blog posts') : sprintf(__('%d blog posts'), $plan->blog_permission_feature) }}</span>
                                                                    </div>
                                                                @endif
                                                                @if($plan->storage_permission_feature !== null)
                                                                    <div class="hstack gap-1 fs-7">
                                                                        <i class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                                        <span>{{ $plan->storage_permission_feature < 0 ? __('Unlimited storage') : sprintf(__('%d MB storage'), $plan->storage_permission_feature) }}</span>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                    @if($is_popular && $index == 1)
                                                        <div class="position-absolute bottom-0 ltr:end-0 rtl:start-0 m-2 d-none md:d-block">
                                                            <img class="w-100px lg:w-128px d-block dark:d-none" src="{{ asset('themes/lexend-v4/assets/images/template/money.svg') }}" alt="money">
                                                            <img class="w-100px lg:w-128px d-none dark:d-block" src="{{ asset('themes/lexend-v4/assets/images/template/money-dark.svg') }}" alt="money-dark">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </li>
                                @endif
                            @endforeach
                        @else
                            {{-- No pricing plans available --}}
                            <li>
                                <div class="text-center py-5">
                                    <p class="text-muted">{{ __('No pricing plans available at the moment.') }}</p>
                                </div>
                            </li>
                        @endif
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->
