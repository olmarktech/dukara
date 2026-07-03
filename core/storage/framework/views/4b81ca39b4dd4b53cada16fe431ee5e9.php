
<footer id="uc-footer" class="uc-footer panel overflow-hidden ft-tertiary">
    <div class="footer-outer py-6 lg:py-8 xl:py-9 dark:text-white">
        <div class="uc-footer-content">
            <div class="container">
                <div class="uc-footer-inner vstack gap-4 lg:gap-6 xl:gap-8">
                    <div class="uc-footer-widgets panel">
                        <div class="row child-cols-6 md:child-cols col-match g-4 xl:g-6">
                            <div class="lg:col-4">
                                <div class="panel vstack gap-2">
                                    <div class="uc-footer-logo">
                                        <?php
                                            $footer_logo = get_attachment_image_by_id(get_static_option('site_white_logo'), 'full', false);
                                        ?>
                                        <a class="panel text-none h5 fw-bold text-dark dark:text-white" href="<?php echo e(route('landlord.homepage')); ?>">
                                            <?php if(!empty($footer_logo)): ?>
                                                <img src="<?php echo e($footer_logo['img_url'] ?? ''); ?>" alt="<?php echo e(get_static_option('site_title')); ?>" style="max-height: 40px;">
                                            <?php else: ?>
                                                <?php echo e(get_static_option('site_title')); ?>

                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    <p class="uc-footer-description fs-6 opacity-70">
                                        <?php echo get_static_option('site_footer_about_text') ?? __('A professional SaaS platform for your business.'); ?>

                                    </p>
                                    <?php if(!empty(get_static_option('social_facebook')) || !empty(get_static_option('social_twitter')) || !empty(get_static_option('social_instagram'))): ?>
                                        <ul class="uc-footer-socials nav-x gap-1 dark:text-white">
                                            <?php if(!empty(get_static_option('social_facebook'))): ?>
                                                <li><a href="<?php echo e(get_static_option('social_facebook')); ?>" target="_blank"><i class="unicon-logo-facebook icon-1"></i></a></li>
                                            <?php endif; ?>
                                            <?php if(!empty(get_static_option('social_twitter'))): ?>
                                                <li><a href="<?php echo e(get_static_option('social_twitter')); ?>" target="_blank"><i class="unicon-logo-x-filled icon-1"></i></a></li>
                                            <?php endif; ?>
                                            <?php if(!empty(get_static_option('social_instagram'))): ?>
                                                <li><a href="<?php echo e(get_static_option('social_instagram')); ?>" target="_blank"><i class="unicon-logo-instagram icon-1"></i></a></li>
                                            <?php endif; ?>
                                            <?php if(!empty(get_static_option('social_linkedin'))): ?>
                                                <li><a href="<?php echo e(get_static_option('social_linkedin')); ?>" target="_blank"><i class="unicon-logo-linkedin icon-1"></i></a></li>
                                            <?php endif; ?>
                                            <?php if(!empty(get_static_option('social_youtube'))): ?>
                                                <li><a href="<?php echo e(get_static_option('social_youtube')); ?>" target="_blank"><i class="unicon-logo-youtube icon-1"></i></a></li>
                                            <?php endif; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            
                            <div>
                                <div class="panel vstack gap-2">
                                    <h4 class="h6 lg:h5 m-0 text-dark dark:text-white"><?php echo e(__('Company')); ?></h4>
                                    <ul class="nav-y gap-1 fw-normal fs-6 opacity-70">
                                        <li><a href="<?php echo e(route('landlord.homepage')); ?>"><?php echo e(__('Home')); ?></a></li>
                                        <li><a href="#"><?php echo e(__('About')); ?></a></li>
                                        <li><a href="#"><?php echo e(__('Contact')); ?></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <div class="panel vstack gap-2">
                                    <h4 class="h6 lg:h5 m-0 text-dark dark:text-white"><?php echo e(__('Support')); ?></h4>
                                    <ul class="nav-y gap-1 fw-normal fs-6 opacity-70">
                                        <li><a href="#"><?php echo e(__('Help Center')); ?></a></li>
                                        <li><a href="#"><?php echo e(__('Privacy Policy')); ?></a></li>
                                        <li><a href="#"><?php echo e(__('Terms of Service')); ?></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="uc-footer-bottom panel vstack sm:hstack justify-between gap-2 fs-7 opacity-60 dark:border-white border-top pt-4">
                        <div class="vstack sm:hstack items-center gap-1 lg:gap-2 text-center">
                            <p class="opacity-70 dark:text-white">
                                <?php echo e(get_static_option('site_footer_copyright_text') ?? __('Copyright © '.date('Y').' '.get_static_option('site_title').'. All Rights Reserved.')); ?>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php /**PATH C:\wamp64\www\jihost_v1\core\resources\views/themes/lexend-v4/layouts/footer.blade.php ENDPATH**/ ?>