@php
    // CTA Section - Fallback view (uses when Lexend theme is not active)
    $section_id = $data['section_id'] ?? '';
    $padding_top = $data['padding_top'] ?? '';
    $padding_bottom = $data['padding_bottom'] ?? '';
    $title = $data['title'] ?? 'Prevent costly mistakes';
    $subtitle = $data['subtitle'] ?? 'Create pre-approved templates and lock all legal information.';
    $button_text = $data['button_text'] ?? 'Try it now';
    $button_url = $data['button_url'] ?? '#';
    $button_subtext = $data['button_subtext'] ?? '14-day trial, no credit card required.';
@endphp

<section class="cta-area section-bg-1" data-padding-top="{{ $padding_top }}" data-padding-bottom="{{ $padding_bottom }}" id="{{ $section_id }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="cta-wrapper text-center">
                    <div class="cta-content">
                        <h2 class="cta-title">{{ $title }}</h2>
                        <p class="cta-subtitle mt-3">{{ $subtitle }}</p>
                        <div class="btn-wrapper mt-4">
                            <a href="{{ $button_url }}" class="btn btn-primary">{{ $button_text }}</a>
                        </div>
                        @if($button_subtext)
                            <p class="cta-subtext mt-2"><small>{{ $button_subtext }}</small></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

