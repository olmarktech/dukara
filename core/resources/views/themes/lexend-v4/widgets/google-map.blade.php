@php
    // Google Map Widget - Lexend style
    $location = $data['location'] ?? '';
    $padding_top = $data['padding_top'] ?? '';
    $padding_bottom = $data['padding_bottom'] ?? '';
@endphp

<!-- Section start -->
<div class="section panel overflow-hidden" style="padding-top: {{ $padding_top }}px; padding-bottom: {{ $padding_bottom }}px;">
    <div class="section-outer panel py-6 sm:py-8 xl:py-10">
        <div class="container">
            <div class="section-inner panel">
                @if($location)
                    <div class="map-wrapper rounded-2 xl:rounded-3 overflow-hidden border border-1 dark:border-white dark:border-opacity-15" data-anime="onview: -100; translateY: [48, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500;">
                        {!! $location !!}
                    </div>
                @else
                    <div class="text-center py-5">
                        <p class="text-muted">{{ __('Map location not configured.') }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Section end -->





