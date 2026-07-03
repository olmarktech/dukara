@php
    // Blog Listing - EXACT from blog.html line 741-946
    $blogs = $data['blogs'] ?? [];
@endphp

<!-- Section start -->
<div class="section panel overflow-hidden">
    <div class="section-outer panel py-6 lg:py-9">
        <div class="position-absolute top-0 start-0 end-0 min-h-screen overflow-hidden d-none lg:d-block" data-anime="targets: >*; scale: [0, 1]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 100});">
            <div class="position-absolute top-0 start-0 rotate-45" style="top: 16% !important; left: 18% !important;">
                <img class="w-32px text-gray-900 dark:text-white" src="{{ asset('themes/lexend-v4/assets/images/template/star-1.svg') }}" alt="star-1" data-uc-svg>
            </div>
            <div class="position-absolute top-0 end-0 rotate-45" style="top: 5% !important; right: 18% !important;">
                <img class="w-24px text-gray-900 dark:text-white" src="{{ asset('themes/lexend-v4/assets/images/template/star-2.svg') }}" alt="star-2" data-uc-svg>
            </div>
        </div>
        <div class="container max-w-xl">
            <div class="section-inner panel vstack gap-3 sm:gap-6 lg:gap-9" data-anime="targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100);">
                <div class="row child-cols-12 sm:child-cols-4 col-match gy-4 sm:gy-6 xl:gy-8 gx-2 xl:gx-4">
                    @if(!empty($blogs) && (method_exists($blogs, 'count') ? $blogs->count() > 0 : count($blogs) > 0))
                        @foreach($blogs as $index => $blog)
                            @php
                                $blog_img = get_attachment_image_by_id($blog->image ?? '', 'full', false);
                                $blog_url = route('landlord.frontend.blog.single', $blog->slug);
                                $category = $blog->category ?? null;
                                $author = $blog->user ?? null;
                                $author_name = $author->name ?? ($blog->author ?? 'Admin');
                                $author_avatar = !empty($author->image) ? get_attachment_image_by_id($author->image, 'thumbnail', false) : null;
                                $author_avatar_url = $author_avatar['img_url'] ?? asset('themes/lexend-v4/assets/images/avatars/02.png');
                                $blog_date = $blog->created_at ? $blog->created_at->format('M d, Y') : '';
                                $excerpt = $blog->excerpt ?? strip_tags(\Illuminate\Support\Str::limit($blog->blog_content ?? '', 100));
                            @endphp

                            @if($index === 0)
                                {{-- Featured Post (Large) --}}
                                <div class="col-12">
                                    <article class="post type-post panel rounded-3 p-3 bg-secondary dark:bg-gray-800">
                                        <div class="panel row child-cols-12 md:child-cols-6 items-center g-3">
                                            <div>
                                                <figure class="featured-image m-0 rounded ratio ratio-4x3 rounded lg:rounded-2 uc-transition-toggle overflow-hidden">
                                                    @if(!empty($blog_img['img_url']))
                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque" src="{{ $blog_img['img_url'] }}" alt="{{ $blog->title }}">
                                                    @else
                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque" src="{{ asset('themes/lexend-v4/assets/images/blog/img-05.jpg') }}" alt="{{ $blog->title }}">
                                                    @endif
                                                    <a href="{{ $blog_url }}" class="position-cover" data-caption="{{ $blog->title }}"></a>
                                                </figure>
                                            </div>
                                            <div>
                                                <div class="vstack items-center gap-2 lg:gap-3">
                                                    @if($category && !empty($category->id))
                                                        <a class="post-category text-primary fw-normal text-none fw-bold fs-7 bg-primary text-white py-narrow px-1 rounded" href="{{ route('landlord.frontend.blog.category', ['id' => $category->id, 'any' => \Illuminate\Support\Str::slug($category->title ?? '')]) }}">{{ $category->title }}</a>
                                                    @endif
                                                    <h3 class="h4 xl:h2 m-0 text-center m-0 lg:w-500px lg:m-auto">
                                                        <a class="text-none" href="{{ $blog_url }}">{{ $blog->title }}</a>
                                                    </h3>
                                                    <ul class="post-meta nav-x ft-tertiary justify-center fs-7 gap-1">
                                                        <li>
                                                            <div class="hstack gap-narrow ft-tertiary">
                                                                <img src="{{ $author_avatar_url }}" alt="{{ $author_name }}" class="w-24px h-24px rounded-circle me-narrow">
                                                                <a href="#" class="text-none fw-bold text-dark dark:text-white">{{ $author_name }}</a>
                                                            </div>
                                                        </li>
                                                        <li class="opacity-50">•</li>
                                                        <li>
                                                            <div class="post-date hstack gap-narrow">
                                                                <span>{{ $blog_date }}</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    @if($excerpt)
                                                        <p class="fs-6 lg:fs-5 lg:w-500px lg:mx-auto text-center md:d-none lg:d-block">{{ $excerpt }}</p>
                                                    @endif
                                                    <a class="btn btn-text text-primary border-bottom d-inline-flex fs-7 lg:fs-6 sm:mt-2" href="{{ $blog_url }}">Continue reading</a>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            @else
                                {{-- Regular Posts (Grid) --}}
                                <div>
                                    <article class="post type-post panel vstack gap-3 rounded-3 p-2 pb-3 bg-secondary dark:bg-gray-800">
                                        @if($category && !empty($category->id))
                                            <a class="position-absolute top-0 ltr:start-0 rtl:end-0 m-3 fs-7 fw-bold text-none z-1 bg-primary text-white py-narrow px-1" href="{{ route('landlord.frontend.blog.category', ['id' => $category->id, 'any' => \Illuminate\Support\Str::slug($category->title ?? '')]) }}" style="border-radius: 8px;">{{ $category->title }}</a>
                                        @endif
                                        <figure class="featured-image m-0 rounded ratio ratio-3x2 rounded-2 uc-transition-toggle overflow-hidden">
                                            @if(!empty($blog_img['img_url']))
                                                <img class="media-cover image uc-transition-scale-up uc-transition-opaque" src="{{ $blog_img['img_url'] }}" alt="{{ $blog->title }}">
                                            @else
                                                <img class="media-cover image uc-transition-scale-up uc-transition-opaque" src="{{ asset('themes/lexend-v4/assets/images/blog/img-06.jpg') }}" alt="{{ $blog->title }}">
                                            @endif
                                            <a href="{{ $blog_url }}" class="position-cover" data-caption="{{ $blog->title }}"></a>
                                        </figure>
                                        <header class="panel vstack items-center gap-1 lg:gap-2 px-2">
                                            <h3 class="h5 xl:h4 m-0 text-center m-0">
                                                <a class="text-none" href="{{ $blog_url }}">{{ $blog->title }}</a>
                                            </h3>
                                            <ul class="post-meta nav-x ft-tertiary justify-center gap-1 fs-7 text-gray-400 dark:text-gray-300 d-none lg:d-flex">
                                                <li>
                                                    <div class="hstack gap-narrow ft-tertiary">
                                                        <img src="{{ $author_avatar_url }}" alt="{{ $author_name }}" class="w-24px h-24px rounded-circle me-narrow">
                                                        <a href="#" class="text-none fw-bold text-dark dark:text-white">{{ $author_name }}</a>
                                                    </div>
                                                </li>
                                                <li class="opacity-50">•</li>
                                                <li>
                                                    <div class="post-date hstack gap-narrow">
                                                        <span>{{ $blog_date }}</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </header>
                                    </article>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
                @if(method_exists($blogs, 'links'))
                    <div class="nav-pagination fw-medium">
                        <ul class="nav-x uc-pagination hstack gap-1 justify-center ft-secondary" data-uc-margin="">
                            {{ $blogs->links() }}
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Section end -->

