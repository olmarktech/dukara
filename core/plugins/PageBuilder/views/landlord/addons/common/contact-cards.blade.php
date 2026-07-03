@php
    // Contact Cards - Fallback view for non-Lexend themes
    $section_title = $data['section_title'] ?? 'Contact Information';
    $section_id = $data['section_id'] ?? '';
    $padding_top = $data['padding_top'] ?? '80';
    $padding_bottom = $data['padding_bottom'] ?? '80';
@endphp

<section class="contact-cards-area section-bg-1" data-padding-top="{{ $padding_top }}" data-padding-bottom="{{ $padding_bottom }}" id="{{ $section_id }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                @if($section_title)
                    <h2 class="section-title text-center mb-5">{{ $section_title }}</h2>
                @endif
                <div class="row">
                    @if(!empty($data['repeater_data']) && array_key_exists('repeater_title_', $data['repeater_data']))
                        @foreach($data['repeater_data']['repeater_title_'] as $key => $card_title)
                            <div class="col-md-6 col-lg-3 mb-4">
                                <div class="contact-card text-center p-4">
                                    @if(!empty($data['repeater_data']['repeater_icon_'][$key]))
                                        <div class="card-icon mb-3">
                                            {!! render_image_markup_by_attachment_id($data['repeater_data']['repeater_icon_'][$key], $card_title) !!}
                                        </div>
                                    @endif
                                    <h5>{{ $card_title }}</h5>
                                    @if(!empty($data['repeater_data']['repeater_description_'][$key]))
                                        <p>{{ $data['repeater_data']['repeater_description_'][$key] }}</p>
                                    @endif
                                    @if(!empty($data['repeater_data']['repeater_link_url_'][$key]))
                                        <a href="{{ $data['repeater_data']['repeater_link_url_'][$key] }}" class="btn btn-link">
                                            {{ $data['repeater_data']['repeater_link_text_'][$key] ?? 'Learn more' }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

