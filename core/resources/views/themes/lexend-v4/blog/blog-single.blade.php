@php
    $post_img = get_attachment_image_by_id($blog_post->image, 'full', false);
    $post_img_url = $post_img['img_url'] ?? '';
    $blog_url = route('landlord.frontend.blog.single', $blog_post->slug);
    $author = $blog_post->user ?? null;
    $author_name = $author->name ?? ($blog_post->author ?? 'Admin');
    $author_image = !empty($author->image) ? get_attachment_image_by_id($author->image, 'full', false) : null;
    $author_image_url = $author_image['img_url'] ?? asset('themes/lexend-v4/assets/images/avatars/02.png');
    
    // Social share URLs
    $encoded_url = urlencode($blog_url);
    $post_title = str_replace(' ', '%20', $blog_post->title);
    $facebook_share = 'https://www.facebook.com/sharer/sharer.php?u=' . $encoded_url . '&text=' . $post_title;
    $twitter_share = 'https://twitter.com/intent/tweet?url=' . $encoded_url . '&text=' . $post_title;
    $linkedin_share = 'https://www.linkedin.com/sharing/share-offsite/?url=' . $blog_url;
    $pinterest_share = 'https://www.pinterest.com/pin/create/button/?url=' . $blog_url . '&media=' . urlencode($post_img_url) . '&description=' . $post_title;
    $email_share = 'mailto:?subject=' . $post_title . '&body=' . $blog_url;
    
    $blog_image = get_attachment_image_by_id($blog_post->image ?? '', 'full', false);
    $blog_image_url = $blog_image['img_url'] ?? asset('themes/lexend-v4/assets/images/blog/post-full.jpg');
@endphp

@extends('themes.lexend-v4.layouts.app')

@section('page-title', $blog_post->title)

@section('content')
    <!-- Blog Detail Article -->
    <article class="post type-post single-post py-4 lg:py-6 xl:py-9">
        <div class="container max-w-xl">
            <!-- Post Header -->
            <div class="post-header">
                <div class="panel vstack gap-4 md:gap-6 xl:gap-8 text-center">
                    <div class="panel vstack items-center max-w-400px sm:max-w-500px xl:max-w-md mx-auto gap-2 md:gap-3">
                        <h1 class="h4 sm:h2 lg:h1 xl:display-6">{{ $blog_post->title }}</h1>
                        <ul class="post-share-icons nav-x gap-1 dark:text-white">
                            <li>
                                <a class="btn btn-md border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="{{ $facebook_share }}" target="_blank" rel="noopener noreferrer">
                                    <i class="unicon-logo-facebook icon-1"></i>
                                </a>
                            </li>
                            <li>
                                <a class="btn btn-md border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="{{ $twitter_share }}" target="_blank" rel="noopener noreferrer">
                                    <i class="unicon-logo-x-filled icon-1"></i>
                                </a>
                            </li>
                            <li>
                                <a class="btn btn-md border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="{{ $linkedin_share }}" target="_blank" rel="noopener noreferrer">
                                    <i class="unicon-logo-linkedin icon-1"></i>
                                </a>
                            </li>
                            <li>
                                <a class="btn btn-md border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="{{ $pinterest_share }}" target="_blank" rel="noopener noreferrer">
                                    <i class="unicon-logo-pinterest icon-1"></i>
                                </a>
                            </li>
                            <li>
                                <a class="btn btn-md border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="{{ $email_share }}">
                                    <i class="unicon-email icon-1"></i>
                                </a>
                            </li>
                            <li>
                                <a class="btn btn-md border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="#" onclick="navigator.clipboard.writeText('{{ $blog_url }}'); return false;" title="{{ __('Copy Link') }}">
                                    <i class="unicon-link icon-1"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <figure class="featured-image m-0">
                        <figure class="featured-image m-0 rounded ratio ratio-2x1 rounded uc-transition-toggle overflow-hidden">
                            @if(!empty($blog_image_url))
                                <img class="media-cover image uc-transition-scale-up uc-transition-opaque" src="{{ $blog_image_url }}" alt="{{ $blog_post->title }}">
                            @else
                                <img class="media-cover image uc-transition-scale-up uc-transition-opaque" src="{{ asset('themes/lexend-v4/assets/images/blog/post-full.jpg') }}" alt="{{ $blog_post->title }}">
                            @endif
                        </figure>
                    </figure>
                </div>
            </div>
        </div>

        <!-- Post Content -->
        <div class="panel mt-4 lg:mt-6 xl:mt-9">
            <div class="container max-w-lg">
                <div class="post-content panel fs-6 md:fs-5" data-uc-lightbox="animation: scale">
                    {!! $blog_post->blog_content !!}
                </div>

                <!-- Post Footer (Tags & Share) -->
                <div class="post-footer panel vstack sm:hstack gap-3 justify-between border-top py-4 mt-4 xl:py-9 xl:mt-9">
                    @if($blog_post->tags)
                        <ul class="nav-x gap-narrow text-primary">
                            <li><span class="text-black dark:text-white me-narrow">{{ __('Tags:') }}</span></li>
                            @php
                                $all_tags = explode(',', $blog_post->tags);
                            @endphp
                            @foreach($all_tags as $index => $tag)
                                @php
                                    $slug = \Illuminate\Support\Str::slug(trim($tag));
                                @endphp
                                @if(!empty($slug))
                                    <li>
                                        <a href="{{ route('landlord.frontend.blog.tags.page', ['any' => $slug]) }}" class="gap-0">
                                            {{ trim($tag) }}
                                            @if($index < count($all_tags) - 1)
                                                <span class="text-black dark:text-white">,</span>
                                            @endif
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    @endif
                    <ul class="post-share-icons nav-x gap-narrow">
                        <li class="me-1"><span class="text-black dark:text-white">{{ __('Share:') }}</span></li>
                        <li>
                            <a class="btn btn-md btn-outline-gray-100 w-32px lg:w-40px h-32px lg:h-40px text-dark dark:text-white dark:border-gray-600 hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="{{ $facebook_share }}" target="_blank" rel="noopener noreferrer">
                                <i class="unicon-logo-facebook icon-1"></i>
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-md btn-outline-gray-100 w-32px lg:w-40px h-32px lg:h-40px text-dark dark:text-white dark:border-gray-600 hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="{{ $twitter_share }}" target="_blank" rel="noopener noreferrer">
                                <i class="unicon-logo-x-filled icon-1"></i>
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-md btn-outline-gray-100 w-32px lg:w-40px h-32px lg:h-40px text-dark dark:text-white dark:border-gray-600 hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="{{ $email_share }}">
                                <i class="unicon-email icon-1"></i>
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-md btn-outline-gray-100 w-32px lg:w-40px h-32px lg:h-40px text-dark dark:text-white dark:border-gray-600 hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="#" onclick="navigator.clipboard.writeText('{{ $blog_url }}'); return false;" title="{{ __('Copy Link') }}">
                                <i class="unicon-link icon-1"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Author Section -->
                @if($author)
                    <div class="post-author panel py-4 px-3 sm:p-3 xl:p-4 bg-gray-25 dark:bg-opacity-5 rounded lg:rounded-2">
                        <div class="row g-4 items-center">
                            <div class="col-12 sm:col-5 xl:col-3">
                                <figure class="featured-image m-0 rounded ratio ratio-1x1 uc-transition-toggle overflow-hidden">
                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque" src="{{ $author_image_url }}" alt="{{ $author_name }}">
                                </figure>
                            </div>
                            <div class="col">
                                <div class="panel vstack items-start gap-2 md:gap-3">
                                    <h4 class="h5 m-0">{{ $author_name }}</h4>
                                    @if($author->bio)
                                        <p class="fs-6">{{ $author->bio }}</p>
                                    @else
                                        <p class="fs-6">{{ __('Content writer and contributor') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Comments Section -->
                <div id="commont" class="post-comments panel mt-8 xl:mt-9 border-top pt-8 xl:pt-9">
                    @include('blog::landlord.frontend.partial.blog.comment-show-data')
                </div>

                <!-- Comment Form -->
                <div class="comment-form-area panel mt-8 xl:mt-9">
                    <h3 class="h5 xl:h4 mb-4 xl:mb-6">{{ __('Post Your Comment') }}</h3>
                    <div class="error-message"></div>
                    @php
                        $user = Auth::guard('web')->user();
                    @endphp

                    @if(!empty($user))
                        @include('blog::landlord.frontend.partial.blog.comment-area')
                    @else
                        @if(Auth::guard('admin')->user() == null)
                            <div class="panel">
                                <div class="alert alert-info text-center">
                                    <p class="mb-3">{{ __('Please login to post a comment') }}</p>
                                    <a href="{{ route('landlord.user.login') }}" class="btn btn-primary">{{ __('Login') }}</a>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </article>

    <!-- Newsletter Section -->
    <div id="blog_newsletter" class="blog-newsletter section panel overflow-hidden">
        <div class="section-outer panel pb-4 lg:pb-6 xl:pb-9">
            <div class="container max-w-xl">
                <div class="section-inner panel p-3 py-6 lg:p-6 xl:p-8 rounded-2 bg-secondary dark:bg-gray-800 overflow-hidden">
                    <div class="row child-cols-12 md:child-cols g-6 justify-between items-center" data-uc-grid>
                        <div>
                            <div class="vstack gap-2 max-w-500px xl:max-w-600px">
                                <h2 class="h4 md:h3 lg:h2 m-0">{{ __('Get the latest updates') }}</h2>
                                <p class="fs-6 lg:fs-5">{{ __('Subscribe to get our most-popular proposal eBook and more top revenue content to help you send docs faster.') }}</p>
                                <form class="row child-cols g-1 mt-1 xl:mt-2" id="landlord-newsletter-form">
                                    <div>
                                        <input class="form-control h-48px xl:h-56px w-full bg-white dark:border-white dark:bg-opacity-10 dark:border-opacity-0 dark:text-white" type="email" name="email" placeholder="{{ __('Your email address') }}" required>
                                    </div>
                                    <div class="col-12 sm:col-auto">
                                        <button class="btn btn-md h-48px xl:h-56px w-100 lg:min-w-150px xl:min-w-200px btn-primary text-white" type="submit">{{ __('Subscribe') }}</button>
                                    </div>
                                </form>
                                <p class="fs-7 text-dark dark:text-white text-opacity-70">{{ __('Don\'t worry we don\'t spam.') }}</p>
                                <div class="form-message-show mt-2"></div>
                            </div>
                        </div>
                        <div class="md:col-auto d-none md:d-block">
                            <img class="w-250px lg:w-300px xl:w-400px d-block dark:d-none" src="{{ asset('themes/lexend-v4/assets/images/template/newsletter.svg') }}" alt="newsletter">
                            <img class="w-250px lg:w-300px xl:w-400px d-none dark:d-block" src="{{ asset('themes/lexend-v4/assets/images/template/newsletter-dark.svg') }}" alt="newsletter-dark">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        (function($){
            "use strict";

            $(document).ready(function(){
                //Blog Comment Insert
                $(document).on('click', '#submitComment', function (e) {
                    e.preventDefault();
                    var erContainer = $(".error-message");
                    var el = $(this);
                    var form = $('#blog-comment-form');
                    var user_id = $('#user_id').val();
                    var blog_id = $('#blog_id').val();
                    var commented_by = $('#commented_by').val();
                    var comment_content = $('#comment_content').val();
                    let comment_id = $('#blog-comment-form input[name=comment_id]').val();

                    el.text('{{__('Submitting')}}...');

                    $.ajax({
                        url: form.attr('action'),
                        method: 'POST',
                        data: {
                            _token: "{{csrf_token()}}",
                            user_id: user_id,
                            blog_id: blog_id,
                            commented_by: commented_by,
                            comment_id: comment_id,
                            comment_content: comment_content,
                        },
                        success: function (data){
                            $('#comment_content').val('');
                            erContainer.html('<div class="mt-3 mb-0 alert alert-'+data.type+'">'+data.msg+'</div>');

                            if (comment_id != '')
                            {
                                location.reload();
                            } else {
                                load_comment_data('{{$blog_post->id}}', 'load-one');

                                $('#blog-comment-form input[name=comment_id]').val('');
                                $('#comment_content').attr('placeholder','{{__('Post Comments')}}');
                            }

                            el.text('{{__('Comment')}}');
                        },
                        error: function (data) {
                            var errors = data.responseJSON;
                            erContainer.html('<div class="alert alert-danger"></div>');
                            $.each(errors.errors, function (index, value) {
                                erContainer.find('.alert.alert-danger').append('<p>' + value + '</p>');
                            });
                            el.text('{{__('Comment')}}');
                        },
                    });
                });

                //Blog Replay
                $(document).on('click', '.btn-replay', function (e) {
                    e.preventDefault();
                    let el = $(this);

                    let comment_id = el.data('comment_id');
                    let parent_name = el.siblings('div').children('.blog-details-content-title').find('a').data('parent_name');

                    $('#blog-comment-form input[name=comment_id]').val(comment_id);
                    $('#comment_content').attr('placeholder','{{__('Replying to')}} '+ parent_name + '..');

                    $('html').animate({
                        scrollTop: $("#comment_content").offset().top-500
                    },100,'linear');
                });

                function load_comment_data(id, type) {
                    var commentData = $('#comment_data');
                    var items = commentData.attr('data-items');

                    $.ajax({
                        url: "{{ route('landlord.frontend.load.blog.comment.data') }}",
                        method: "POST",
                        data: {id: id, _token: "{{csrf_token()}}", items: items, type: type},
                        success: function (data) {
                            commentData.attr('data-items',parseInt(items) + 5);
                            commentData.find('ul').append(data.markup);
                            $('#load_more_comment_button').text('{{__('Load More')}}');

                            if (data.blogComments.length === 0) {
                                $('#load_more_comment_button').text('{{__('No More Comment Found')}}');
                            }
                        }
                    })
                }

                $(document).on('click', '#load_more_comment_button', function () {
                    $(this).text('{{__('Loading...')}}');
                    load_comment_data('{{$blog_post->id}}', 'load-more');
                });
            });
        })(jQuery);
    </script>

    <x-custom-js.ajax-login/>
@endsection
