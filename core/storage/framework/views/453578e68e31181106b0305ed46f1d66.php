<?php
    // Blog Posts section - EXACT from index-13.html line 1605-1724
    $title = $data['title'] ?? '';
    $subtitle = $data['subtitle'] ?? '';
    $blogs = $data['blogs'] ?? [];
?>

<!-- Section start -->
<div id="blog_posts" class="blog-posts section panel overflow-hidden swiper-parent">
    <div class="section-outer panel overflow-hidden py-6 sm:py-8 xl:py-10 lg:mx-2 rounded-2 xl:rounded-3 bg-secondary dark:bg-gray-800">
        <div class="container">
            <div class="section-inner panel" data-anime="onview: -200; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500; delay: anime.stagger(100, {start: 200});">
                <div class="section-heading panel vstack items-center gap-2 xl:gap-3 mb-4 sm:mb-6 xl:mb-8 max-w-700px mx-auto text-center">
                    <?php if($title): ?>
                        <?php
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
                        ?>
                        <h2 class="h3 sm:h2 xl:h1 m-0"><?php echo $final_title; ?></h2>
                    <?php endif; ?>
                </div>
                <div class="section-content panel">
                    <div class="swiper overflow-unset lg:overflow-hidden pt-2" data-uc-swiper="items: 1.1; gap: 8; center: true; dots: .swiper-pagination;" data-uc-swiper-s="items: 2.3; gap: 8; active: 1; center: true;" data-uc-swiper-m="items: 3; gap: 8; center: false;" data-uc-swiper-l="items: 3; gap: 16; center: false;">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide">
                                    <article class="post type-post panel overflow-hidden vstack p-2 border bg-white dark:bg-opacity-5 duration-150 hover:-translate-y-1 rounded-1-5">
                                        <figure class="featured-image m-0 rounded ratio ratio-16x9 rounded-default uc-transition-toggle overflow-hidden">
                                            <?php if(!empty($blog->image)): ?>
                                                <?php echo render_image_markup_by_attachment_id($blog->image, $blog->title, 'full', false, ['class' => 'media-cover image uc-transition-scale-up uc-transition-opaque']); ?>

                                            <?php else: ?>
                                                <img class="media-cover image uc-transition-scale-up uc-transition-opaque" src="<?php echo e(asset('themes/lexend-v4/assets/images/blog/post-7.jpg')); ?>" alt="<?php echo e($blog->title); ?>">
                                            <?php endif; ?>
                                            <a href="<?php echo e(route('landlord.frontend.blog.single', $blog->slug)); ?>" class="position-cover" data-caption="<?php echo e($blog->title); ?>"></a>
                                        </figure>
                                        <div class="panel vstack justify-between gap-2 p-1 pt-2 xl:p-2">
                                            <div class="content vstack gap-1 xl:gap-2">
                                                <?php if(!empty($blog->category) && !empty($blog->category->title)): ?>
                                                    <a href="<?php echo e(route('landlord.frontend.blog.category', [$blog->category->id, $blog->category->slug ?? ''])); ?>" class="post-excrept fs-7 text-uppercase text-none text-gray-300 dark:text-gray-200"><?php echo e($blog->category->title); ?></a>
                                                <?php endif; ?>
                                                <a class="text-none" href="<?php echo e(route('landlord.frontend.blog.single', $blog->slug)); ?>">
                                                    <h3 class="post-title h5 xl:h4 m-0 ltr:pe-4 rtl:ps-4 dark:text-white"><span><?php echo e($blog->title); ?></span></h3>
                                                </a>
                                            </div>
                                            <a href="<?php echo e(route('landlord.frontend.blog.single', $blog->slug)); ?>" class="uc-link text-primary dark:text-quaternary fs-7 xl:fs-6 fw-bold hstack gap-1 sm:mt-1 xl:mt-2">
                                                <span><?php echo e(__('Read this article')); ?></span>
                                                <i class="position-relative icon unicon-arrow-right fw-bold rtl:-rotate-90 translate-y-px"></i>
                                            </a>
                                        </div>
                                    </article>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <div class="section-footer panel mt-6 sm:mt-6 h-8px">
                    <div class="swiper-pagination position-absolute bottom-0 text-primary dark:text-quaternary m-0 justify-center"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->





<?php /**PATH C:\wamp64\www\jihost_v1\core\resources\views/themes/lexend-v4/widgets/blog-slider-one.blade.php ENDPATH**/ ?>