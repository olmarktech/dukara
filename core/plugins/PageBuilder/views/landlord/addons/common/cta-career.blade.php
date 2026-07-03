@php
    // CTA Career - Fallback view for non-Lexend themes
    $title = $data['title'] ?? "We're hiring!";
    $subtitle = $data['subtitle'] ?? '';
    $button_text = $data['button_text'] ?? 'View openings';
    $button_url = $data['button_url'] ?? '#';
    $section_id = $data['section_id'] ?? '';
    $padding_top = $data['padding_top'] ?? '80';
    $padding_bottom = $data['padding_bottom'] ?? '80';
@endphp

<section class="cta-career-area section-bg-1" data-padding-top="{{ $padding_top }}" data-padding-bottom="{{ $padding_bottom }}" id="{{ $section_id }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="cta-content text-center">
                    <h2>{{ $title }}</h2>
                    @if($subtitle)
                        <p class="mt-3">{{ $subtitle }}</p>
                    @endif
                    @if($button_text)
                        <a href="{{ $button_url }}" class="btn btn-primary mt-4">{{ $button_text }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

