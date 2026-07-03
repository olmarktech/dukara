
<header class="uc-header header-thirteen uc-navbar-sticky-wrap z-999" data-uc-sticky="start: 100vh; show-on-up: true; animation: uc-animation-slide-top; sel-target: .uc-navbar-container; cls-active: uc-navbar-sticky; cls-inactive: uc-navbar-transparent; end: !*;">
    <nav class="uc-navbar-container uc-navbar-float ft-tertiary z-1" data-anime="translateY: [-40, 0]; opacity: [0, 1]; easing: easeOutExpo; duration: 750; delay: 0;">
        <div class="uc-navbar-main" style="--uc-nav-height: 100px">
            <div class="container">
                <div class="uc-navbar min-h-64px lg:min-h-96px text-dark dark:text-white" data-uc-navbar="animation: uc-animation-slide-top-small; duration: 150;">
                    <div class="uc-navbar-left">
                        <div class="uc-logo ltr:ms-1 rtl:me-1">
                            <a class="panel text-none" href="<?php echo e(route('landlord.homepage')); ?>" style="width: 140px;">
                                <?php
                                    $site_logo = get_attachment_image_by_id(get_static_option('site_logo'), 'full', false);
                                    $site_logo_dark = get_attachment_image_by_id(get_static_option('site_logo_dark'), 'full', false);
                                ?>
                                <?php if(!empty($site_logo)): ?>
                                    <img class="dark:d-none" src="<?php echo e($site_logo['img_url'] ?? ''); ?>" alt="<?php echo e(get_static_option('site_title')); ?>">
                                <?php endif; ?>
                                <?php if(!empty($site_logo_dark)): ?>
                                    <img class="d-none dark:d-block" src="<?php echo e($site_logo_dark['img_url'] ?? ''); ?>" alt="<?php echo e(get_static_option('site_title')); ?>">
                                <?php elseif(!empty($site_logo)): ?>
                                    <img class="d-none dark:d-block" src="<?php echo e($site_logo['img_url'] ?? ''); ?>" alt="<?php echo e(get_static_option('site_title')); ?>">
                                <?php else: ?>
                                    <span class="h4"><?php echo e(get_static_option('site_title')); ?></span>
                                <?php endif; ?>
                            </a>
                        </div>
                    </div>

                    <div class="uc-navbar-center">
                        <ul class="uc-navbar-nav fw-medium gap-3 xl:gap-5 d-none lg:d-flex" style="--uc-nav-height: 100px">
                            
                            <?php
                                $home_page_id = get_static_option('home_page');
                                $all_pages = \App\Models\Page::where('status', 1)
                                    ->where('id', '!=', $home_page_id)
                                    ->where(function($query) {
                                        $query->where('slug', 'not like', '%sample%')
                                              ->where('slug', 'not like', '%privacy%')
                                              ->where('slug', 'not like', '%terms%')
                                              ->where('slug', '!=', 'privacy-policy')
                                              ->where('slug', '!=', 'privacy')
                                              ->where('slug', '!=', 'terms-and-conditions')
                                              ->where('slug', '!=', 'terms')
                                              ->where('slug', '!=', 'terms-of-service')
                                              ->where('slug', '!=', 'sample');
                                    })
                                    ->orderBy('id', 'asc')
                                    ->get();
                            ?>
                            <?php $__currentLoopData = $all_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e(url('/' . $page->slug)); ?>" class="text-none <?php echo e(request()->is($page->slug) ? 'text-primary' : ''); ?>"><?php echo e($page->title); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            <?php if(!empty($primary_menu)): ?>
                                <?php echo render_frontend_menu($primary_menu->id); ?>

                            <?php endif; ?>
                        </ul>
                    </div>

                    <div class="uc-navbar-right">
                        <div class="uc-navbar-item gap-1 d-none lg:d-flex">
                            <?php if(!auth('web')->check()): ?>
                                <a href="<?php echo e(route('landlord.user.login')); ?>" class="btn btn-sm btn-alt-primary rounded-pill px-3">
                                    <span><?php echo e(__('Log in')); ?></span>
                                </a>
                                <a href="<?php echo e(route('landlord.user.register')); ?>" class="btn btn-sm btn-primary rounded-pill px-3">
                                    <span><?php echo e(__('Sign up')); ?></span>
                                </a>
                            <?php else: ?>
                                <a href="<?php echo e(route('landlord.user.home')); ?>" class="btn btn-sm btn-primary rounded-pill px-3">
                                    <span><?php echo e(__('Dashboard')); ?></span>
                                </a>
                            <?php endif; ?>
                        </div>

                        
                        <a class="d-block lg:d-none" href="#uc-menu-panel" data-uc-toggle>
                            <i class="icon-2 unicon-menu"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>


<div id="uc-menu-panel" data-uc-offcanvas="overlay: true;">
    <div class="uc-offcanvas-bar bg-white text-dark dark:bg-gray-900 dark:text-white">
        <button class="uc-offcanvas-close rtl:end-auto rtl:start-0 m-1 mt-2 icon-3 btn border-0 dark:text-white" type="button">
            <i class="unicon-close"></i>
        </button>
        <div class="panel">
            <ul class="nav-y gap-narrow fw-medium fs-6" data-uc-nav>
                
                <?php
                    $home_page_id = get_static_option('home_page');
                    $all_pages = \App\Models\Page::where('status', 1)
                        ->where('id', '!=', $home_page_id)
                        ->where(function($query) {
                            $query->where('slug', 'not like', '%sample%')
                                  ->where('slug', 'not like', '%privacy%')
                                  ->where('slug', 'not like', '%terms%')
                                  ->where('slug', '!=', 'privacy-policy')
                                  ->where('slug', '!=', 'privacy')
                                  ->where('slug', '!=', 'terms-and-conditions')
                                  ->where('slug', '!=', 'terms')
                                  ->where('slug', '!=', 'terms-of-service')
                                  ->where('slug', '!=', 'sample');
                        })
                        ->orderBy('id', 'asc')
                        ->get();
                ?>
                <?php $__currentLoopData = $all_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="<?php echo e(url('/' . $page->slug)); ?>" class="text-none <?php echo e(request()->is($page->slug) ? 'text-primary' : ''); ?>"><?php echo e($page->title); ?></a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <?php if(!auth('web')->check()): ?>
                    <li>
                        <a href="<?php echo e(route('landlord.user.login')); ?>" class="text-none"><?php echo e(__('Log in')); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('landlord.user.register')); ?>" class="text-none"><?php echo e(__('Sign up')); ?></a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="<?php echo e(route('landlord.user.home')); ?>" class="text-none"><?php echo e(__('Dashboard')); ?></a>
                    </li>
                <?php endif; ?>
                
                <?php if(!empty($primary_menu)): ?>
                    <?php echo render_frontend_menu($primary_menu->id); ?>

                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>

<?php /**PATH C:\wamp64\www\jihost_v1\core\resources\views/themes/lexend-v4/layouts/header.blade.php ENDPATH**/ ?>