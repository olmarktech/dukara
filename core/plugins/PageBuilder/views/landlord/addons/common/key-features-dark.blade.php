{{-- Key Features Dark - Fallback view --}}
<section class="key-features-dark-area" style="background: #1f2937; color: white; padding: 80px 0;">
    <div class="container">
        @if(!empty($data['title']))
            <h2 class="text-center mb-5" style="color: white;">{{ $data['title'] }}</h2>
        @endif
        <div class="row">
            @if(!empty($data['repeater_data']) && isset($data['repeater_data']['repeater_title_']))
                @foreach($data['repeater_data']['repeater_title_'] as $key => $title)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100" style="background: transparent; border: 1px solid rgba(255,255,255,0.2); border-radius: 10px; padding: 25px;">
                            @if(!empty($data['repeater_data']['repeater_icon_'][$key]))
                                <i class="{{ $data['repeater_data']['repeater_icon_'][$key] }}" style="font-size: 48px; color: #178d72;"></i>
                            @endif
                            <h5 class="mt-3" style="color: white;">{{ $title }}</h5>
                            @if(!empty($data['repeater_data']['repeater_description_'][$key]))
                                <p style="color: rgba(255,255,255,0.7);">{{ $data['repeater_data']['repeater_description_'][$key] }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

