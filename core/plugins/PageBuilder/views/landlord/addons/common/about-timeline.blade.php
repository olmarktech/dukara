@php
    // About Timeline - Fallback view for non-Lexend themes
    $title = $data['title'] ?? '';
    $section_id = $data['section_id'] ?? '';
    $padding_top = $data['padding_top'] ?? '80';
    $padding_bottom = $data['padding_bottom'] ?? '80';
@endphp

<section class="about-timeline-area section-bg-1" data-padding-top="{{ $padding_top }}" data-padding-bottom="{{ $padding_bottom }}" id="{{ $section_id }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                @if(!empty($data['title']))
                    <h2 class="section-title text-center mb-5">{{ $data['title'] }}</h2>
                @endif
                <div class="timeline-wrapper">
                    @if(!empty($data['repeater_data']) && array_key_exists('repeater_year_', $data['repeater_data']))
                        @foreach($data['repeater_data']['repeater_year_'] as $key => $year)
                            <div class="timeline-item mb-4">
                                @if(!empty($data['repeater_data']['repeater_image_'][$key]))
                                    <div class="timeline-image mb-3 text-center">
                                        {!! render_image_markup_by_attachment_id($data['repeater_data']['repeater_image_'][$key], $year) !!}
                                    </div>
                                @endif
                                <div class="timeline-content text-center">
                                    <h4>{{ $year }}</h4>
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

