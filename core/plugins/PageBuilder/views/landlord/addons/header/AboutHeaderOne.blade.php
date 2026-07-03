@php
    // About Header - Fallback view for non-Lexend themes
    $title = $data['title'] ?? 'About Us';
    $description = $data['description'] ?? '';
    $left_image = $data['left_image'] ?? '';
    $right_image = $data['right_image'] ?? '';
    $section_id = $data['section_id'] ?? '';
    $padding_top = $data['padding_top'] ?? '80';
    $padding_bottom = $data['padding_bottom'] ?? '80';
@endphp

<section class="about-header-area section-bg-1" data-padding-top="{{ $padding_top }}" data-padding-bottom="{{ $padding_bottom }}" id="{{ $section_id }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="about-header-content text-center mb-5">
                    <h1 class="page-title">{{ $title }}</h1>
                    @if($description)
                        <p class="page-description mt-4">{{ $description }}</p>
                    @endif
                </div>
                <div class="row">
                    @if($left_image)
                        <div class="col-md-4 mb-3">
                            {!! render_image_markup_by_attachment_id($left_image, 'About') !!}
                        </div>
                    @endif
                    @if($right_image)
                        <div class="col-md-8 mb-3">
                            {!! render_image_markup_by_attachment_id($right_image, 'About') !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
