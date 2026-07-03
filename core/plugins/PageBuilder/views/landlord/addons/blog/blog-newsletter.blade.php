@php
    // Blog Newsletter - Fallback view for non-Lexend themes
    $title = $data['title'] ?? 'Get the latest updates';
    $description = $data['description'] ?? '';
    $input_placeholder = $data['input_placeholder'] ?? 'Your email address';
    $button_text = $data['button_text'] ?? 'Subscribe';
    $disclaimer_text = $data['disclaimer_text'] ?? '';
    $section_id = $data['section_id'] ?? '';
    $padding_top = $data['padding_top'] ?? '80';
    $padding_bottom = $data['padding_bottom'] ?? '80';
@endphp

<section class="blog-newsletter-area section-bg-1" data-padding-top="{{ $padding_top }}" data-padding-bottom="{{ $padding_bottom }}" id="{{ $section_id }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="newsletter-wrapper">
                    <div class="newsletter-content text-center">
                        <h2 class="newsletter-title">{{ $title }}</h2>
                        @if($description)
                            <p class="newsletter-description mt-3">{{ $description }}</p>
                        @endif
                        <form action="#" class="newsletter-form mt-4" id="landlord-newsletter-form">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="{{ $input_placeholder }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">{{ $button_text }}</button>
                        </form>
                        @if($disclaimer_text)
                            <p class="newsletter-disclaimer mt-3"><small>{{ $disclaimer_text }}</small></p>
                        @endif
                        <div class="form-message-show mt-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

