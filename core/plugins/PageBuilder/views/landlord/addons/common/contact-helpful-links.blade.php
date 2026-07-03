{{-- Contact Helpful Links - Fallback view --}}
<section class="contact-helpful-links-area" style="padding: 60px 0;">
    <div class="container">
        @if(!empty($data['title']))
            <h2 class="text-center mb-5">{{ $data['title'] }}</h2>
        @endif
        <div class="row">
            @if(!empty($data['repeater_data']) && isset($data['repeater_data']['repeater_title_']))
                @foreach($data['repeater_data']['repeater_title_'] as $key => $card_title)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card text-center h-100 p-4" style="background: #f8f9fa; border-radius: 10px;">
                            @if(!empty($data['repeater_data']['repeater_icon_'][$key]))
                                @php
                                    $icon_url = get_attachment_image_by_id($data['repeater_data']['repeater_icon_'][$key])['img_url'] ?? '';
                                @endphp
                                @if(!empty($icon_url))
                                    <img src="{{ $icon_url }}" alt="{{ $card_title }}" style="width: 64px; height: 64px; margin: 0 auto 15px;">
                                @endif
                            @endif
                            <h5>{{ $card_title }}</h5>
                            @if(!empty($data['repeater_data']['repeater_description_'][$key]))
                                <p class="text-muted">{{ $data['repeater_data']['repeater_description_'][$key] }}</p>
                            @endif
                            @if(!empty($data['repeater_data']['repeater_link_text_'][$key]) && !empty($data['repeater_data']['repeater_link_url_'][$key]))
                                <a href="{{ $data['repeater_data']['repeater_link_url_'][$key] }}" class="btn btn-link">
                                    {{ $data['repeater_data']['repeater_link_text_'][$key] }} →
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

