<?php
    $title = $data['title'] ?? '';
    $subtitle = $data['subtitle'] ?? '';
    $padding_top = $data['padding_top'] ?? '80';
    $padding_bottom = $data['padding_bottom'] ?? '80';
    $section_id = $data['section_id'] ?? '';
    
    if (str_contains($title, '{h}') && str_contains($title, '{/h}')) {
        $text = explode('{h}', $title);
        $highlighted_word = explode('{/h}', $text[1])[0];
        $highlighted_text = '<span class="text-primary dark:text-quaternary">'. $highlighted_word .'</span>';
        $final_title = str_replace('{h}'.$highlighted_word.'{/h}', $highlighted_text, $title);
    } else {
        $final_title = $title;
    }
?>

<div id="<?php echo e($section_id); ?>" class="how-it-works section panel overflow-hidden" style="padding-top: <?php echo e($padding_top); ?>px; padding-bottom: <?php echo e($padding_bottom); ?>px;">
    <div class="container">
        <div class="panel vstack items-center gap-2 lg:gap-4 mb-4 sm:mb-6 max-w-700px mx-auto text-center">
            <?php if($title): ?>
                <h2 class="h3 lg:h2 m-0"><?php echo $final_title; ?></h2>
            <?php endif; ?>
            <?php if($subtitle): ?>
                <p class="fs-6 xl:fs-5 opacity-70"><?php echo e($subtitle); ?></p>
            <?php endif; ?>
        </div>

        <?php if(array_key_exists('repeater_title_', $data['repeater_data'])): ?>
            <div class="row child-cols-12 sm:child-cols-6 lg:child-cols-4 g-4">
                <?php $__currentLoopData = $data['repeater_data']['repeater_title_']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div>
                        <div class="panel vstack gap-2 text-center">
                            <?php if(!empty($data['repeater_data']['repeater_image_'][$key])): ?>
                                <div class="panel mx-auto">
                                    <?php echo render_image_markup_by_attachment_id($data['repeater_data']['repeater_image_'][$key], '', 'full', false); ?>

                                </div>
                            <?php endif; ?>
                            <h3 class="h6 lg:h5 m-0 dark:text-white"><?php echo e($data['repeater_data']['repeater_title_'][$key]); ?></h3>
                            <?php if(!empty($data['repeater_data']['repeater_subtitle_'][$key])): ?>
                                <p class="fs-6 opacity-70"><?php echo e($data['repeater_data']['repeater_subtitle_'][$key]); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php /**PATH C:\wamp64\www\jihost_v1\core\resources\views/themes/lexend-v4/widgets/how_it_works.blade.php ENDPATH**/ ?>