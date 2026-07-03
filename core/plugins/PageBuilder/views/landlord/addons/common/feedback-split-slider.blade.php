{{-- Feedback Split Slider - Fallback view --}}
<section class="feedback-split-slider-area" style="padding: 60px 0;">
    <div class="container">
        @if(!empty($data['title']))
            <h2 class="text-center mb-4">{{ $data['title'] }}</h2>
        @endif
        <div class="row" style="background: #f8f9fa; border-radius: 15px; padding: 30px;">
            @if(!empty($data['testimonial']))
                @foreach($data['testimonial'] as $key => $testimonial)
                    @if($key == 0)
                        <div class="col-md-6 mb-3">
                            @if(!empty($testimonial->image))
                                @php
                                    $img = get_attachment_image_by_id($testimonial->image);
                                @endphp
                                @if(!empty($img['img_url']))
                                    <img src="{{ $img['img_url'] }}" alt="{{ $testimonial->name }}" class="img-fluid rounded" style="max-height: 400px; object-fit: cover; width: 100%;">
                                @endif
                            @endif
                        </div>
                        <div class="col-md-6 mb-3 d-flex align-items-center">
                            <div class="text-center w-100">
                                <p class="lead">"{{ $testimonial->description }}"</p>
                                <h5>{{ $testimonial->name }}</h5>
                                @if(!empty($testimonial->designation))
                                    <small class="text-muted">{{ $testimonial->designation }}</small>
                                @endif
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</section>

