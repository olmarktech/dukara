{{-- CTA Features - Fallback view --}}
<section class="cta-features-area" style="padding: 60px 0;">
    <div class="container">
        <div class="row align-items-center" style="background: #f8f9fa; border-radius: 15px; padding: 40px;">
            <div class="col-lg-8">
                @if(!empty($data['title']))
                    <h2>{{ $data['title'] }}</h2>
                @endif
                @if(!empty($data['button_text']))
                    <a href="{{ $data['button_url'] ?? '#' }}" class="btn btn-primary mt-3">{{ $data['button_text'] }}</a>
                @endif
                @if(!empty($data['button_subtext']))
                    <p class="mt-2 text-muted">{{ $data['button_subtext'] }}</p>
                @endif
            </div>
            <div class="col-lg-4 d-none d-lg-block text-end">
                @if(!empty($data['image_light']))
                    @php
                        $img = get_attachment_image_by_id($data['image_light']);
                    @endphp
                    @if(!empty($img['img_url']))
                        <img src="{{ $img['img_url'] }}" alt="CTA Image" class="img-fluid" style="max-width: 250px;">
                    @endif
                @endif
            </div>
        </div>
    </div>
</section>

