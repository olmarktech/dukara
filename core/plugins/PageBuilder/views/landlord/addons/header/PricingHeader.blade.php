@php
    // Pricing Header - Fallback view for non-Lexend themes
    $title = $data['title'] ?? 'Pricing Plans';
    $subtitle = $data['subtitle'] ?? '';
    $section_id = $data['section_id'] ?? '';
    $padding_top = $data['padding_top'] ?? '80';
    $padding_bottom = $data['padding_bottom'] ?? '80';
@endphp

<section class="pricing-header-area section-bg-1" data-padding-top="{{ $padding_top }}" data-padding-bottom="{{ $padding_bottom }}" id="{{ $section_id }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="pricing-header-content text-center">
                    <h1 class="page-title">{{ $title }}</h1>
                    @if($subtitle)
                        <p class="page-subtitle mt-3">{{ $subtitle }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

