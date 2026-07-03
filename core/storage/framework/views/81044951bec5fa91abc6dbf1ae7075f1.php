<?php
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
?>



<?php $__env->startSection('page-title', $blog_post->title); ?>

<?php $__env->startSection('content'); ?>
    <!-- Blog Detail Article -->
    <article class="post type-post single-post py-4 lg:py-6 xl:py-9">
        <div class="container max-w-xl">
            <!-- Post Header -->
            <div class="post-header">
                <div class="panel vstack gap-4 md:gap-6 xl:gap-8 text-center">
                    <div class="panel vstack items-center max-w-400px sm:max-w-500px xl:max-w-md mx-auto gap-2 md:gap-3">
                        <h1 class="h4 sm:h2 lg:h1 xl:display-6"><?php echo e($blog_post->title); ?></h1>
                        <ul class="post-share-icons nav-x gap-1 dark:text-white">
                            <li>
                                <a class="btn btn-md border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="<?php echo e($facebook_share); ?>" target="_blank" rel="noopener noreferrer">
                                    <i class="unicon-logo-facebook icon-1"></i>
                                </a>
                            </li>
                            <li>
                                <a class="btn btn-md border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="<?php echo e($twitter_share); ?>" target="_blank" rel="noopener noreferrer">
                                    <i class="unicon-logo-x-filled icon-1"></i>
                                </a>
                            </li>
                            <li>
                                <a class="btn btn-md border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="<?php echo e($linkedin_share); ?>" target="_blank" rel="noopener noreferrer">
                                    <i class="unicon-logo-linkedin icon-1"></i>
                                </a>
                            </li>
                            <li>
                                <a class="btn btn-md border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="<?php echo e($pinterest_share); ?>" target="_blank" rel="noopener noreferrer">
                                    <i class="unicon-logo-pinterest icon-1"></i>
                                </a>
                            </li>
                            <li>
                                <a class="btn btn-md border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="<?php echo e($email_share); ?>">
                                    <i class="unicon-email icon-1"></i>
                                </a>
                            </li>
                            <li>
                                <a class="btn btn-md border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="#" onclick="navigator.clipboard.writeText('<?php echo e($blog_url); ?>'); return false;" title="<?php echo e(__('Copy Link')); ?>">
                                    <i class="unicon-link icon-1"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <figure class="featured-image m-0">
                        <figure class="featured-image m-0 rounded ratio ratio-2x1 rounded uc-transition-toggle overflow-hidden">
                            <?php if(!empty($blog_image_url)): ?>
                                <img class="media-cover image uc-transition-scale-up uc-transition-opaque" src="<?php echo e($blog_image_url); ?>" alt="<?php echo e($blog_post->title); ?>">
                            <?php else: ?>
                                <img class="media-cover image uc-transition-scale-up uc-transition-opaque" src="<?php echo e(asset('themes/lexend-v4/assets/images/blog/post-full.jpg')); ?>" alt="<?php echo e($blog_post->title); ?>">
                            <?php endif; ?>
                        </figure>
                    </figure>
                </div>
            </div>
        </div>

        <!-- Post Content -->
        <div class="panel mt-4 lg:mt-6 xl:mt-9">
            <div class="container max-w-lg">
                <div class="post-content panel fs-6 md:fs-5" data-uc-lightbox="animation: scale">
                    <?php echo $blog_post->blog_content; ?>

                </div>

                <!-- Post Footer (Tags & Share) -->
                <div class="post-footer panel vstack sm:hstack gap-3 justify-between border-top py-4 mt-4 xl:py-9 xl:mt-9">
                    <?php if($blog_post->tags): ?>
                        <ul class="nav-x gap-narrow text-primary">
                            <li><span class="text-black dark:text-white me-narrow"><?php echo e(__('Tags:')); ?></span></li>
                            <?php
                                $all_tags = explode(',', $blog_post->tags);
                            ?>
                            <?php $__currentLoopData = $all_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $slug = \Illuminate\Support\Str::slug(trim($tag));
                                ?>
                                <?php if(!empty($slug)): ?>
                                    <li>
                                        <a href="<?php echo e(route('landlord.frontend.blog.tags.page', ['any' => $slug])); ?>" class="gap-0">
                                            <?php echo e(trim($tag)); ?>

                                            <?php if($index < count($all_tags) - 1): ?>
                                                <span class="text-black dark:text-white">,</span>
                                            <?php endif; ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                    <ul class="post-share-icons nav-x gap-narrow">
                        <li class="me-1"><span class="text-black dark:text-white"><?php echo e(__('Share:')); ?></span></li>
                        <li>
                            <a class="btn btn-md btn-outline-gray-100 w-32px lg:w-40px h-32px lg:h-40px text-dark dark:text-white dark:border-gray-600 hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="<?php echo e($facebook_share); ?>" target="_blank" rel="noopener noreferrer">
                                <i class="unicon-logo-facebook icon-1"></i>
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-md btn-outline-gray-100 w-32px lg:w-40px h-32px lg:h-40px text-dark dark:text-white dark:border-gray-600 hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="<?php echo e($twitter_share); ?>" target="_blank" rel="noopener noreferrer">
                                <i class="unicon-logo-x-filled icon-1"></i>
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-md btn-outline-gray-100 w-32px lg:w-40px h-32px lg:h-40px text-dark dark:text-white dark:border-gray-600 hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="<?php echo e($email_share); ?>">
                                <i class="unicon-email icon-1"></i>
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-md btn-outline-gray-100 w-32px lg:w-40px h-32px lg:h-40px text-dark dark:text-white dark:border-gray-600 hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="#" onclick="navigator.clipboard.writeText('<?php echo e($blog_url); ?>'); return false;" title="<?php echo e(__('Copy Link')); ?>">
                                <i class="unicon-link icon-1"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Author Section -->
                <?php if($author): ?>
                    <div class="post-author panel py-4 px-3 sm:p-3 xl:p-4 bg-gray-25 dark:bg-opacity-5 rounded lg:rounded-2">
                        <div class="row g-4 items-center">
                            <div class="col-12 sm:col-5 xl:col-3">
                                <figure class="featured-image m-0 rounded ratio ratio-1x1 uc-transition-toggle overflow-hidden">
                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque" src="<?php echo e($author_image_url); ?>" alt="<?php echo e($author_name); ?>">
                                </figure>
                            </div>
                            <div class="col">
                                <div class="panel vstack items-start gap-2 md:gap-3">
                                    <h4 class="h5 m-0"><?php echo e($author_name); ?></h4>
                                    <?php if($author->bio): ?>
                                        <p class="fs-6"><?php echo e($author->bio); ?></p>
                                    <?php else: ?>
                                        <p class="fs-6"><?php echo e(__('Content writer and contributor')); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Comments Section -->
                <div id="commont" class="post-comments panel mt-8 xl:mt-9 border-top pt-8 xl:pt-9">
                    <?php echo $__env->make('blog::landlord.frontend.partial.blog.comment-show-data', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>

                <!-- Comment Form -->
                <div class="comment-form-area panel mt-8 xl:mt-9">
                    <h3 class="h5 xl:h4 mb-4 xl:mb-6"><?php echo e(__('Post Your Comment')); ?></h3>
                    <div class="error-message"></div>
                    <?php
                        $user = Auth::guard('web')->user();
                    ?>

                    <?php if(!empty($user)): ?>
                        <?php echo $__env->make('blog::landlord.frontend.partial.blog.comment-area', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php else: ?>
                        <?php if(Auth::guard('admin')->user() == null): ?>
                            <div class="panel">
                                <div class="alert alert-info text-center">
                                    <p class="mb-3"><?php echo e(__('Please login to post a comment')); ?></p>
                                    <a href="<?php echo e(route('landlord.user.login')); ?>" class="btn btn-primary"><?php echo e(__('Login')); ?></a>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
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
                                <h2 class="h4 md:h3 lg:h2 m-0"><?php echo e(__('Get the latest updates')); ?></h2>
                                <p class="fs-6 lg:fs-5"><?php echo e(__('Subscribe to get our most-popular proposal eBook and more top revenue content to help you send docs faster.')); ?></p>
                                <form class="row child-cols g-1 mt-1 xl:mt-2" id="landlord-newsletter-form">
                                    <div>
                                        <input class="form-control h-48px xl:h-56px w-full bg-white dark:border-white dark:bg-opacity-10 dark:border-opacity-0 dark:text-white" type="email" name="email" placeholder="<?php echo e(__('Your email address')); ?>" required>
                                    </div>
                                    <div class="col-12 sm:col-auto">
                                        <button class="btn btn-md h-48px xl:h-56px w-100 lg:min-w-150px xl:min-w-200px btn-primary text-white" type="submit"><?php echo e(__('Subscribe')); ?></button>
                                    </div>
                                </form>
                                <p class="fs-7 text-dark dark:text-white text-opacity-70"><?php echo e(__('Don\'t worry we don\'t spam.')); ?></p>
                                <div class="form-message-show mt-2"></div>
                            </div>
                        </div>
                        <div class="md:col-auto d-none md:d-block">
                            <img class="w-250px lg:w-300px xl:w-400px d-block dark:d-none" src="<?php echo e(asset('themes/lexend-v4/assets/images/template/newsletter.svg')); ?>" alt="newsletter">
                            <img class="w-250px lg:w-300px xl:w-400px d-none dark:d-block" src="<?php echo e(asset('themes/lexend-v4/assets/images/template/newsletter-dark.svg')); ?>" alt="newsletter-dark">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
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

                    el.text('<?php echo e(__('Submitting')); ?>...');

                    $.ajax({
                        url: form.attr('action'),
                        method: 'POST',
                        data: {
                            _token: "<?php echo e(csrf_token()); ?>",
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
                                load_comment_data('<?php echo e($blog_post->id); ?>', 'load-one');

                                $('#blog-comment-form input[name=comment_id]').val('');
                                $('#comment_content').attr('placeholder','<?php echo e(__('Post Comments')); ?>');
                            }

                            el.text('<?php echo e(__('Comment')); ?>');
                        },
                        error: function (data) {
                            var errors = data.responseJSON;
                            erContainer.html('<div class="alert alert-danger"></div>');
                            $.each(errors.errors, function (index, value) {
                                erContainer.find('.alert.alert-danger').append('<p>' + value + '</p>');
                            });
                            el.text('<?php echo e(__('Comment')); ?>');
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
                    $('#comment_content').attr('placeholder','<?php echo e(__('Replying to')); ?> '+ parent_name + '..');

                    $('html').animate({
                        scrollTop: $("#comment_content").offset().top-500
                    },100,'linear');
                });

                function load_comment_data(id, type) {
                    var commentData = $('#comment_data');
                    var items = commentData.attr('data-items');

                    $.ajax({
                        url: "<?php echo e(route('landlord.frontend.load.blog.comment.data')); ?>",
                        method: "POST",
                        data: {id: id, _token: "<?php echo e(csrf_token()); ?>", items: items, type: type},
                        success: function (data) {
                            commentData.attr('data-items',parseInt(items) + 5);
                            commentData.find('ul').append(data.markup);
                            $('#load_more_comment_button').text('<?php echo e(__('Load More')); ?>');

                            if (data.blogComments.length === 0) {
                                $('#load_more_comment_button').text('<?php echo e(__('No More Comment Found')); ?>');
                            }
                        }
                    })
                }

                $(document).on('click', '#load_more_comment_button', function () {
                    $(this).text('<?php echo e(__('Loading...')); ?>');
                    load_comment_data('<?php echo e($blog_post->id); ?>', 'load-more');
                });
            });
        })(jQuery);
    </script>

    <?php if (isset($component)) { $__componentOriginal9db1ea536b7cb25ca07d13bb755b15ed = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9db1ea536b7cb25ca07d13bb755b15ed = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.custom-js.ajax-login','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('custom-js.ajax-login'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9db1ea536b7cb25ca07d13bb755b15ed)): ?>
<?php $attributes = $__attributesOriginal9db1ea536b7cb25ca07d13bb755b15ed; ?>
<?php unset($__attributesOriginal9db1ea536b7cb25ca07d13bb755b15ed); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9db1ea536b7cb25ca07d13bb755b15ed)): ?>
<?php $component = $__componentOriginal9db1ea536b7cb25ca07d13bb755b15ed; ?>
<?php unset($__componentOriginal9db1ea536b7cb25ca07d13bb755b15ed); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('themes.lexend-v4.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\jihost_v1\core\resources\views/themes/lexend-v4/blog/blog-single.blade.php ENDPATH**/ ?>