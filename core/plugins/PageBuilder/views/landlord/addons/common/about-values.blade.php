@php
    // About Values - Fallback view for non-Lexend themes
    $title = $data['title'] ?? '';
    $section_id = $data['section_id'] ?? '';
    $padding_top = $data['padding_top'] ?? '80';
    $padding_bottom = $data['padding_bottom'] ?? '80';
@endphp

<section class="about-values-area section-bg-1" data-padding-top="{{ $padding_top }}" data-padding-bottom="{{ $padding_bottom }}" id="{{ $section_id }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                @if(!empty($data['title']))
                    <h2 class="section-title text-center mb-5">{{ $data['title'] }}</h2>
                @endif
                <div class="row">
                    @if(!empty($data['repeater_data']) && array_key_exists('repeater_title_', $data['repeater_data']))
                        @foreach($data['repeater_data']['repeater_title_'] as $key => $value_title)
                            <div class="col-md-6 mb-4">
                                <div class="value-card">
                                    @if(!empty($data['repeater_data']['repeater_icon_'][$key]))
                                        <div class="value-icon mb-3">
                                            {!! render_image_markup_by_attachment_id($data['repeater_data']['repeater_icon_'][$key], $value_title) !!}
                                        </div>
                                    @endif
                                    <h4>{{ $value_title }}</h4>
                                    <p>{{ $data['repeater_data']['repeater_description_'][$key] ?? '' }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

