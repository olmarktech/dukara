@php
    // Blog Header - Fallback view for non-Lexend themes
    $title = $data['title'] ?? 'Blog';
    $section_id = $data['section_id'] ?? '';
    $padding_top = $data['padding_top'] ?? '80';
    $padding_bottom = $data['padding_bottom'] ?? '80';
@endphp

<section class="blog-header-area section-bg-1" data-padding-top="{{ $padding_top }}" data-padding-bottom="{{ $padding_bottom }}" id="{{ $section_id }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="page-header text-center">
                    <h1 class="page-title">{{ $title }}</h1>
                </div>
            </div>
        </div>
    </div>
</section>

