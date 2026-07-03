@php
    // Blog section - Lexend v4 Style (Fallback View)
    $title = $data['title'] ?? '';
@endphp

<!-- Section start -->
<div id="blog_posts" class="blog-posts section panel overflow-hidden swiper-parent">
    <div class="section-outer panel overflow-hidden py-6 sm:py-8 xl:py-10 lg:mx-2 rounded-2 xl:rounded-3 bg-secondary dark:bg-gray-800">
        <div class="container">
            <div class="section-inner panel" data-anime="onview: -200; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500; delay: anime.stagger(100, {start: 200});">
                <div class="section-heading panel vstack items-center gap-2 xl:gap-3 mb-4 sm:mb-6 xl:mb-8 max-w-700px mx-auto text-center">
                    @if($title)
                        @php
                            if (str_contains($title, '{h}') && str_contains($title, '{/h}')) {
                                $text = explode('{h}', $title);
                                $highlighted_word = explode('{/h}', $text[1])[0];
                                $before_text = $text[0];
                                $after_parts = explode('{/h}', $text[1]);
                                $after_text = $after_parts[1] ?? '';
                                $final_title = $before_text . '<span class="text-primary dark:text-quaternary">' . $highlighted_word . '</span>' . $after_text;
                            } else {
                                $final_title = $title;
                            }
                        @endphp
                        <h2 class="h3 sm:h2 xl:h1 m-0">{!! $final_title !!}</h2>
                    @endif
                </div>
                <div class="section-content panel">
                    <div class="swiper swiper-blog overflow-unset lg:overflow-hidden pt-2" data-uc-swiper="items: 1.1; gap: 8; center: true; dots: .swiper-pagination;" data-uc-swiper-s="items: 2.3; gap: 8; active: 1; center: true;" data-uc-swiper-m="items: 3; gap: 8; center: false;" data-uc-swiper-l="items: 3; gap: 16; center: false;">
                        <div class="swiper-wrapper">
                            @if(!empty($data['blogs']) && $data['blogs']->count() > 0)
                                @foreach($data['blogs'] as $blog)
                                    <div class="swiper-slide">
                                        <article class="post type-post panel overflow-hidden vstack p-2 border bg-white dark:bg-opacity-5 duration-150 hover:-translate-y-1 rounded-1-5">
                                            <figure class="featured-image m-0 rounded ratio ratio-16x9 rounded-default uc-transition-toggle overflow-hidden">
                                                @if(!empty($blog->image))
                                                    {!! render_image_markup_by_attachment_id($blog->image, $blog->title, 'grid', false) !!}
                                                @else
                                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque" src="{{ asset('themes/lexend-v4/assets/images/blog/post-7.jpg') }}" alt="{{ $blog->title }}">
                                                @endif
                                                <a href="{{ route('landlord.frontend.blog.single', $blog->slug) }}" class="position-cover" data-caption="{{ $blog->title }}"></a>
                                            </figure>
                                            <div class="panel vstack justify-between gap-2 p-1 pt-2 xl:p-2">
                                                <div class="content vstack gap-1 xl:gap-2">
                                                    @if(!empty($blog->category) && !empty($blog->category->id))
                                                        <a href="{{ route('landlord.frontend.blog.category', ['id' => $blog->category->id, 'any' => \Illuminate\Support\Str::slug($blog->category->title ?? '')]) }}" class="post-excrept fs-7 text-uppercase text-none text-gray-300 dark:text-gray-200">{{ $blog->category->title }}</a>
                                                    @endif
                                                    <a class="text-none" href="{{ route('landlord.frontend.blog.single', $blog->slug) }}">
                                                        <h3 class="post-title h5 xl:h4 m-0 ltr:pe-4 rtl:ps-4 dark:text-white"><span>{{ $blog->title }}</span></h3>
                                                    </a>
                                                </div>
                                                <a href="{{ route('landlord.frontend.blog.single', $blog->slug) }}" class="uc-link text-primary dark:text-quaternary fs-7 xl:fs-6 fw-bold hstack gap-1 sm:mt-1 xl:mt-2">
                                                    <span>{{ __('Read this article') }}</span>
                                                    <i class="position-relative icon unicon-arrow-right fw-bold rtl:-rotate-90 translate-y-px"></i>
                                                </a>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="section-footer panel mt-6 sm:mt-6 h-8px">
                        <div class="swiper-pagination position-absolute bottom-0 text-primary dark:text-quaternary m-0 justify-center"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->

<style>
/* Fix Blog Swiper Display */
.swiper-blog .swiper-wrapper {
    display: flex !important;
    align-items: stretch;
}

.swiper-blog .swiper-slide {
    width: auto;
    flex-shrink: 0;
    height: auto;
}

.blog-posts .swiper-wrapper {
    transition-timing-function: ease-out;
}

/* Ensure cards have equal height */
.blog-posts .post {
    height: 100%;
    display: flex;
    flex-direction: column;
}

.blog-posts .panel.vstack.justify-between {
    flex: 1;
}

@media (max-width: 640px) {
    .swiper-blog {
        padding-left: 0.5rem;
        padding-right: 0.5rem;
    }
}
</style>

<script>
// Ensure swiper initializes properly for blog posts
document.addEventListener('DOMContentLoaded', function() {
    const blogSwiper = document.querySelector('.swiper-blog');
    if (blogSwiper && window.UIkit) {
        // Force UIkit to reinitialize swiper
        setTimeout(() => {
            UIkit.swiper(blogSwiper);
        }, 150);
    }
});
</script>
