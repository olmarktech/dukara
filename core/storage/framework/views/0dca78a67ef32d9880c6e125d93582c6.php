<!DOCTYPE html>
<html lang="<?php echo e(\App\Facades\GlobalLanguage::user_lang_slug()); ?>" dir="<?php echo e(\App\Facades\GlobalLanguage::user_lang_dir()); ?>">
<head>
    <?php echo renderHeadStartHooks(); ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    
    <?php if(isset($page_post) && $page_post->id == get_static_option('home_page')): ?>
        <title><?php echo e(get_static_option('site_title')); ?><?php if(!empty(get_static_option('site_tag_line'))): ?> - <?php echo e(get_static_option('site_tag_line')); ?><?php endif; ?></title>
        <?php echo render_site_seo(); ?>

    <?php else: ?>
        <?php if(!empty(SEOMeta::generate())): ?>
            <?php echo SEOMeta::generate(); ?>

        <?php else: ?>
            <title><?php echo $__env->yieldContent('page-title', get_static_option('site_title')); ?></title>
            <link rel="canonical" href="<?php echo e(canonical_url()); ?>"/>
        <?php endif; ?>
        <?php echo OpenGraph::generate(); ?>

        <?php echo Twitter::generate(); ?>

        <?php echo JsonLd::generate(); ?>

    <?php endif; ?>

    
    <?php echo render_favicon_by_id(get_static_option('site_favicon')); ?>


    
    <link rel="stylesheet" href="<?php echo e(asset('themes/lexend-v4/assets/js/uni-core/css/uni-core.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('themes/lexend-v4/assets/css/fonts.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('themes/lexend-v4/assets/css/unicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('themes/lexend-v4/assets/css/swiper-bundle.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('themes/lexend-v4/assets/css/prettify.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('themes/lexend-v4/assets/css/magic-cursor.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('themes/lexend-v4/assets/css/theme/main.purge.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('themes/lexend-v4/assets/css/theme/theme-thirteen.purge.css')); ?>">

    
    <link rel="stylesheet" href="<?php echo e(global_asset('assets/common/css/toastr.css')); ?>">
    <?php echo $__env->yieldContent('style'); ?>

    <?php echo renderHeadEndHooks(); ?>


    <?php if(get_static_option('site_third_party_tracking_code')): ?>
        <script><?php echo get_static_option('site_third_party_tracking_code'); ?></script>
    <?php endif; ?>
</head>

<body class="uni-body panel bg-white text-tertiary-900 dark:bg-gray-900 dark:text-gray-200 overflow-x-hidden disable-cursor">
    <?php echo renderBodyStartHooks(); ?>


    
    <?php echo $__env->make('themes.lexend-v4.layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <div id="wrapper" class="wrap">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    
    <?php echo $__env->make('themes.lexend-v4.layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <div class="backtotop-wrap position-fixed ltr:end-0 ltr:start-auto rtl:start-0 rtl:end-auto top-auto bottom-0 z-99 m-2 vstack">
        <div class="darkmode-trigger cstack w-40px h-40px rounded-circle text-none bg-gray-100 dark:bg-gray-700 dark:text-white" data-darkmode-toggle="">
            <label class="switch">
                <span class="sr-only">Dark mode toggle</span>
                <input type="checkbox">
                <span class="slider fs-5"></span>
            </label>
        </div>
        <a class="btn btn-sm bg-primary text-white w-40px h-40px rounded-circle" href="#wrapper" data-uc-backtotop>
            <i class="icon-2 unicon-chevron-up"></i>
        </a>
    </div>

    
    <script src="<?php echo e(asset('themes/lexend-v4/assets/js/uni-core/js/uni-core-bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('themes/lexend-v4/assets/js/libs/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('themes/lexend-v4/assets/js/libs/scrollmagic.min.js')); ?>"></script>
    <script src="<?php echo e(asset('themes/lexend-v4/assets/js/libs/swiper-bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('themes/lexend-v4/assets/js/libs/anime.min.js')); ?>"></script>
    <script src="<?php echo e(asset('themes/lexend-v4/assets/js/libs/gsap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('themes/lexend-v4/assets/js/core/magic-cursor.js')); ?>"></script>
    <script src="<?php echo e(asset('themes/lexend-v4/assets/js/helpers/data-attr-helper.js')); ?>"></script>
    <script src="<?php echo e(asset('themes/lexend-v4/assets/js/helpers/swiper-helper.js')); ?>"></script>
    <script src="<?php echo e(asset('themes/lexend-v4/assets/js/helpers/anime-helper.js')); ?>"></script>
    <script src="<?php echo e(asset('themes/lexend-v4/assets/js/uikit-components-bs.js')); ?>"></script>
    
    
    <script>
        // Initialize isDarkMode as a function that checks dark mode status
        window.isDarkMode = function() {
            return localStorage.getItem('darkMode') === 'true' || 
                   (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches);
        };
        
        // Apply dark mode class on page load
        if (isDarkMode()) {
            document.documentElement.classList.add('dark');
        }
        
        // Make it available globally for compatibility
        var isDarkMode = window.isDarkMode;
    </script>
    
    <script src="<?php echo e(asset('themes/lexend-v4/assets/js/app.js')); ?>"></script>
    
    
    <script src="<?php echo e(global_asset('assets/common/js/toastr.min.js')); ?>"></script>
    
    <?php echo $__env->yieldContent('scripts'); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>

    <?php echo renderBodyEndHooks(); ?>

</body>
</html>

<?php /**PATH C:\wamp64\www\jihost_v1\core\resources\views/themes/lexend-v4/layouts/app.blade.php ENDPATH**/ ?>