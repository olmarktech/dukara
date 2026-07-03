<?php
    // Pre-render PageBuilder content BEFORE entering sections to avoid section stack corruption
    $pageBuilderOutput = '';
    if (isset($page_post) && $page_post && $page_post->page_builder == 1) {
        $pageBuilderOutput = \Plugins\PageBuilder\PageBuilderSetup::render_frontend_pagebuilder_content_for_dynamic_page('dynamic_page', $page_post->id);
        // Sanitize any stray Blade directives
        $pageBuilderOutput = preg_replace('/@endsection\s*/', '', $pageBuilderOutput);
        $pageBuilderOutput = preg_replace('/@section\s*\([^)]+\)\s*/', '', $pageBuilderOutput);
    }
?>



<?php $__env->startSection('page-title', $page_post->title ?? ''); ?>

<?php $__env->startSection('content'); ?>
    
    <?php if(isset($page_post) && $page_post && $page_post->page_builder == 1): ?>
        <?php if(isset($page_post->visibility) && $page_post->visibility == 1): ?>
            <?php if(auth('web')->check()): ?>
                
                <?php echo $pageBuilderOutput; ?>

            <?php else: ?>
                <div class="section panel overflow-hidden">
                    <div class="section-outer panel py-6 lg:py-9">
                        <div class="container max-w-xl">
                            <div class="alert alert-warning text-center">
                                <p><a class="uc-link text-primary" href="<?php echo e(route('landlord.user.login')); ?>"><?php echo e(__('Login')); ?></a> <?php echo e(__('to see this page')); ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php else: ?>
            
            <?php echo $pageBuilderOutput; ?>

        <?php endif; ?>
    <?php elseif(isset($page_post) && $page_post): ?>
        
        <div class="section panel overflow-hidden">
            <div class="section-outer panel py-6 lg:py-9">
                <div class="container max-w-xl">
                    <div class="section-inner panel">
                        <?php if(isset($page_post->visibility) && $page_post->visibility == 1): ?>
                            <?php if(auth('web')->check()): ?>
                                <div class="dynamic-page-content-wrap">
                                    <?php echo $page_post->page_content ?? ''; ?>

                                </div>
                            <?php else: ?>
                                <div class="alert alert-warning text-center">
                                    <p><a class="uc-link text-primary" href="<?php echo e(route('landlord.user.login')); ?>"><?php echo e(__('Login')); ?></a> <?php echo e(__('to see this page')); ?> </p>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="dynamic-page-content-wrap">
                                <?php echo $page_post->page_content ?? ''; ?>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if(isset($page_post) && Auth::guard('admin')->user()): ?>
        <?php echo $__env->make('tenant.frontend.partials.inpage-edit',['page_post' => $page_post], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('themes.lexend-v4.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\jihost_v1\core\resources\views/themes/lexend-v4/pages/dynamic-single.blade.php ENDPATH**/ ?>