@php
    // Contact Blog Posts - Fallback view for non-Lexend themes
    $section_title = $data['section_title'] ?? 'Latest Posts';
    $blogs = $data['blogs'] ?? [];
    $section_id = $data['section_id'] ?? '';
    $padding_top = $data['padding_top'] ?? '80';
    $padding_bottom = $data['padding_bottom'] ?? '80';
@endphp

<section class="contact-blog-posts-area section-bg-1" data-padding-top="{{ $padding_top }}" data-padding-bottom="{{ $padding_bottom }}" id="{{ $section_id }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                @if($section_title)
                    <h2 class="section-title text-center mb-5">{{ $section_title }}</h2>
                @endif
                <div class="row">
                    @foreach($blogs as $blog)
                        <div class="col-md-4 mb-4">
                            <article class="blog-card">
                                @if(!empty($blog->image))
                                    <div class="blog-image mb-3">
                                        <a href="{{ route('landlord.frontend.blog.single', $blog->slug) }}">
                                            {!! render_image_markup_by_attachment_id($blog->image, $blog->title, 'grid') !!}
                                        </a>
                                    </div>
                                @endif
                                <div class="blog-content">
                                    @if(!empty($blog->category->title))
                                        <span class="blog-category badge badge-primary">{{ $blog->category->title }}</span>
                                    @endif
                                    <h4 class="blog-title mt-2">
                                        <a href="{{ route('landlord.frontend.blog.single', $blog->slug) }}">{{ $blog->title }}</a>
                                    </h4>
                                    <div class="blog-meta mt-2">
                                        @if(!empty($blog->author))
                                            <span>{{ $blog->author }}</span>
                                        @endif
                                        <span>{{ $blog->created_at->format('M d, Y') }}</span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

