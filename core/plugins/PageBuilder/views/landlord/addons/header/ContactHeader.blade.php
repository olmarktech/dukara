@php
    // Contact Header - Fallback view for non-Lexend themes
    $title = $data['title'] ?? 'Contact Us';
    $subtitle = $data['subtitle'] ?? '';
    $section_id = $data['section_id'] ?? '';
    $padding_top = $data['padding_top'] ?? '80';
    $padding_bottom = $data['padding_bottom'] ?? '80';
@endphp

<section class="contact-header-area section-bg-1" data-padding-top="{{ $padding_top }}" data-padding-bottom="{{ $padding_bottom }}" id="{{ $section_id }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="contact-header-content text-center mb-5">
                    <h1 class="page-title">{{ $title }}</h1>
                    @if($subtitle)
                        <p class="page-subtitle mt-3">{{ $subtitle }}</p>
                    @endif
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        @if(!empty($data['background_image']))
                            {!! render_image_markup_by_attachment_id($data['background_image'], 'Contact') !!}
                        @endif
                        @if(!empty($data['testimonial_text']))
                            <div class="testimonial-overlay mt-3 p-3 bg-dark text-white">
                                <p>"{{ $data['testimonial_text'] }}"</p>
                                @if(!empty($data['testimonial_name']))
                                    <p class="mt-2 mb-0"><strong>{{ $data['testimonial_name'] }}</strong></p>
                                    @if(!empty($data['testimonial_position']))
                                        <p class="mb-0"><small>{{ $data['testimonial_position'] }}</small></p>
                                    @endif
                                @endif
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <form id="landlord-contact-form" action="#">
                            @if(!empty($data['form_description']))
                                <p class="mb-3">{{ $data['form_description'] }}</p>
                            @endif
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Full name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Your email" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" placeholder="Subject">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" placeholder="Your message.." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send message</button>
                            @if(!empty($data['email_text']) && !empty($data['email_address']))
                                <p class="mt-3 text-center">{{ $data['email_text'] }} <a href="mailto:{{ $data['email_address'] }}">email</a>.</p>
                            @endif
                            <div class="form-message-show mt-3"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

