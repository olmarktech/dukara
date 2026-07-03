@php
    // About Story - Fallback view for non-Lexend themes
    $title = $data['title'] ?? '';
    $section_id = $data['section_id'] ?? '';
    $padding_top = $data['padding_top'] ?? '80';
    $padding_bottom = $data['padding_bottom'] ?? '80';
@endphp

<section class="about-story-area section-bg-1" data-padding-top="{{ $padding_top }}" data-padding-bottom="{{ $padding_bottom }}" id="{{ $section_id }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="about-story-content text-center">
                    @if(!empty($data['title']))
                        <h2 class="section-title">{{ $data['title'] }}</h2>
                    @endif
                    @if(!empty($data['paragraph_one']))
                        <p class="mt-4">{{ $data['paragraph_one'] }}</p>
                    @endif
                    @if(!empty($data['paragraph_two']))
                        <p class="mt-3">{{ $data['paragraph_two'] }}</p>
                    @endif
                    <div class="counter-wrapper mt-5">
                        <div class="row">
                            @if(!empty($data['counter_1_number']))
                                <div class="col-md-4">
                                    <h3 class="counter-number">{{ $data['counter_1_number'] }}</h3>
                                    <p class="counter-text">{{ $data['counter_1_text'] }}</p>
                                </div>
                            @endif
                            @if(!empty($data['counter_2_number']))
                                <div class="col-md-4">
                                    <h3 class="counter-number">{{ $data['counter_2_number'] }}</h3>
                                    <p class="counter-text">{{ $data['counter_2_text'] }}</p>
                                </div>
                            @endif
                            @if(!empty($data['counter_3_number']))
                                <div class="col-md-4">
                                    <h3 class="counter-number">{{ $data['counter_3_number'] }}{{ $data['counter_3_suffix'] }}</h3>
                                    <p class="counter-text">{{ $data['counter_3_text'] }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

