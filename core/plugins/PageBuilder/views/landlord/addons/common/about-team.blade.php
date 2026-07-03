@php
    // About Team - Fallback view for non-Lexend themes
    $title = $data['title'] ?? '';
    $section_id = $data['section_id'] ?? '';
    $padding_top = $data['padding_top'] ?? '80';
    $padding_bottom = $data['padding_bottom'] ?? '80';
@endphp

<section class="about-team-area section-bg-1" data-padding-top="{{ $padding_top }}" data-padding-bottom="{{ $padding_bottom }}" id="{{ $section_id }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                @if(!empty($data['title']))
                    <h2 class="section-title text-center mb-5">{{ $data['title'] }}</h2>
                @endif
                <div class="row">
                    @if(!empty($data['repeater_data']) && array_key_exists('repeater_name_', $data['repeater_data']))
                        @foreach($data['repeater_data']['repeater_name_'] as $key => $member_name)
                            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                                <div class="team-member text-center">
                                    @if(!empty($data['repeater_data']['repeater_image_'][$key]))
                                        <div class="member-image mb-3">
                                            {!! render_image_markup_by_attachment_id($data['repeater_data']['repeater_image_'][$key], $member_name) !!}
                                        </div>
                                    @endif
                                    <h5 class="member-name">{{ $member_name }}</h5>
                                    <p class="member-position"><small>{{ $data['repeater_data']['repeater_position_'][$key] ?? '' }}</small></p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

