<?php
    // Theme Showcase Section - Lexend v4 Style
    $title = $data['title'] ?? '';
    $subtitle = $data['subtitle'] ?? '';
    
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

<!-- Theme Showcase Section -->
<div id="themes_showcase" class="themes-showcase section panel overflow-hidden">
    <div class="section-outer panel py-6 sm:py-8 xl:py-10">
        <div class="container">
            <div class="section-inner panel" data-anime="onview: -200; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500; delay: anime.stagger(100, {start: 200});">
                
                
                <div class="section-heading panel vstack items-center gap-2 xl:gap-3 mb-4 sm:mb-6 xl:mb-8 max-w-700px mx-auto text-center">
                    <?php if($title): ?>
                        <h2 class="h3 sm:h2 xl:h1 m-0"><?php echo $final_title; ?></h2>
                    <?php endif; ?>
                    <?php if($subtitle): ?>
                        <p class="fs-6 xl:fs-5 text-dark dark:text-white text-opacity-70"><?php echo e($subtitle); ?></p>
                    <?php endif; ?>
                </div>

                
                <div class="section-content panel">
                    <div class="row child-cols-12 sm:child-cols-6 lg:child-cols-4 g-2 sm:g-3 xl:g-4">
                        
                        <?php $__currentLoopData = getAllThemeData(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $theme_slug = $theme->slug;
                                $theme_data = getIndividualThemeDetails($theme_slug);
                                $theme_image = loadScreenshot($theme_slug);
                                
                                $theme_custom_name = get_static_option_central($theme_data['slug'].'_theme_name');
                                $theme_custom_url = get_static_option_central($theme_data['slug'].'_theme_url');
                                $custom_theme_image = get_static_option_central($theme_data['slug'].'_theme_image');
                                
                                $theme_name = !empty($theme_custom_name) ? $theme_custom_name : $theme_data['name'];
                                $theme_url = !empty($theme_custom_url) ? $theme_custom_url : '#';
                                $theme_img = !empty($custom_theme_image) ? $custom_theme_image : $theme_image;
                            ?>
                            
                            <div class="<?php echo e($theme_slug); ?>-theme-card">
                                <div class="theme-card panel overflow-hidden vstack gap-2 p-2 border bg-white dark:bg-gray-800 dark:bg-opacity-50 dark:border-gray-700 duration-150 hover:-translate-y-1 hover:shadow-lg rounded-2">
                                    
                                    
                                    <figure class="theme-image m-0 rounded-1-5 ratio ratio-16x9 uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-900">
                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque" 
                                             src="<?php echo e($theme_img); ?>" 
                                             alt="<?php echo e($theme_name); ?>"
                                             loading="lazy">
                                        <a href="<?php echo e($theme_url); ?>" 
                                           class="position-cover" 
                                           target="_blank"
                                           data-caption="<?php echo e($theme_name); ?>"></a>
                                    </figure>
                                    
                                    
                                    <div class="theme-info panel hstack justify-between items-center gap-2 px-1">
                                        <div class="theme-title">
                                            <a href="<?php echo e($theme_url); ?>" 
                                               class="h6 m-0 text-none text-dark dark:text-white hover:text-primary dark:hover:text-quaternary" 
                                               target="_blank">
                                                <?php echo e($theme_name); ?>

                                            </a>
                                        </div>
                                        <a href="<?php echo e($theme_url); ?>" 
                                           class="theme-link cstack w-32px h-32px rounded-circle bg-primary-50 dark:bg-gray-700 text-primary dark:text-quaternary hover:bg-primary hover:text-white dark:hover:bg-quaternary dark:hover:text-dark duration-150" 
                                           target="_blank"
                                           aria-label="View <?php echo e($theme_name); ?>">
                                            <i class="icon unicon-arrow-up-right fw-bold"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </div>
                </div>

                
                <?php if(array_key_exists('theme_url', $data) && !empty($data['theme_url'])): ?>
                    <div class="section-footer panel mt-6 sm:mt-8 text-center" data-anime="onview: -200; translateY: [24, 0]; opacity: [0, 1]; easing: easeOutCubic; duration: 500; delay: 350;">
                        <a href="<?php echo e($data['theme_url']); ?>" 
                           class="btn btn-md btn-primary text-white shadow-xs hover:shadow-md"
                           <?php if($data['target'] ?? false): ?> target="_blank" <?php endif; ?>>
                            <span><?php echo e($data['theme_text'] ?? __('View All Themes')); ?></span>
                            <i class="icon unicon-arrow-right fw-bold"></i>
                        </a>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>

<style>
/* Theme Showcase Styles */
.theme-card {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.theme-card:hover .theme-image img {
    transform: scale(1.05);
}

.theme-link {
    transition: all 0.2s ease;
}

@media (max-width: 640px) {
    .themes-showcase .row {
        margin-left: -8px;
        margin-right: -8px;
    }
}
</style>
<?php /**PATH C:\wamp64\www\jihost_v1\core\resources\views/themes/lexend-v4/widgets/theme.blade.php ENDPATH**/ ?>