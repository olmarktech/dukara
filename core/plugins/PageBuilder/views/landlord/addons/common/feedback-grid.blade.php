@php
    // Feedback Grid - Fallback view for non-Lexend themes
    $title = $data['title'] ?? 'Client Testimonials';
    $testimonials = $data['testimonials'] ?? [];
    $section_id = $data['section_id'] ?? '';
    $padding_top = $data['padding_top'] ?? '80';
    $padding_bottom = $data['padding_bottom'] ?? '80';
@endphp

<section class="feedback-grid-area section-bg-1" data-padding-top="{{ $padding_top }}" data-padding-bottom="{{ $padding_bottom }}" id="{{ $section_id }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                @if($title)
                    <h2 class="section-title text-center mb-5">{{ $title }}</h2>
                @endif
                <div class="row">
                    @foreach($testimonials as $testimonial)
                        <div class="col-md-4 mb-4">
                            <div class="testimonial-card border p-4 rounded h-100">
                                @if(!empty($testimonial->company_logo))
                                    <div class="company-logo mb-3">
                                        {!! render_image_markup_by_attachment_id($testimonial->company_logo, $testimonial->company ?? 'Company') !!}
                                    </div>
                                @endif
                                <p class="testimonial-text">"{{ $testimonial->description }}"</p>
                                <div class="testimonial-author mt-3 d-flex align-items-center">
                                    @if(!empty($testimonial->image))
                                        {!! render_image_markup_by_attachment_id($testimonial->image, $testimonial->name, 'thumbnail', false, ['class' => 'rounded-circle me-2']) !!}
                                    @endif
                                    <div>
                                        <h6 class="mb-0">{{ $testimonial->name }}</h6>
                                        @if(!empty($testimonial->designation))
                                            <small class="text-muted">{{ $testimonial->designation }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if(!empty($data['link_text']) && !empty($data['link_url']))
                    <div class="text-center mt-4">
                        <a href="{{ $data['link_url'] }}" class="btn btn-link">{{ $data['link_text'] }}</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

