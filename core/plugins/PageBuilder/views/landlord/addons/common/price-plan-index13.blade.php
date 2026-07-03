@php
    $title = $data['title'] ?? '';
    $subtitle = $data['subtitle'] ?? '';
    $disclaimer_text = $data['disclaimer_text'] ?? '';
    
    // Process highlighted text
    if (str_contains($title, '{h}') && str_contains($title, '{/h}')) {
        $text = explode('{h}', $title);
        $highlighted_word = explode('{/h}', $text[1])[0];
        $title = str_replace('{h}'.$highlighted_word.'{/h}', '<span class="text-primary">'.$highlighted_word.'</span>', $title);
    }
@endphp

<section class="uni-pricing py-6 xl:py-8" id="{{$data['section_id'] ?? 'pricing'}}">
    <div class="container max-w-xl" data-anime="onview: -200; translateY: [48, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500;">
        <div class="section-header text-center mb-6 xl:mb-8">
            <h2 class="h3 lg:h2 m-0">
                {!! $title !!}
            </h2>
            @if(!empty($subtitle))
                <p class="fs-5 lg:fs-4 text-opacity-70 mt-2">{{ $subtitle }}</p>
            @endif
        </div>

        @if(count($data['plan_types'] ?? []) > 1)
        <div class="pricing-tabs text-center mb-5">
            <ul class="nav nav-pills justify-content-center gap-2" role="tablist">
                @foreach(($data['plan_types']) as $type)
                    @php
                        $type_data_tab = match ((int)$type) {
                            0 => 'monthly',
                            1 => 'yearly',
                            2 => 'lifetime',
                            default => 'monthly'
                        };
                    @endphp
                    <li class="nav-item" role="presentation">
                        <button class="nav-link btn btn-sm {{ $loop->first ? 'active btn-primary' : 'btn-outline-primary' }}" 
                                id="{{$type_data_tab}}-tab" 
                                data-bs-toggle="pill" 
                                data-bs-target="#{{$type_data_tab}}" 
                                type="button" 
                                role="tab">
                            {{ \App\Enums\PricePlanTypEnums::getText($type) }}
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="tab-content">
            @foreach($data['all_price_plan'] as $plan_type => $plan_items)
                @php
                    $tab_id = match ((int)$plan_type) {
                        0 => 'monthly',
                        1 => 'yearly',
                        2 => 'lifetime',
                        default => 'monthly'
                    };
                    $period = match ((int)$plan_type) {
                        0 => __('/mo'),
                        1 => __('/yr'),
                        2 => __('/lt'),
                        default => __('/mo')
                    };
                    $is_first = $loop->first;
                @endphp

                <div class="tab-pane fade {{ $is_first ? 'show active' : '' }}" 
                     id="{{$tab_id}}" 
                     role="tabpanel" 
                     aria-labelledby="{{$tab_id}}-tab">
                    
                    <div class="row g-4 justify-content-center">
                        @foreach($plan_items as $key => $price_plan_item)
                            @php
                                $is_featured = $key == 1 || ($price_plan_item->is_featured ?? false);
                            @endphp
                            <div class="col-lg-4 col-md-6">
                                <div class="pricing-card panel p-4 lg:p-5 rounded-2 bg-white dark:bg-gray-800 border {{ $is_featured ? 'border-primary shadow-lg' : 'border-gray-200 dark:border-gray-700' }}">
                                    @if($price_plan_item->package_badge)
                                        <span class="badge bg-primary text-white mb-3">{{ $price_plan_item->package_badge }}</span>
                                    @endif
                                    
                                    <div class="pricing-header mb-4">
                                        <h4 class="h5 m-0">{{ $price_plan_item->title }}</h4>
                                        <div class="price mt-3">
                                            <span class="h2 fw-bold text-primary">{{ amount_with_currency_symbol($price_plan_item->price) }}</span>
                                            <span class="text-muted">{{ $period }}</span>
                                        </div>
                                    </div>
                                    
                                    <ul class="pricing-features list-unstyled mb-4">
                                        @if(!empty($price_plan_item->page_permission_feature))
                                            <li class="d-flex align-items-center gap-2 py-2 border-bottom">
                                                <i class="icon-1 text-primary unicon-checkmark-circle"></i>
                                                <span>
                                                    @if($price_plan_item->page_permission_feature < 0)
                                                        {{ __('Unlimited Pages') }}
                                                    @else
                                                        {{ sprintf(__('%d Pages'), $price_plan_item->page_permission_feature) }}
                                                    @endif
                                                </span>
                                            </li>
                                        @endif

                                        @if(!empty($price_plan_item->product_permission_feature))
                                            <li class="d-flex align-items-center gap-2 py-2 border-bottom">
                                                <i class="icon-1 text-primary unicon-checkmark-circle"></i>
                                                <span>
                                                    @if($price_plan_item->product_permission_feature < 0)
                                                        {{ __('Unlimited Products') }}
                                                    @else
                                                        {{ sprintf(__('%d Products'), $price_plan_item->product_permission_feature) }}
                                                    @endif
                                                </span>
                                            </li>
                                        @endif

                                        @if(!empty($price_plan_item->blog_permission_feature))
                                            <li class="d-flex align-items-center gap-2 py-2 border-bottom">
                                                <i class="icon-1 text-primary unicon-checkmark-circle"></i>
                                                <span>
                                                    @if($price_plan_item->blog_permission_feature < 0)
                                                        {{ __('Unlimited Blogs') }}
                                                    @else
                                                        {{ sprintf(__('%d Blogs'), $price_plan_item->blog_permission_feature) }}
                                                    @endif
                                                </span>
                                            </li>
                                        @endif

                                        @if(!empty($price_plan_item->storage_permission_feature))
                                            <li class="d-flex align-items-center gap-2 py-2 border-bottom">
                                                <i class="icon-1 text-primary unicon-checkmark-circle"></i>
                                                <span>
                                                    @if($price_plan_item->storage_permission_feature < 0)
                                                        {{ __('Unlimited Storage') }}
                                                    @else
                                                        {{ sprintf(__('%d MB Storage'), $price_plan_item->storage_permission_feature) }}
                                                    @endif
                                                </span>
                                            </li>
                                        @endif

                                        @if(!empty($price_plan_item->plan_features))
                                            @foreach($price_plan_item->plan_features as $feature)
                                                <li class="d-flex align-items-center gap-2 py-2 border-bottom">
                                                    <i class="icon-1 {{ $feature->status ? 'text-primary unicon-checkmark-circle' : 'text-muted unicon-close-circle' }}"></i>
                                                    <span class="{{ !$feature->status ? 'text-muted text-decoration-line-through' : '' }}">
                                                        {{ $feature->feature_name }}
                                                    </span>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>

                                    @if(!empty($price_plan_item->description))
                                        <p class="text-muted small mb-4">{!! $price_plan_item->description !!}</p>
                                    @endif

                                    <div class="pricing-footer">
                                        @php
                                            $buy_text = $price_plan_item->price > 0 ? __('Buy Now') : __('Get Started');
                                        @endphp
                                        
                                        @if($price_plan_item->has_trial ?? false)
                                            <div class="d-grid gap-2">
                                                <a href="{{ route('landlord.frontend.plan.order', $price_plan_item->id) }}" 
                                                   class="btn {{ $is_featured ? 'btn-primary' : 'btn-outline-primary' }}">
                                                    {{ $buy_text }}
                                                </a>
                                                <a href="{{ route('landlord.frontend.plan.view', [$price_plan_item->id, 'trial']) }}" 
                                                   class="btn btn-sm btn-link">
                                                    {{ __('Start Free Trial') }}
                                                </a>
                                            </div>
                                        @else
                                            <a href="{{ route('landlord.frontend.plan.order', $price_plan_item->id) }}" 
                                               class="btn w-100 {{ $is_featured ? 'btn-primary' : 'btn-outline-primary' }}">
                                                {{ $buy_text }}
                                            </a>
                                        @endif
                                        
                                        <a href="{{ route('landlord.frontend.plan.order', $price_plan_item->id) }}" 
                                           class="btn btn-sm btn-link d-block mt-2 text-center">
                                            {{ __('View All Features') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        @if(!empty($disclaimer_text))
            <p class="text-center text-muted small mt-4">{{ $disclaimer_text }}</p>
        @endif
    </div>
</section>





















