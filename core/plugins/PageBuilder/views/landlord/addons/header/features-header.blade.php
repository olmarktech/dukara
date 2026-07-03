{{-- Features Header - Fallback view --}}
<section class="features-header-area" style="padding: 80px 0;">
    <div class="container">
        <div class="text-center mb-5">
            @if(!empty($data['title']))
                <h1>{{ $data['title'] }}</h1>
            @endif
            @if(!empty($data['subtitle']))
                <p class="lead">{{ $data['subtitle'] }}</p>
            @endif
        </div>
        @if(!empty($data['repeater_data']) && isset($data['repeater_data']['repeater_title_']))
            @foreach($data['repeater_data']['repeater_title_'] as $key => $title)
                <div class="card mb-4" style="background: #f8f9fa; border-radius: 10px; padding: 30px;">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <span class="badge badge-primary">{{ str_pad($key + 1, 2, '0', STR_PAD_LEFT) }}.</span>
                            <h3>{{ $title }}</h3>
                            @if(!empty($data['repeater_data']['repeater_description_'][$key]))
                                <p>{{ $data['repeater_data']['repeater_description_'][$key] }}</p>
                            @endif
                            @if(!empty($data['repeater_data']['repeater_link_text_'][$key]) && !empty($data['repeater_data']['repeater_link_url_'][$key]))
                                <a href="{{ $data['repeater_data']['repeater_link_url_'][$key] }}">{{ $data['repeater_data']['repeater_link_text_'][$key] }} →</a>
                            @endif
                        </div>
                        <div class="col-md-6">
                            @if(!empty($data['repeater_data']['repeater_image_'][$key]))
                                @php
                                    $img = get_attachment_image_by_id($data['repeater_data']['repeater_image_'][$key]);
                                @endphp
                                @if(!empty($img['img_url']))
                                    <img src="{{ $img['img_url'] }}" alt="{{ $title }}" class="img-fluid">
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>

