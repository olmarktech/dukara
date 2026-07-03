@php
    // Contact Blog Posts section - EXACT from page-contact.html line 945-1049
    $section_title = $data['section_title'] ?? 'Gain valuable insights';
    $blogs = $data['blogs'] ?? [];
@endphp

<!-- Section start -->
<div id="blog_posts" class="section panel overflow-hidden gap-3 bg-secondary dark:bg-gray-800">
    <div class="section-outer panel py-6 xl:py-9">
        <div class="container max-w-xl">
            <div class="section-inner panel">
                <div class="panel vstack items-center gap-4 sm:gap-6 xl:gap-8" data-anime="onview: -100; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 200});">
                    @if($section_title)
                        <h2 class="h3 lg:h2 xl:h1 max-w-400px lg:max-w-750px m-auto text-center">{{ $section_title }}</h2>
                    @endif
                    <div class="panel">
                        <div class="row child-cols-12 sm:child-cols-6 lg:child-cols-4 justify-center g-2 xl:g-4">
                            @foreach($blogs as $blog)
                                <div>
                                    <article class="post type-post panel vstack gap-3 rounded-3 p-2 pb-3 bg-white dark:bg-gray-800">
                                        @if(!empty($blog->category) && !empty($blog->category->id) && !empty($blog->category->title))
                                            <a class="position-absolute top-0 ltr:start-0 rtl:end-0 m-3 fs-7 fw-bold text-none z-1 bg-primary text-white py-narrow px-1" href="{{ route('landlord.frontend.blog.category', [$blog->category->id, $blog->category->slug ?? '']) }}" style="border-radius: 8px;">{{ $blog->category->title }}</a>
                                        @endif
                                        <figure class="featured-image m-0 rounded ratio ratio-3x2 rounded-2 uc-transition-toggle overflow-hidden">
                                            @if(!empty($blog->image))
                                                {!! render_image_markup_by_attachment_id($blog->image, $blog->title, 'grid', false, ['class' => 'media-cover image uc-transition-scale-up uc-transition-opaque']) !!}
                                            @else
                                                <img class="media-cover image uc-transition-scale-up uc-transition-opaque" src="{{ asset('themes/lexend-v4/assets/images/blog/img-11.jpg') }}" alt="{{ $blog->title }}">
                                            @endif
                                            <a href="{{ route('landlord.frontend.blog.single', $blog->slug) }}" class="position-cover" data-caption="{{ $blog->title }}"></a>
                                        </figure>
                                        <header class="panel vstack items-center gap-1 lg:gap-2 px-2">
                                            <h3 class="h5 xl:h4 m-0 text-center m-0">
                                                <a class="text-none" href="{{ route('landlord.frontend.blog.single', $blog->slug) }}">{{ $blog->title }}</a>
                                            </h3>
                                            <ul class="post-meta nav-x ft-tertiary justify-center gap-1 fs-7 text-gray-400 dark:text-gray-300 d-none lg:d-flex">
                                                @if(!empty($blog->author))
                                                    <li>
                                                        <div class="hstack gap-narrow ft-tertiary">
                                                            @if(!empty($blog->author_image))
                                                                {!! render_image_markup_by_attachment_id($blog->author_image, $blog->author, 'thumbnail', false, ['class' => 'w-24px h-24px rounded-circle me-narrow']) !!}
                                                            @endif
                                                            <span class="text-none fw-bold text-dark dark:text-white">{{ $blog->author }}</span>
                                                        </div>
                                                    </li>
                                                    <li class="opacity-50">•</li>
                                                @endif
                                                <li>
                                                    <div class="post-date hstack gap-narrow">
                                                        <span>{{ $blog->created_at->format('M d, Y') }}</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </header>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->

