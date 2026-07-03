@php
    // Service Widget - Lexend style
    $services = $data['service'] ?? collect();
    $padding_top = $data['padding_top'] ?? '';
    $padding_bottom = $data['padding_bottom'] ?? '';
@endphp

<!-- Section start -->
<div class="section panel overflow-hidden" style="padding-top: {{ $padding_top }}px; padding-bottom: {{ $padding_bottom }}px;">
    <div class="section-outer panel py-6 sm:py-8 xl:py-10">
        <div class="container">
            <div class="section-inner panel">
                @if($services->count() > 0)
                    <div class="row child-cols-12 sm:child-cols-6 lg:child-cols-3 col-match g-3 lg:g-4" data-anime="onview: -100; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500; delay: anime.stagger(100, {start: 200});">
                        @foreach($services as $service)
                            <div>
                                <div class="service-item panel vstack gap-3 p-4 lg:p-5 rounded-2 bg-secondary dark:bg-gray-800">
                                    @if(!empty($service->icon))
                                        <div class="icon-box">
                                            <i class="{{ $service->icon }} icon-2 text-primary dark:text-quaternary"></i>
                                        </div>
                                    @elseif(!empty($service->image))
                                        <div class="panel">
                                            {!! render_image_markup_by_attachment_id($service->image, $service->title, 'full', false) !!}
                                        </div>
                                    @endif
                                    <div class="panel">
                                        <h3 class="h5 lg:h4 m-0 dark:text-white">
                                            <a href="{{ route('tenant.frontend.service.single', $service->slug) }}" class="text-inherit">{{ $service->title }}</a>
                                        </h3>
                                        @if(!empty($service->description))
                                            <p class="fs-6 text-dark dark:text-white text-opacity-70 mt-2 mb-0">{{ \Illuminate\Support\Str::limit(strip_tags($service->description), 100) }}</p>
                                        @endif
                                    </div>
                                    @if(!empty($service->slug))
                                        <div class="mt-auto">
                                            <a href="{{ route('tenant.frontend.service.single', $service->slug) }}" class="btn btn-sm btn-outline-primary">
                                                {{ __('Read More') }}
                                                <i class="icon icon-1 unicon-arrow-up-right"></i>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-5">
                        <p class="text-muted">{{ __('No services available at the moment.') }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Section end -->

