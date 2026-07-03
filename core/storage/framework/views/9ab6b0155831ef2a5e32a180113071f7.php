<?php
    $heading = $data['heading'] ?? '';
    $blog_posts = $data['blog_posts'] ?? [];
    $padding_top = $data['padding_top'] ?? '100px';
    $padding_bottom = $data['padding_bottom'] ?? '100px';
?>
<!-- Section start -->
<div id="blog_posts" class="blog-posts section panel overflow-hidden swiper-parent" style="padding-top: <?php echo e($padding_top); ?>; padding-bottom: <?php echo e($padding_bottom); ?>;">
    <div class="section-outer panel overflow-hidden py-6 sm:py-8 xl:py-10 lg:mx-2 rounded-2 xl:rounded-3 bg-secondary dark:bg-gray-800">
        <div class="container">
            <div class="section-inner panel" data-anime="onview: -200; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500; delay: anime.stagger(100, {start: 200});">
                <?php if($heading): ?>
                    <div class="section-heading panel vstack items-center gap-2 xl:gap-3 mb-4 sm:mb-6 xl:mb-8 max-w-700px mx-auto text-center">
                        <h2 class="h3 sm:h2 xl:h1 m-0"><?php echo $heading; ?></h2>
                    </div>
                <?php endif; ?>
                <div class="section-content panel">
                    <div class="swiper overflow-unset lg:overflow-hidden pt-2" data-uc-swiper="items: 1.1; gap: 8; center: true; dots: .swiper-pagination;" data-uc-swiper-s="items: 2.3; gap: 8; active: 1; center: true;" data-uc-swiper-m="items: 3; gap: 8; center: false;" data-uc-swiper-l="items: 3; gap: 16; center: false;">
                        <div class="swiper-wrapper">
                            <?php if(!empty($blog_posts)): ?>
                                <?php $__currentLoopData = $blog_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="swiper-slide">
                                        <article class="post type-post panel overflow-hidden vstack p-2 border bg-white dark:bg-opacity-5 duration-150 hover:-translate-y-1 rounded-1-5">
                                            <figure class="featured-image m-0 rounded ratio ratio-16x9 rounded-default uc-transition-toggle overflow-hidden">
                                                <?php
                                                    $post_img = get_attachment_image_by_id($post['image'] ?? '', 'full', false);
                                                ?>
                                                <?php if(!empty($post_img['img_url'])): ?>
                                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque" src="<?php echo e($post_img['img_url']); ?>" alt="<?php echo e($post['title'] ?? ''); ?>">
                                                <?php else: ?>
                                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque" src="<?php echo e(asset('themes/lexend-v4/assets/images/blog/post-7.jpg')); ?>" alt="<?php echo e($post['title'] ?? ''); ?>">
                                                <?php endif; ?>
                                                <a href="<?php echo e($post['url'] ?? '#'); ?>" class="position-cover" data-caption="<?php echo e($post['title'] ?? ''); ?>"></a>
                                            </figure>
                                            <div class="panel vstack justify-between gap-2 p-1 pt-2 xl:p-2">
                                                <div class="content vstack gap-1 xl:gap-2">
                                                    <span class="post-excrept fs-7 text-uppercase text-none text-gray-300 dark:text-gray-200"><?php echo e($post['category'] ?? 'Blog'); ?></span>
                                                    <a class="text-none" href="<?php echo e($post['url'] ?? '#'); ?>">
                                                        <h3 class="post-title h5 xl:h4 m-0 ltr:pe-4 rtl:ps-4 dark:text-white"><span><?php echo e($post['title'] ?? ''); ?></span></h3>
                                                    </a>
                                                </div>
                                                <a href="<?php echo e($post['url'] ?? '#'); ?>" class="uc-link text-primary dark:text-quaternary fs-7 xl:fs-6 fw-bold hstack gap-1 sm:mt-1 xl:mt-2">
                                                    <span>Read this article</span>
                                                    <i class="position-relative icon unicon-arrow-right fw-bold rtl:-rotate-90 translate-y-px"></i>
                                                </a>
                                            </div>
                                        </article>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php if(!empty($blog_posts)): ?>
                <div class="section-footer panel mt-6 sm:mt-6 h-8px">
                    <div class="swiper-pagination position-absolute bottom-0 text-primary dark:text-quaternary m-0 justify-center"></div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->
<?php /**PATH C:\wamp64\www\jihost_v1\core\plugins\PageBuilder/views/tenant/lexend-v4/blog-posts.blade.php ENDPATH**/ ?>